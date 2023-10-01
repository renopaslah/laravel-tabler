<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository
{
    public function get(){
        $data = User::with('roles')->get();

        return $data->map(function($item){
            return (object) [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'status' => $item->status,
                'status_str' => $item->status ? 'aktif' : 'ditangguhkan',
                'roles' => $item->roles->map(function ($role){
                    return (object) [
                        'name' => $role->name
                    ];
                }),
            ];
        });
    }

    public function getRole(){
        return Role::where('name', '!=', 'super admin')->get();
    }

    public function find($userId){
        $data = User::findOrFail($userId);
        
        return (object) [
            'name' => $data->name,
            'email' => $data->email,
        ];
    }

    public function store($data){
        return DB::transaction(function () use ($data) {
            //insert user
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = Hash::make($data->password);
            $user->save();

            //update role
            $user->assignRole($data->role);
        });
    }

    public function update($data, $id){
        $user = User::findOrFail($id);
        $user->name = $data->name;
        $user->email = $data->email;
        if($data->password){
            $user->password = Hash::make($data->password);
        }
        $user->save();
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->syncRoles([]);
        $user->delete();
    }
}