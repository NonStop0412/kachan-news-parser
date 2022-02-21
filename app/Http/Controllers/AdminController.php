<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $sources = Source::all();
        return view('admin.index', ['sources' => $sources]);
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('admin.profile', ['user' => $user]);
    }
}
