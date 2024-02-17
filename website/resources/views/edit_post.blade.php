<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
</head>
<body>
<h2>Sửa bài viết</h2>
<form action="{{route('post.update', $post->id)}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="pwd">name:</label>
        <input type="text" name="name" value="{{$post->name}}">

    </div>
    <div class="mb-3">
        <label for="pwd">name:</label>
        <textarea class="tinyMce" name="content">{!!  $post->content !!}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
