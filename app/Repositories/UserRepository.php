<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function get(){
        return User::get();
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