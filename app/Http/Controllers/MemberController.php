<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Member::create([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('members.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function show(string $id)
{
    $member = Member::findOrFail($id);

    return view('members.show', compact('member'));
}

public function edit(string $id)
{
    $member = Member::findOrFail($id);

    return view('members.edit', compact('member'));
}
}