<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
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

        return view('users.profile', ['user' => $user]);
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit()
//    {
//        $user = Auth::user();
//        return view('users.edit', ['user' => $user]);
//    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\UpdateUserRequest $request
//     * @return \Illuminate\Http\Response
//     */
//    public function update(UpdateUserRequest $request)
//    {
//        $path = $request->path();
//        $user = Auth::user();
//        //dd( array_filter($request->all()) );
//        if (strpos($path, 'account')) {
//            $data = array_filter($request->all());
//            $user = User::findOrFail($user->id);
//            $user->fill($data);
//        } elseif (strpos($path, 'password')) {
//            if (!Hash::check($request->get('current_password'), $user->password)) {
//                return redirect()->back()->with('error', 'La constraseña actual no es correcta');
//            }
//            if (strcmp($request->get('current_password'), $request->get('password')) == 0) {
//                return redirect()->back()->with('error', 'La nueva contraseña debe ser diferente de la antigua.');
//            }
//            $user->password = bcrypt($request->get('password'));
//        }
//        $user->save();
//        return redirect()
//            ->route('profile.account')
//            ->with('exito', 'Datos actualizados');
//    }

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
