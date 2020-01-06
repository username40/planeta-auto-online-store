<?php

namespace App\Http\Controllers\Manage\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Role;
use App\Permission;
use App\Traits\Authorizable;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use Authorizable;

    public function index()
    {
        $roles = Role::where('id','!=', 1)->get();  // показываем все, кроме админской роли
        $permissions = Permission::all();

        $permissions_arr = [];

        $entities = Permission::select(['entity'])->groupBy('entity')->get();

        foreach ($entities as $entity) {
            if ($entity->entity != null) {
                $perms = Permission::where('entity', $entity->entity)->get();
                foreach ($perms as $perm) {
                    $permissions_arr[$entity->entity] []= $perm;
                }
            }
        }
        return view('role.index', compact('roles', 'permissions', 'permissions_arr'));
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if( Role::CreateByName($request->input('name')) ) {
            flash('Role Added');
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Admin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }

            $permissions = $request->get('permissions', []);
            $role->syncPermissions($permissions);
            flash( $role->name . ' permissions has been updated.');
        } else {
            flash()->error( 'Role with id '. $id .' note found.');
        }

        return redirect()->route('roles.index');
    }

    public function show($id) {
        $role = Role::findOrFail($id);
//        $permissions = Permission::all();

        $permissions_arr = [];

        $entities = Permission::select(['entity'])->groupBy('entity')->get();

        foreach ($entities as $entity) {
            if ($entity->entity != null) {
                $perms = Permission::where('entity', $entity->entity)->get();
                foreach ($perms as $perm) {
                    $permissions_arr[$entity->entity] []= $perm;
                }
            }
        }
        return view('role.role', compact('role', 'permissions_arr'));
    }
}
