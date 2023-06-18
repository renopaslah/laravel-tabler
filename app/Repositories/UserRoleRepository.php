<?php

namespace App\Repositories;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleRepository
{
    public function getUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function getRole($id)
    {
        $user = $this->getUser($id);
        $userRole = $user->getRoleNames();

        $role = Role::get();

        $data = [];

        foreach ($role as $k => $v) {
            $btn = $userRole->contains($v->name) ? 'btn-primary' : 'btn-outline-primary';
            $data[] = [
                'id' => $v->id,
                'name' => $v->name,
                'btn' => $btn,
            ];
        }

        return $data;
    }

    // public function getById($id){
    //     return Role::find($id);
    // }

    public function save($data)
    {
        $roles = explode(',', rtrim($data->role, ','));
        $user = User::find($data->user);

        // Menghapus semua role yang dimiliki oleh user
        $user->roles()->detach();

        foreach ($roles as $k => $v) {
            $user->assignRole($v);
        }

        session()->flash('success', 'Data Peran berhasil ditambahkan.');
    }

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
