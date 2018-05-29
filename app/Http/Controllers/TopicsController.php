<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTopicAjaxRequest;
use App\Http\Requests\CreateTopicRequest;
use App\Topic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class TopicsController
 * @package App\Http\Controllers
 */
class TopicsController extends Controller
{
    /**
     * List of topics
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $topics = Topic::orderBy('created_at', 'asc')->paginate(10);
        // Here we send the data through the PHP function 'compact'
        // See Documentation: http://php.net/manual/es/function.compact.php
        return view('topics.index', compact('topics'));
    }

    /**
     * Página de tema única.
     * Route binding
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $topic = Topic::where('id', $id)->first();

        return view('topics.show', ['topic' => $topic]);
    }

    /**
     * Método para mostrar el formulario de alta de un nuevo tema.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('topics.create');
    }

    /**
     * Guarda en la base de datos la información facilitada para un nuevo tema.
     * Utiliza un Request para validar los datos.
     *
     * @param CreateTopicRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateTopicRequest $request)
    {
        Topic::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'slug' => str_slug(\request('title')),
            'category' => $request->input('category'),
            'content' => $request->input('content'),

        ]);

        return redirect('/');
    }

    /**
     * Validacion por Ajax con Request
     * @param CreateTopicAjaxRequest $request
     * @return array
     */
    public function validateTopicAjax(CreateTopicAjaxRequest $request)
    {
        //Obtenemos todos los valores y devolvemos un array vacío.
        return array();
    }

    public function loadData()
    {
        return view('dataAjax');
    }

    public function loadDataAjax()
    {
        $topics = Topic::all();

        return $topics;
    }

    public function loadDataAjaxOne(Request $request)
    {
        $posicionInicial = $request->get("posicionInicial");
        $numElementos = $request->get("numeroElementos");
        $topics = DB::table("topics")
            ->offset($posicionInicial)
            ->limit($numElementos)
            ->get();
        return $topics;
    }

    public function loadView(Request $request)
    {
        $posicionInicial = $request->get("posicionInicial");
        $numElementos = $request->get("numeroElementos");
        $topics = DB::table("topics")
            ->offset($posicionInicial)
            ->limit($numElementos)
            ->get();

        $view = view('topics.viewTopic', ['topics' => $topics]);
        return $view;
    }
}