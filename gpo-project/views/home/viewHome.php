<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php if(isset($_SESSION['user'])):?>
    Вы вошли как <?php echo $_SESSION['user']->login; ?>
    Войти как <a href="admin"><?php echo $_SESSION['user']->name_role; ?></a>
    <a href="logout">Выйти</a><br>
    <h1>Главнаz страница!</h1><br>
   
    
     <?php else:?>
    <a href="login">Авторизация</a>
     <?php endif;?>
     
</body>
</html>