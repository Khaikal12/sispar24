<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at')->get();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'hak_akses' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'hak_akses' => 'required',
        ]);

        $input = $request->only('name', 'no_hp', 'alamat', 'jenis_kelamin', 'email', 'hak_akses');

        $user->update($input);

        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route("user.index")->with("success", "Data berhasil dihapus");
    }
}
