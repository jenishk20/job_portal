<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //

    public function index(Request $request)
    {


        $content=$request->get('content');

        $use=auth()->user();
        $chat=new Chat();
        $chat->user_id=$use->id;
        $chat->content=$content;
        $chat->save();

        $sql=Chat::query()->select()->get();

       $user=User::query()->select()->get();
        return view('home',compact('sql','user'));

    }
}
