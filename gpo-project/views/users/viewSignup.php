<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
  <?php if($result):?>
  <p>Вы успешно зарегестрированы!</p>
  <a href="login">Пожалуйста, авторизируйтесь!</a>
  <?php else: ?>
   <h1>Страница регестрации!</h1><br>
    <form action="" method="post">
        <input type="Name" name="login" placeholder="Введите логин" value="<?php echo $login?>"><br>
        <input type="email" name ="email" placeholder="Введите email" value="<?php echo $email?>"><br>
        <input type="password" name="password1" placeholder="Введите password"><br>
        <input type="password" name="password2" placeholder="Введите повторный password"><br>
        <input type="submit" name="submit">
    </form>
    <a href="login">Авторизация</a>
    <?php endif;?>
</body>
</html>