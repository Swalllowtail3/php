<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    input {
        width: 200px;
        height: 29px;
        border: none;
        box-shadow: 0 0 3px black;
        border-radius: 3px;
    }
    .submit {
        background-color: skyblue;
        border: none;
        width: 84px;
    }
    .submit:active{
        opacity: 0.5;
    }
    
</style>



<body>
    <form action="home.php" method="GET">
        <input type="text" placeholder="email" name="email"><br><br>
        <input type="text" placeholder="password" name="pword"><br><br>
        <input class="submit" type="submit">
    </form>
</body>
</html>