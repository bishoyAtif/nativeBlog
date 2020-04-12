<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recent Posts</title>
</head>

<body>
    <h2><?php echo $post->getTitle(); ?></h2>
    <p><?php echo $post->getContent() ?></p>
</body>

</html>