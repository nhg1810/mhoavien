<?php
class blog extends Controller{
    public $BlogModel;
    public function __construct()
    {
        $this->BlogModel=$this->model("BlogModel");
    }
    function MainFucntion()
    {
        $this->view("main-view", ["control" => "blog"]);
    }
}

?>