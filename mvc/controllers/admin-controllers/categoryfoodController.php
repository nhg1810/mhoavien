<?php
class categoryfood extends Controller
{
    private $SlugCategory;
    public $CategoryFoodAdminModel;
    public $set_all_category_food;
    // public $RedirectURL = "";
    public function __construct()
    {
        $this->CategoryFoodAdminModel = $this->model("AdminCategoryFoodModel");
        $this->SlugCategory = new slug();
    }
    //tạo hai biến ở cookie, quét 2 biến này với csdl nếu đúng mới cho vào các chức năng của admin
    //bắt buộc phải đăng nhập để vào được trang admin
    public function manager()
    {
        if ($this->CategoryFoodAdminModel->GetAllCategoryFood() == false) {
            $this->set_all_category_food == false;
        } else {
            $rs_all_category_food = $this->CategoryFoodAdminModel->GetAllCategoryFood();
            for ($this->set_all_category_food = array(); $row = $rs_all_category_food->fetch_assoc(); $this->set_all_category_food[] = $row);
        }
        $this->ViewAdmin("main-view", [
            "control" => "categoryfood",
            "set_all_category_food" => $this->set_all_category_food
        ]);
    }
    //hàm này để tạo một slug
    public function CreateSlugCategoryFood()
    {
        if (isset($_POST['name_category_food'])) {
            $name_category_food  = $_POST['name_category_food'];
            echo $this->SlugCategory->create_slug($name_category_food);
        }
    }
    //hàm này để tạo 1 category food
    public function CreareCategoryFood()
    {
        if (isset($_POST['name_category_food'])) {
            $name_category_food = $_POST['name_category_food'];
            $key_search_category_food = $_POST['key_search_category_food'];
            $descripts_category_food = $_POST['descripts_category_food'];


            // xử lý ảnh
            if (isset($_FILES['upload_img_food_1'])) {
                //xử lý phần ảnh
                $imgCategory = $_FILES['upload_img_food_1']['name'];
                /* Location */
                $location = "./mvc/public/img-food/" . $imgCategory;
                $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);
                /* Valid extensions */
                $valid_extensions = array("jpg", "jpeg", "png");
                $response = 0;
                /* Check file extension */
                if (in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if (move_uploaded_file($_FILES['upload_img_food_1']['tmp_name'], $location)) {
                        $response = $location;

                        $rs_add_category = $this->CategoryFoodAdminModel->AddCategoryFood($name_category_food, $key_search_category_food, $imgCategory, $descripts_category_food);
                        if ($rs_add_category != false) {
                            echo $response;
                        }
                    }
                }
            }
        } else {
            echo "lỗi";
        }
    }
    //hàm này để lấy ra một chi tiết category
    public function GetCategoryById()
    {
        if (isset($_POST['id_cate_food'])) {
            $idcategoryfood = $_POST['id_cate_food'];
            $rs_category_food_by_id = $this->CategoryFoodAdminModel->GetCategoryFoodById($idcategoryfood);
            if ($rs_category_food_by_id != false) {
                for ($set_category_food = array(); $row = $rs_category_food_by_id->fetch_assoc(); $set_category_food[] = $row);
                foreach ($set_category_food as $key => $value) {
                    foreach ($value as $k => $vl) {
                        echo ' <div class="row">
                        <!-- Basic Layout -->
                        <div class="col-xxl">
                            <div class="card mb-4">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Thêm danh mục</h5>
                                    <small class="text-muted float-end">Lưu ý nhớ điền đầy đủ thông tin ! </small>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" class="" for="basic-default-name">Tên danh mục</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control ed-name-category-food" id="basic-default-name" placeholder="các món cơm" value="' . $set_category_food[$key]['nameCateFood'] . '" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Từ khoá tìm kiếm</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control ed-key-search-category-food" id="basic-default-name" placeholder="cac-mon-com" value="' . $set_category_food[$key]['slug'] . '" />
                                                <button type="button" class="btn btn-primary ed-btn-create-slug-category-food">Tự động tạo</button>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-message">Giới thiệu món ăn</label>
                                            <div class="col-sm-10">
                                                <textarea id="basic-default-message" class="form-control ed-descripts-category-food" placeholder="giới thiệu sơ qua về món ăn" aria-describedby="basic-icon-default-message2">' . $set_category_food[$key]['descriptCate'] . '</textarea>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                <input type="hidden" name="" class="old-img-cate-food" value = "'.$set_category_food[$key]['img'].'">
                                                <img id="ed-img-cate-food" src="./mvc/public/img-food/' . $set_category_food[$key]['img'] . '" alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar" />
                                                <div class="button-wrapper">
                                                    <label for="ed-upload-img-cate-food-1" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block">Upload ảnh thứ 1</span>
                                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                                        <input type="file" id="ed-upload-img-cate-food-1" onchange="document.getElementById(`ed-img-cate-food`).src = window.URL.createObjectURL(this.files[0])" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                                    </label>
                
                
                                                    <p class="text-muted mb-0">Chỉ cho phép sử dụng file ảnh JPG, GIF và PNG (lưu ý không được để trống)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-sm-10">
                                                <button type="button" class="btn btn-primary ed-btn-add-cate-food">Chỉnh sửa</button>
                                                <button type="button" class="btn btn-outline-danger btn-close-form-edit">Huỷ Bỏ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>';
                        break;
                    }
                }
            }
        }
    }
    //hàm này để update một category
    public function UpdateCategoryById()
    {
        # code...
    }
}
