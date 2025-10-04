<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p><strong>Slug:</strong> {{ $post->slug }}</p>
    <div>
        {{ $post->content }}
    </div>
</body>
</html>
