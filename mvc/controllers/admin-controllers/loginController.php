<?php
class login extends Controller
{
    public $LoginAdminModel;
    public function __construct()
    {
        $this->LoginAdminModel = $this->model("AdminLoginModel");
    }
    public function manager()
    {
        if (isset($_POST["btnsigninamdin"])) {
            $username = $_POST["ADusername"];
            $password = $_POST["ADpassword"];
            $ResultLoginAdmin = $this->LoginAdminModel->CheckAdminstrator($username,  $password);
            if($ResultLoginAdmin == false ){
                $this->ViewAdminUnique("login",["alertcheck"=>"Sai tài khoản mật khẩu. Nhập lại !!!"]);
            }else{
                // $this->ViewAdmin("mainViewAdmin",["control"=> "home"]);
                //tạo 1 trang chào mừng admin, admin bấm tiếp tục thì gọi lại url này
                // $this->ViewAdminUnique("WelcomeAdmin");
                $_SESSION["administration"] = true;

                $newURL = "http://localhost/MocHoaVien/admin/home";
                header('Location: '.$newURL);
            }            
        }else{
            $this->ViewAdminUnique("login");
        }
    }
    public function checklogin()
    {

    }
}
