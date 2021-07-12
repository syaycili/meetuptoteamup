<?php

use App\Models\ChatRoom;
use App\Models\roller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
    if(Auth::check()){

        $ilanId = ChatRoom::where('id', $roomId)->first()->ilan_id;

        $kullainiciid = Auth::user()->id;

        if (roller::where('KullaniciId', $kullainiciid)->where('ProjeId', $ilanId)) {
            return ['id' => $user->id, 'name' => $user->name];
        }
    }
});
