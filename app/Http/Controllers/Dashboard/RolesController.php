<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{

    public function __construct(){
        $this->authorizeResource(Role::class , 'role');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $roles = Role::paginate() ;
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create(Request $request)
    {

        return view('dashboard.roles.create', [
            'roles' => new Role(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *

     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','unique:roles,name'],
            'abilities'=>['array','required'],
        ]);

        $role = Role::CreateWithAbilities($request) ;

        return redirect()->route('dashboard.roles.index')
            ->with('success','Role created successfully');

    }

    /**
     * Display the specified resource.

     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Request $request, Role $role)
    {
        $role_abilities = $role->abilities()->pluck('type' , 'ability')->toArray();
        return view('dashboard.roles.edit', compact('role' , 'role_abilities'));
    }

    /**
     * Update the specified resource in storage.
     *

     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>['required','string'],
            'abilities'=>['array','required'],
        ]);

        $role->UpdateWithAbilities($request) ;

        return redirect()->route('dashboard.roles.index')
            ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('dashboard.roles.index')
            ->with('success','Role deleted successfully');
    }
}
