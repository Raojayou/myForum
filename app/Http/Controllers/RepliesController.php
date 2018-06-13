<?php
namespace App\Http\Controllers;
use App\Reply;
use App\Topic;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function store($id)
    {
        if( ! Auth::user()){
            $this->validate(request(), [
                'name' => 'required|min:5',
                'email' => 'required|email',
                'content' => 'required|min:2'
            ]);
            $name = \request('name');
            $email = \request('email');
        }else{
            $this->validate(request(), [
                'content' => 'required|min:2'
            ]);
            $name = Auth::user()->name;
            $email = Auth::user()->email;
        }

        $topic = Topic::findOrFail($id);
        $topic->addReply(request('message'), $name, $email);

        return back();
    }
}
