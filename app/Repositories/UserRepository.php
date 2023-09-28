<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository
{
    public function get(){
        return User::with('roles')->get();
    }

    public function getRole(){
        return Role::where('name', '!=', 'super admin')->get();
    }

    public function find(){
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

    public function update(){
    }

    public function delete(){
    }
}