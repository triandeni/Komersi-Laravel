<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserrController extends Controller
{
    public function user() {
        return view('admin.user.index',[
            'user' => User::all()
        ]);
    }

    public function view($id) {
        return view('admin.user.view', [
            'user' => User::find($id)
        ]);
    }
}
