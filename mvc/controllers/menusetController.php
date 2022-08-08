<?php
class menuset extends Controller{
    public $MenuSetModel;
    public function __construct()
    {
        $this->MenuSetModel=$this->model("MenuSetModel");
    }
    function MainFucntion()
    {
        $this->view("main-view", ["control" => "menuset"]);
    }
}
?>