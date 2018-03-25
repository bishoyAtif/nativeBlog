<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Post</title>
</head>
<body>
    <fieldset>
        <legend>Add Post</legend>
        <form action="/posts" method="POST">
            <div>
                <label for="title">Title</label>
                <input id="title" type="text" name="title" value=""><br>
            </div>
            <div>
                <label for="content">Content</label><br>
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
    </fieldset>
</body>
</html>