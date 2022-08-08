<?php
class food extends Controller{
    public $FoodAdminModel;
    // public $RedirectURL = "";
    public function __construct()
    {
        $this->FoodAdminModel=$this->model("AdminFoodModel");
    }
    //tạo hai biến ở cookie, quét 2 biến này với csdl nếu đúng mới cho vào các chức năng của admin
    //bắt buộc phải đăng nhập để vào được trang admin
    public function manager(){
        $this->ViewAdmin("main-view",["control"=>"food"]);
    }
}
