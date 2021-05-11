<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Junges\ACL\Http\Models\Group;
use Junges\ACL\Http\Models\Permission;

class ACLController extends Controller
{
    public function permission()
    {
        return view('permissions.add', ['users' => User::get(), 'permissions' => Permission::get()]);
    }

    public function group()
    {
        return view('permissions.groups', ['users' => User::get(), 'permissions' => Permission::get()]);
    }
    public function role()
    {
        return view('permissions.role');
    }
    public function usersGroup()
    {
        return view('permissions.user-groups', [
            'users' => User::get(),
            'permissions' => Permission::get(),
            'groups' => Group::get()
        ]);
    }

    public function usersGroupSave(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->syncGroups($request->input('groups'));
        $user->save();
        return response()->json(['message' => 'Success']);
    }

    public function groupSave(Request $request)
    {
        $group = new Group();
        $group->name = $request->input('name');
        $group->slug = $request->input('slug');
        $group->description = $request->input('description');
        $group->syncPermissions($request->input('permissions'));
        $group->save();

        return response()->json(['message' => $group]);
    }

    public function permSave(Request $request)
    {
        $user = User::where('id', $request->input('id'))->first();
        $user->syncPermissions($request->input('permissions'));
        $user->save();
        return response()->json(['message' => 'Success']);
    }

    public function roleSave(Request $request)
    {
        $perm = new Permission();

        $perm->create($request->all());

        return response()->json(['message' => 'Success']);
    }
}
