<?php
include "models/Signup.php";
class UserController
{
    public function actionLogin()
    {
        $log = false;
        $login = '';
        $password = '';
        if(isset($_POST["submit"])){
            $login = $_POST["login"];
            $password = $_POST["password"];
            $log = User::entrance($login,$password);
            if($log){
                echo array_shift($log);
            }
        }
        
        include "views/users/viewLogin.php";
        return true;
    }
    public function actionSignup()
    {
        $result = false;
        $login = '';
        $email = '';
        $password1 = '';
        $password2 = '';
        if(isset($_POST["submit"])){
            $login = $_POST["login"];
            $email = $_POST["email"];
            $password1 = $_POST["password1"];
            $password2 = $_POST["password2"];
            $users = User::check($login,$email,$password1,$password2);// Возвращает массив(true) или false.
            if(!$users){
                echo "Регестрируем";
                $result = User::register($login,$email,$password1);
            }else{
                echo array_shift($users);
            }
        }
        include "views/users/viewSignup.php";
        return true;
    }
     public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location:login");
        return true;
    }
}
?>