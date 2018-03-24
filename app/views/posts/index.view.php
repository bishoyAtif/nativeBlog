<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recent Posts</title>
</head>
<body>
    <?php foreach ($posts as $post) { ?>
        <h2><?php echo $post-> title; ?></h2>
        <p><?php echo $post->content ?></p>
        <hr>
    <?php } ?>
</body>
</html>