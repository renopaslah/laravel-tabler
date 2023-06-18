<?php

namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleRepository
{
    public function get($id){
        return User::find($id);
    }

    public function getRole(){
        return Role::get();
    }

    // public function getById($id){
    //     return Role::find($id);
    // }

    // public function save($data){
    //     Role::create(['name' => $data->post('name')]);
    //     session()->flash('success', 'Data berhasil ditambahkan.');
    // }

    // public function update($data, $id){
    //     $role = Role::find($id);
    //     $role->name = $data->post('name');
    //     $role->save();

    //     session()->flash('success', 'Data berhasil diperbaharui.');
    // }

    // public function delete($id){
    //     Role::destroy($id);
    //     session()->flash('success', 'Data berhasil dihapus.');
    // }
}