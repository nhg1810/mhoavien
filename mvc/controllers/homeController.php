<?php
class home extends Controller{
    public $HomeModel;
    public function __construct()
    {
        $this->HomeModel=$this->model("HomeModel");
    }
    function MainFucntion()
    {
        $this->view("main-view", ["control" => "home"]);
    }
}
?>