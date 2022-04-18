<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Post</title>
</head>
<body>
    <h1>Create Post</h1>
    <form method="post" action="{{ route('posts.store') }}">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug">
        </div>
        <div>
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div>
            <input type="submit" value="Create Post"/>
        </div>
    </form>
</body>
</html>
