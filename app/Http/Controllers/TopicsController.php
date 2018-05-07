<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTopicRequest;
use App\Topic;
use Illuminate\Http\Request;

/**
 * Class TopicsController
 * @package App\Http\Controllers
 */
class TopicsController extends Controller
{
    public function show($id)
    {
        $topic = Topic::where('id', $id)->first();
        return view('topics.show', [
            'topic' => $topic,
        ]);
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
        $user = $request->user();
        Topic::create([
            'user_id' => $user->id,
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'content' => $request->input('content'),
        ]);
        return redirect('/');
    }
}