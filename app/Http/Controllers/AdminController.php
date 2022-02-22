<?php

namespace App\Http\Controllers;

use App\Models\Source;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $sources = Source::all();

        return view('admin.index', ['sources' => $sources]);
    }

    public function profile(int $id)
    {
        $user = User::find($id);

        return view('admin.profile', ['user' => $user]);
    }
}
