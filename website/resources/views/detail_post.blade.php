<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
    <style type="text/css">
        .post-detail h2{
            color: red;
        }
    </style>
</head>
    <body>
        <h2 style="color:red">{{$post->name}}</h2>
        <div style="margin-top: 20px" class="post-detail">
          {{--  <?php
            echo $post->content;
            ?>--}}
            {!! $post->content !!}

        </div>
    </body>
</html>
