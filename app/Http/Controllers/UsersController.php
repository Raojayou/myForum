<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Topic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * Muestra los temas creados por los usuarios
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nick)
    {
        $user = User::where('username', $nick)->first();
        $topics = $user->topics()->latest()->paginate(9);
        return view('users.index', [
            'topics' => $topics,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
//        dd($user);
        $topics = Topic::where('user_id', $user->id)->get();

        return view('users.profile',
            [
                'user' => $user,
                'topics' => $topics
            ]
        );
    }



    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('home');
    }

    /**
     * Muestra el perfil del usuario
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        return view('users.profile');
    }
}
