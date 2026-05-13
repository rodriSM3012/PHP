<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todos los posts</h1>

    <?php
        foreach ($posts as $post) {
            echo "<h2>{$post->title}</h2>";
            echo "<p>{$post->content}</p>";
            echo "<p>Author: {$post->user->name}</p>";
            echo "<p>{$post->created_at->format('d/m/Y')}</p>";
        }
    ?>
</body>
</html>