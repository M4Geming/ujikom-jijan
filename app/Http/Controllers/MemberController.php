<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::latest()->paginate(2);

        return view('menuAdmin.member', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_name' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|numeric',
        ]);

        Member::create([
            'member_name' => $request->member_name,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'status' => 'aktif',
        ]);

        return redirect()->route('members.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'member_name' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|numeric',
        ]);

        $member = Member::findOrFail($id);
        $member->update([
            'member_name' => $request->member_name,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('members.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Data berhasil dihapus.');
    }
}
