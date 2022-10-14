<!DOCTYPE html>

<title>My Personal Blog</title>
<link rel="stylesheet" href="/app.css">

<body>
  <article>
    <h1>
      <?php echo $post->title; ?>
    </h1>
    <div>
      <?php echo $post->body; ?>
    </div>
    <div>
      Angry Baker, signing out.
    </div>
  </article>
  <br>
  <a href="/">Back to posts </a>
</body>