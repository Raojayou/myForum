<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * Genera la página de inicio del proyecto.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {

        $topics = Topic::orderBy('created_at', 'desc')->paginate(9);

        return view('home', [
            'topics' => $topics,
        ]);
    }

    /**
     * Página de saludo.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function saludo()
    {
        $saludo = "Bienvenidos al Foro";
        $usuario = "Josan";
        return view('saludo', [
            'saludo' => $saludo,
            'usuario' => $usuario
        ]);
    }
}