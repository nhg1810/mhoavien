<?php 
class AdminLoginModel{
    private $db;
    public function __construct()
    {
        $this->db=new Database();
    }
    public function CheckAdminstrator($username, $password)
    {
        $qr ="SELECT * FROM `tbl_account` WHERE username = '".$username."' and password = '".$password."' and admin = '1';";
        $result = $this->db->select($qr);
        if($result == false){
            return false;
          }
          else{
            return $result;
          }
    }
}
?>