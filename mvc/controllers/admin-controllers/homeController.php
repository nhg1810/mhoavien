<?php
class home extends Controller{
    public $LoginAdminModel;
    // public $RedirectURL = "";
    public function __construct()
    {
        // $this->LoginAdminModel=$this->model("LoginAdminModel");
    }
    //tạo hai biến ở cookie, quét 2 biến này với csdl nếu đúng mới cho vào các chức năng của admin
    //bắt buộc phải đăng nhập để vào được trang admin
    public function manager(){
        $this->ViewAdmin("main-view",["control"=>"home"]);
    }
    public function logout(){
        unset($_SESSION["administration"]);
        $newURL = "http://localhost/MocHoaVien/admin/";
        header('Location: '.$newURL);
    }
}
