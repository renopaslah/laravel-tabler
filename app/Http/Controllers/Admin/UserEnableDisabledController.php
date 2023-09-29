<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserEnableDisabledController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = User::findOrFail(request('user'));
        $status = request('status');

        if($status == 1){
            $user->status = 1;
        }else{
            $user->status = 0;
        }

        $user->save();

        return back();
    }
}
