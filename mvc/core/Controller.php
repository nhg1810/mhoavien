<?php
class Controller{
    // class này viết ra chứa 2 hàm trả về, 
    // mục đích thuận tiện xho việc gọi đúng model và trả đúng view
    // và để khỏi viết đi viết lại 2 hàm này nhiều lần
     public function Model($model)
    {

        require_once "./mvc/models/".$model.".php";
        require_once "./mvc/core/DBconfig.php";
        return new $model;
    }
    public function View($view,$data=[])
    {
        require_once "./mvc/views/user-view/construct-view/".$view.".php";
    }
    public function ViewAdmin($view, $data=[]){
        require_once "./mvc/views/admin-view/construct-view/".$view.".php";
    }
    public function  ViewAdminUnique($view, $data=[]){
        require_once "./mvc/views/admin-view/unique-view/".$view.".php";
    }
    public function  ViewUserUnique($view, $data=[]){
        require_once "./mvc/views/user-view/unique-view/".$view.".php";
    }
} 
?>