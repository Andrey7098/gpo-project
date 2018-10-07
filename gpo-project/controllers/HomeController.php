<?php
include "models/Home.php";
class HomeController
{
    public function actionHome()
    {
        $users = false;
        $result = false;
        $surname = '';
        $name = '';
        $patronymic = '';
        $position = '';
        $title = '';
        $degree = '';
        if(isset($_POST["submit"])){
            $surname = $_POST["surname"];
            $name = $_POST["name"];
            $patronymic = $_POST["patronymic"];
            $position = $_POST["position"];
            $title = $_POST["academic_title"];
            $degree = $_POST["academic_degree"];
            //Проверка на незаполненные поля 
            $users = Home::check($surname,$name,$patronymic,$position,$title,$degree);// Возвращает массив(true) или false.
            if(!$users){
                echo "Данные успешно сохранены!";
                //Преподаватель сохраняет введеную информацию в базу данных
                $result = Home::teacher_save($surname,$name,$patronymic,$position,$title,$degree);
            }else{
                echo array_shift($users);
            }
        }
        include "views/home/viewHome.php";
       return true;
    }
}
?>