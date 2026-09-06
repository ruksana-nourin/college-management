<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Users = User::all();
        // $Users = User::orderBy('id', 'desc')->get();
        // $Users = User::orderBy('name', 'asc')->get();
        // $Users = User::orderBy('name', 'asc')->limit(5)->get();
        // $Users = User::orderBy('id', 'asc')->offset(10)->limit(5)->get();
        // $Users = User::orderBy('id', 'asc')->offset(10)->first();
        // $Users = User::orderBy('id', 'asc')->where('role_id', 1)->get();
        // $Users = User::orderBy('id', 'asc')->where('role_id', 3)->first();
        // $Users = User::orderBy('id', 'asc')
        //     ->whereIn('role_id', [1,2])
        //     ->get();
        // $Users = User::from('users as u')
        //     ->join('roles as r', 'u.role_id', '=', 'r.id')
        //     ->orderBy('id', 'asc')
        //     ->select('u.id', 'u.name', 'u.email', 'r.name as role')
        //     ->first();
        $Users = User::join('roles as r', 'users.role_id', '=', 'r.id')
            ->orderBy('id', 'desc')
            ->select('users.id', 'users.name', 'users.email', 'r.name as role')
            ->paginate(10);
        // dd($Users);
        return view('admin.pages.user.index', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pages.user.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.pages.user.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
