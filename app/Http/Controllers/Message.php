<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessagePost;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewMessageAuth;
use App\NewMessage;

class Message extends Controller
{
    public function store(StoreMessagePost $request, NewMessage $newMessage)
    {
        $newMessage->object = $request->object;
        $newMessage->message = $request->message;

        Mail::to($request->email)->send(new NewMessageAuth($newMessage));
        return view('welcome', [
            'messageSend' => true,
        ]);
    }
}
