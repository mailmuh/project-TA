<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $useradmins = User::all();
        return view('admin.user.index', compact('useradmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $useradmins = User::all();
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'email' => 'format :attribute yang anda inputkan salah ',
        ];

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',

        ],$messages);

        User::create([
            'name' => $request->input("name"),
            'email' => $request->input("email"),
            'role' => $request->input("role"),
            'password' => Hash::make($request->input("email"))]
        );

        return redirect()->route('useradmins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $useradmin = User::findOrFail($id);
        return view('admin.user.edit', compact('useradmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $useradmin)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $data = $useradmin;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->password = $request->password;
        $data->update();

        return redirect()->route('useradmins.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $useradmin = User::find($id);
        $useradmin->delete();

        return redirect(route('useradmins.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
