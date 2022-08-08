<?php
class menufood extends Controller{
    public $MenuFoodModel;
    public function __construct()
    {
        $this->MenuFoodModel=$this->model("MenuFoodModel");
    }
    function MainFucntion()
    {
        $this->view("main-view", ["control" => "menufood"]);
    }
}
?>