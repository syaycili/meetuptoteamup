<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('merhaba', function () {
    $this->comment('09.05.2021 tarihindeki Sarp sana da merhaba diyor');
})->purpose('Selam Vermek');

Artisan::command('emailtest', function () {
    Mail::raw('Test Maili', function($msg) {$msg->to('sarpyaycili@gmail.com')->subject('Test Email'); });
})->purpose('emaildeneme');
