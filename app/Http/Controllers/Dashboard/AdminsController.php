<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $admins = Admin::paginate();
        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('dashboard.admins.create' ,
        ['roles' => new Admin() , 'roles'=>new Role()]);
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'roles'=>['required' , 'array']
        ]) ;

        $admin = Admin::create($request->all());
        $admin->roless()->attach($request->roles);

        return redirect()->route('dashboard.admins.index')
            ->with('success','Admin created successfully.');
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


     */
    public function edit(Admin $admin)
    {
        $roles = Role::all();
        $admin_roles = $admin->roles()->pluck('id')->toArray();
        return view('dashboard.admins.edit' , compact('admin' , 'roles' , 'admin_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate(['name' => 'required' , 'roles'=>['required' , 'array']]);

        $admin->update($request->all());
        $admin->roles()->sync($request->input('roles'));

        return redirect()->route('dashboard.admins.index')->with('success','Admin updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id

     */
    public function destroy($id)
    {
        Admin::destroy($id);
        return redirect()
            ->route('dashboard.admins.index')
            ->with('success', 'Admin deleted successfully');
    }
}
