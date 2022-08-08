<?php
class review extends Controller{
    public $ReviewModel;
    public function __construct()
    {
        $this->ReviewModel=$this->model("ReviewModel");
    }
    function MainFucntion()
    {
        $this->view("main-view-2", ["control" => "review"]);
    }
}
?>