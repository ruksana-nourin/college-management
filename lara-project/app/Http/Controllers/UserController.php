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
        $roles = Role::orderBy('name', 'asc')->get();
        return view('admin.pages.user.create', compact('roles'));
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
        // dd();

        // $user= User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'role_id' => $request->role_id,
        //     'password' => Hash::make($request->password)
        // ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();
        // $user =false;
        // if($user){
        if($user->save()){

            return redirect()
                ->route('users.index')
                ->with('success', 'User created successfully');
        }else{
            return redirect()
                ->route('users.create')
                ->with('error', 'User creation failed');

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
            ->select('users.id', 'users.name', 'users.email', 'r.name as role')
            ->first();
            // dd($user->role);
        return view('admin.pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::find($id);
        // dd($user);

        return view('admin.pages.user.edit', compact('roles', 'user'));
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

        // $user = User::find($id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->role_id = $request->role_id;
        // $user->save();

        $user= User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id
        ]);

        if($user){

            return redirect()
                ->route('users.index')
                ->with('success', 'User updated successfully');
        }else{
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
        // dd($id);
        // $user = User::find($id);
        // $user->delete();

        User::destroy($id);
        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
