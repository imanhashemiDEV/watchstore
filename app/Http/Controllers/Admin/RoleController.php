<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $title = "لیست نقش ها";
        return view('admin.role.list',compact('title'));
    }
    public function create()
    {
        $title = "ایجاد نقش";
        return view('admin.role.create',compact('title'));
    }

    public function store(RoleRequest $request)
    {
        Role::query()->create([
            'name'=>$request->input('name'),
        ]);

        return  redirect()->route('roles.index')->with('message','نقش جدید با موفقیت ثبت شد');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {  $title = "ویرایش نقش";
        $role = Role::query()->find($id);
        return view('admin.role.edit', compact('role','title'));
    }

    public function update(RoleRequest $request, $id)
    {
        $role = Role::query()->find($id);
        $role->update([
            'name'=>$request->input('name')
        ]);

        return  redirect()->route('roles.index')->with('message','نقش با موفقیت ویرایش شد');
    }


    public function destroy($id)
    {
        //
    }
}
