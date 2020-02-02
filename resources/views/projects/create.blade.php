<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Project</title>
</head>
<body>
    <form action="/projects" method="POST">
        @csrf
        <div></div><input type="text" placeholde="Project title" name="title"></div>
        <div><textarea name="description" placeholder="Describe your project"></textarea></div>
        <div><button type="submit">Create Project</button></div>
    </form>
</body>
</html>