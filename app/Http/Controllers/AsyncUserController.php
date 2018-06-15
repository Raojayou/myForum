<?php

namespace App\Http\Controllers;

use App\Topic;
use App\User;
use Illuminate\Http\Request;

class AsyncUserController extends Controller
{
    public function index($id)
    {
        $user = User::where('id', $id)->first();

        $topics = Topic::where('user_id', $user->id)->get();

        return view('users.profileAsync',
            [
                'user' => $user,
                'topics' => $topics
            ]
        );
    }
}
