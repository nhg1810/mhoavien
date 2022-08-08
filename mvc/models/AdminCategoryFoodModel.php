<?php
class AdminCategoryFoodModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function AddCategoryFood($nameCateFood, $slug, $img, $descriptCate)
    {
        $qr = "INSERT INTO `tbl_category_food` (`idCategoryFood`, `nameCateFood`, `slug`, `img`, `descriptCate`) 
        VALUES (NULL, '" . $nameCateFood . "', '" . $slug . "', '" . $img . "','" . $descriptCate . "');";
        $result = $this->db->insert($qr);
        if ($result == false) {
            return false;
        } else {
            return true;
        }
    }
    public function GetAllCategoryFood()
    {
        $qr = "SELECT * FROM `tbl_category_food`";
        $result = $this->db->select($qr);
        if ($result == false) {
            return false;
        } else {
            return $result;
        }
    }
    public function GetCategoryFoodById($idcategoryfood)
    {
        $qr = "SELECT * FROM `tbl_category_food` WHERE tbl_category_food.idCategoryFood = '".$idcategoryfood."' ";
        $result = $this->db->select($qr);
        if ($result == false) {
            return false;
        } else {
            return $result;
        }
    }
    public function UpdateCategoryFood()
    {
        # code...
    }
}
