<?php

namespace App\Http\Controllers;

use App\Mail\UserModify;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Fluent;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::join('roles as r', 'users.role_id', '=', 'r.id')
            ->orderBy('id', 'desc')
            ->select('users.id', 'users.name', 'users.email', 'r.name as role')
            ->paginate(10);
            // ->get();

        // dd($Users);
        // return view('admin.pages.user.index', compact('Users'));
        return response()->json([
            'success' => true,
            'users' => $Users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->role_id == 5) {
            abort(403);
            exit;
        }
        $roles = Role::orderBy('name', 'asc')->get();

        return view('admin.pages.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|min:3|max:15',
            'password_confirmation' => 'required|same:password',
        ]);
        

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();
        if ($user->save()) {

            
            return response()->json([
                'success' => 'User created successfully',

            ]);
        } else {
            

            return response()->json([
                'error' => 'User not created successfully',

            ]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $user = User::join('roles as r', 'users.role_id', '=', 'r.id')
            ->where('users.id', $id)
            ->select('users.id', 'users.name', 'users.email', 'users.role_id', 'r.name as role')
            ->first();

        // dd($user->role);
        // return view('admin.pages.user.show', compact('user'));
        if ($user) {

            return response()->json([
                'success' => true,
                'user' => $user,
            ]);
        }else{
            return response()->json([
                'error' => true,
                'message' => 'User not found',
            ],404);
        }
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
        
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => "required|email|unique:users,email,$id",
            'role_id' => 'required',
        ]);

        

        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);


        if ($user) {

            $role = Role::findOrFail($request->role_id);
            $user = User::find($id);
            
            return response()->json([
                'success' => true,
                'user' => $user,
                'message' => 'User update successfully',

            ]);

        } else {
            return response()->json([
                'error' => true,
                'message' => 'User update failed',
            ], 404);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'User not found',
            ], 404);
        }

    }
}
