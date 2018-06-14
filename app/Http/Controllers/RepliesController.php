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
                'content' => 'required|min:2'
            ]);
        }else{
            $this->validate(request(), [
                'content' => 'required|min:2'
            ]);
        }

        $topic = Topic::findOrFail($id);
        $topic->addReply(request('content'));

        return back();
    }
}
