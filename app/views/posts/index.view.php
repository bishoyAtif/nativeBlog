<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recent Posts</title>
</head>
<body>
	<a href="<?= route('posts/create') ?>">Add Post</a>
    <?php foreach ($posts as $post) { ?>
        <h2><a href="<?= route('posts/' . $post->id) ?>"><?= $post->title ?></a></h2>
        <p><?= $post->content ?></p>
        <a href="<?= route('posts/' . $post->id . '/edit') ?>">Edit Post</a>
        <hr>
    <?php } ?>
</body>
</html>