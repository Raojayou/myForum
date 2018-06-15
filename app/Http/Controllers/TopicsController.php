<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTopicAjaxRequest;
use App\Http\Requests\CreateTopicRequest;
use App\Http\Requests\UpdateTopicAjaxRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Tag;
use App\Topic;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        $topics = Topic::orderBy('created_at', 'asc')->paginate(4);
        // Here we send the data through the PHP function 'compact'
        // See Documentation: http://php.net/manual/es/function.compact.php
        return view('public.topics.index', compact('topics'));
    }

    public function adminIndex(Request $request)
    {
        return view('admin.topics.index', ['topics' => $request->user()->adminTopics()]);
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

        return view('public.topics.show', ['topic' => $topic]);
    }

    /**
     * Método para mostrar el formulario de alta de un nuevo tema.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('public.topics.create');
    }

    /**
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($id)
    {
        $topic = Topic::where('id', $id)->first();

        if (Gate::allows('canEdit', $topic)) {
            return view('public.topics.edit', [
                'topic' => $topic,
                'tags' => $topic->tags->pluck('name')->implode(', ')
            ]);
        }

        return view('public.topics.edit', ['topic' => $topic]
        );
    }


    /**
     * @param CreateTopicRequest $request
     * @param Topic $topic
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function patch(CreateTopicRequest $request, Topic $topic)
    {
        $topic->fill([
            'title' => $request->input('title'),
            'slug' => str_slug($request->input('title')),
            'category' => $request->input('category'),
            'content' => $request->input('content'),
        ]);

        $tags = explode(", ", \request('tags'));
        //dd($tags);
        $newTags = [];
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate([
                'name' => $tag,
                'slug' => str_slug($tag)
            ]);
            array_push($newTags, $tag);
        }
        //dd(collect($newTags)->pluck('id')->toArray());
        $topic->tags()->sync(collect($newTags)->pluck('id')->toArray());

        $topic->update();

        return redirect('public.topics.edit');
    }


    /**
     * Función para actualizar el tema creado.
     * @param UpdateTopicRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, $nick, CreateTopicRequest $request)
    {
        $user = User::where('nick', $nick)->first();

        $topic = Topic::find($id);

        $topic->fill([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'content' => $request->input('content'),
        ]);

        $topic->update();

        return redirect('/topics/{id}');
    }

    /**
     * Función para borrar el tema creado.
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        $user = Auth::user();

        $topic = Topic::where('id', $id)->first();

        if ($topic != null) {

            $topic = Topic::find($id)->delete();

        }

        return 1;
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
        $tags = explode(", ", \request('tags'));

        $topic = Topic::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'slug' => str_slug(\request('title')),
            'category' => $request->input('category'),
            'content' => $request->input('content'),

        ]);

        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate([
                'name' => $tag,
                'slug' => str_slug($tag)
            ]);
            $topic->tags()->attach($tag);
        }

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

    /**
     * Pasamos los parametros para validar el formulario de actualizar el perfil del usuario
     *
     * @param UpdateTopicAjaxRequest $request
     * @return array
     */
    protected function validacionUpdateTopicAjax(UpdateTopicAjaxRequest $request){
        return array();
    }
    public function loadData()
    {
        return view('data.dataAjax');
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