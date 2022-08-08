<?php
class event extends Controller{
    public $EventModel;
    public function __construct()
    {
        $this->EventModel=$this->model("EventModel");
    }
    function MainFucntion()
    {
        $this->view("main-view", ["control" => "event"]);
    }
}
?>