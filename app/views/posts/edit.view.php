<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Post</title>
</head>

<body>
    <fieldset>
        <legend>Edit Post</legend>
        <form action="<?= route('posts/' . $post->getId()) ?>" method="POST">
            <div>
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value="<?= $post->getTitle() ?>"><br>
            </div>
            <div>
                <label for="content">Content</label><br>
                <textarea name="content" id="content" cols="30" rows="10"><?= $post->getContent() ?></textarea>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
    </fieldset>
</body>

</html>