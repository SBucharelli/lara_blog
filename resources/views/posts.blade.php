<!DOCTYPE html>

<title>My Personal Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <h1>
                <a href="/posts/<?php echo $post->slug; ?>">
                    <?php echo $post->title; ?>
                </a>
            </h1>
            <div><?php echo $post->excerpt; ?></div>
            <br>
            Angry Baker, signing out.
        </article>
    <?php endforeach; ?>
</body>