<?php 
include "models/Admin.php";
class AdminController{
   public function actionAdmin(){
       include "views/users/viewAdmin.php";
       return true;
    }
}
?>