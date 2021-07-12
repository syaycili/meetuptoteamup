<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\Projeler;
use App\Models\roller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function rooms(Request $request, $ilanId)
    {

       $kullainiciid = Auth::user()->id;

       if (roller::where('KullaniciId', $kullainiciid)->where('ProjeId', $ilanId)) {

        $odalar[0] = ChatRoom::where('ilan_id', $ilanId)->first();

        return $odalar;
       }


    }

    public function messages(Request $request, $roomId){

        $ilanId = ChatRoom::where('id', $roomId)->first()->ilan_id;

        $kullainiciid = Auth::id();

        if (roller::where('KullaniciId', $kullainiciid)->where('ProjeId', $ilanId)) {

        return ChatMessage::where('chat_room_id', $roomId)->with('user')->orderBy('created_at', 'ASC')->get();

        }


    }


    public function newMessage(Request $request, $roomId){






        $ilanId = ChatRoom::where('id', $roomId)->first()->ilan_id;

        $kullainiciid = Auth::user()->id;

        if (roller::where('KullaniciId', $kullainiciid)->where('ProjeId', $ilanId)) {




        $newMessage = new ChatMessage;
        $newMessage->user_id = Auth::id();
        $newMessage->chat_room_id = $roomId;
        $newMessage->message = $request->message;
        $newMessage->save();

        broadcast( new NewChatMessage( $newMessage ))->toOthers();

        return $newMessage;




        }
    }

}
