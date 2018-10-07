<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Страница авторизации!</h1><br>
    <?php if(isset($_SESSION['user'])):?>
    <?php header("Location:home"); ?>
   <?php else:?>
    <form action="" method="post">
        <input type="type" name="login" value="<?php echo $login?>" placeholder="Введите login"><br>
        <input type="password" name="password" placeholder="Введите password"><br>
        <input type="submit" name="submit">
    </form>
    <a href="signup">Регестрация</a>
    <?php endif;?>
</body>
</html>