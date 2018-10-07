<?php
class Home{
    public static function check($surname,$name,$patronymic,$position,$title,$degree){
        $error = false;
        if($surname == ''){
            $error[] = "Введите фамилию!";
        }
        if($name == ''){
            $error[] = "Введите имя!";
        }
        if($patronymic == ''){
            $error[] = "Введите отчество!";
        }
        if($position == ''){
            $error[] = "Введите административную должность!";
        }
        if($title == ''){
            $error[] = "Введите title!";
        }
        if($degree == ''){
            $error[] = "Введите degree!";
        }
        return $error;
    }
    public static function teacher_save($surname,$name,$patronymic,$position,$title,$degree){
        $user = R::Dispense("teachers");
        $user->surname = $_POST["surname"];
        $user->name = $_POST["name"];
        $user->patronymic = $_POST["patronymic"];
        $user->position = $_POST["position"];
        $user->academic_title = $_POST["academic_title"];
        $user->academic_degree = $_POST["academic_degree"];
        R::store($user);
        return true;
    }
}
?>