<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recent Posts</title>
</head>

<body>
    <a href="<?= route('posts/create') ?>">Add Post</a>
    <?php foreach ($posts as $post) { ?>
        <h2><a href="<?= route('posts/' . $post->getId()) ?>"><?= $post->getTitle() ?></a></h2>
        <p><?= $post->getContent() ?></p>
        <a href="<?= route('posts/' . $post->getId() . '/edit') ?>">Edit Post</a>
        <hr>
    <?php } ?>
</body>

</html>