<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AsyncController extends Controller
{
    public function formularioEditarTema(){
        if (request()->ajax()){
            return View::make('public.topics.edit')->render();
        }else{
            return redirect('/');
        }
    }
}
