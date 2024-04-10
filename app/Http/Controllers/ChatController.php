<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatMessageReceived;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        event(new ChatMessageReceived($request->message));
    }
}
