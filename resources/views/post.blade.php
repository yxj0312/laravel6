<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Document</title> 
    </head>
    <body>
        <h1>My Blog Post</h1>
        
        <p>{{ $post->body }}</p>
    </body>
</html>
