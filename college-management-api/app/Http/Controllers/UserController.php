<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::join('roles as r', 'users.role_id', '=', 'r.id')
            ->orderBy('id', 'desc')
            ->select('users.id', 'users.name', 'users.email', 'r.name as role')
            ->paginate(10);
        // dd($Users);
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('id', 'asc')->get();

        return view('admin.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required',
            'password' => 'required|min:3|max:15',
            'password_confirmation' => 'required|same:password'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password)
        ]);
        // $user=false;
        if ($user) {
            return redirect()
                ->route('users.index')
                ->with('success', 'User created successfully');
        } else {
            return redirect()
                ->route('users.create')
                ->with('error', 'User not created');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $user = User::find($id);
        $user = User::join('roles as r', 'users.role_id', '=', 'r.id')
            ->where('users.id', $id)
            ->select('users.id', 'users.name', 'users.email', 'r.name as role', 'users.created_at', 'users.updated_at')
            ->first();
        // dd($user->role);
        return view('admin.pages.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        return view('admin.pages.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => "required|email|unique:users,email,$id",
            'role_id' => 'required'
        ]);

        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id
        ]);

        if ($user) {

            return redirect()
                ->route('users.index')
                ->with('success', 'User updated successfully');
        } else {
            return redirect()
                ->route('users.edit', ['id' => $id])
                ->with('error', 'User update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
