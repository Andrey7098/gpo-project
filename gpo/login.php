<?php 
require "db.php";
$data = $_POST;
if(isset($data['do_login'])){
    $errors = array();
    $user = R::findOne('users',"login = ?",array($data['login']));
    if($user){
        //логин существует
        if(password_verify($data['password_1'], $user->password)){
            echo 'Вы вошли в систему';
            $_SESSION['logged_user'] = $user;
            header("Location: /Teacher.php");
        }else
        {
            $errors[] = "Неверно введен пароль";
        }
    }else{
        $errors[]="пользователь с таким логином не найден";
    }
    if(!empty($errors)){
         echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
    }
 
?>
<form action="login.php" method="post">
    <input type="text" name="login" placeholder="Ваш логин" value="<?php echo $data['login']?>"><br>
    <input type="password" name="password_1" placeholder="Пароль"><br>
    <button type="submit" name="do_login">Войти</button>
</form>
<a href="index.php">Главная</a>