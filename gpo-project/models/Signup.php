<?php
class User{
    public static function check($login,$email,$password1,$password2){
        $error = false;
        if($login == "")//если строка с логином пуста то мы в массив $error[] заносим текст с ошибкой,с остальными проверками аналогично.
        {
            $error[] = "Введите логин!";
        }
        if($email == "")
        {
            $error[] = "Введите email!";
        }
        if($password1 == "")
        {
            $error[] = "Введите пароль!";
        }
        if($password2 != $password1)
        {
            $error[] = "Повторный пароль введен неверно!";
        }  
        if(R::count('users', "login = ?", array($_POST["login"])) > 0)
        {
            $error[] = "Логин существует";
        }
        if(R::count('users', "email = ?", array ($_POST["email"])) > 0)
        {
            $error[] = "Email существует";
        }
            
        return $error;
    }
    public static function register($login,$email,$password1)
    {
        //empty - проверяет пуста ли переменная
        //Если массив с ошибками пуст,то регестрируем
        //$obj = new User($data["login"],$data["email"],$data["password"],time("d.m.y"));
        $user = R::Dispense("users");//Создаем таблицу users
        $user->login = $_POST["login"];//Создаем поле логин и записываем в данную ячейку логин пользователся
        $user->email = $_POST["email"];//Создаем поле email и записываем в данную ячейку email пользователся
        $user->password = password_hash($_POST["password1"],PASSWORD_DEFAULT);////Создаем поле email и записываем в данную ячейку email пользователся
        $user->data = date("Y-m-d H:i:s");
        R::store($user);
//        header("Location:login");
        return true;
    }
    public static function entrance()
    {
        $errors = false;
        $join = R::getRow("SELECT * FROM users JOIN user_role ON users.id=user_role.id_user JOIN role ON role.id_role = user_role.id_role WHERE users.login = ? LIMIT 1",array($_POST["login"]));
        $user = R::findOne('users',"login = ?",array($_POST["login"]));
        if($user){
            //Пользователь найден,проверяем на пароль
            if(password_verify($_POST["password"],$user->password))
            {
                //пароль совпал,регистрируем
                settype($join,"object");
                $_SESSION['user'] = $join;
                header("Location:home");
            }else{
                //неверный пароль,фиксируем ошибку
                $errors[] = "Неверно ввыден пароль";
            }
        }else
        {
            //Пользователь не найден,фиксируем ошибку
            $errors[] = "Логин с таким именем не найден";
        }
        return $errors;
    }
}
?>