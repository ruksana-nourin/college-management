<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Role::all();
        // $roles = DB::table('roles')->get();
        // $roles = DB::table('roles')->paginate(2);
        // $roles = DB::table('roles')->where('name', 'admin')->first();
        // $roles = DB::table('roles')->orderBy('name', 'asc')->get();
        // $roles = DB::table('users')->latest()->get();
        // $roles = DB::table('roles')->offset(2)->limit(2)->get();
        // $roles = DB::table('roles')->skip(2)->take(2)->get();
        // $roles = DB::table('roles')->forPage(2, 2)->get();
        // $roles = DB::table('products')->avg('price');
        // $roles = DB::table('products')->max('price');
        // $roles = DB::table('products')->select('name','price')->get();
        // $roles = DB::table('products as p')
        //         ->join('categories as c', 'p.category_id', '=', 'c.id')
        //         ->join('brands as b', 'p.brand_id', '=', 'b.id')
        //         ->select('p.name','c.name as category','b.name as brand','price')
        //         ->get();
        // $roles = DB::table('roles as r')
        //     ->join('users as u', 'u.role_id', '=', 'r.id')
        //     ->select('r.name as role',
        //         DB::raw('COUNT(u.id) as number_of_user')
        //     )
        //     ->groupBy('r.id', 'r.name')
        //     ->get();
        // $roles = DB::table('roles as r')
        //         ->join('users as u', 'u.role_id', '=', 'r.id')
        //         ->select('r.name as role')
        //         ->selectRaw('COUNT(u.id) as number_of_user')
        //         ->groupBy('role')
        //         ->get();

        $roles = DB::table('roles')->orderBy('name', 'asc')->paginate();

        // dd($roles);

        // return view('admin.pages.role.index', ['roles' => $roles]);
        return response()->json([
            'success' => true,
            'roles' => $roles,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name|min:2|max:30',
        ]);
        // $role =Role::create([
        //     'name' => $request->name
        // ]);
        $role = DB::table('roles')->insert([
            'name' => $request->name,
        ]);
        if ($role) {
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role created successfully');
        } else {
            return redirect()
                ->route('roles.create')
                ->with('error', 'Role creation failed');

        }

    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.pages.role.edit', compact('role',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name|min:2|max:30',
        ]);
        // $role =Role::create([
        //     'name' => $request->name
        // ]);
        $role = DB::table('roles')
        ->where('id',$role->id)
        ->update([
            'name' => $request->name
        ]);
        if ($role) {
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role Updated successfully');
        } else {
            return redirect()
                ->route('roles.create')
                ->with('error', 'Role not update');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role = DB::table('roles')
        ->where('id',$role->id)
        ->delete();

        if ($role) {
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role Deleted successfully!');
        } else {
            return redirect()
                ->route('roles.index')
                ->with('error', 'Role not deleted');

        }
    }

    //Cutom  method
    public function search(Request $request ){
        // dd("search Works");
        // echo("search Works");
        // echo($request->search);
        $roles = DB::table('roles')
        ->where('name', 'like', '%'.$request->search.'%')
        ->paginate();
        return response()->json($roles);

    }
}
