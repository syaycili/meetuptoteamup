<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <title>Chat Test</title>
</head>
<body>
    @include('parts.chatbox')
</body>
