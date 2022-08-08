<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

        // tự động tạo 1 slug
        $(".btn-create-slug-category-food").click(function() {
            var name_category_food = $(".name-category-food").val();
            if (name_category_food != "") {
                $.ajax({
                    url: 'admin/categoryfood/CreateSlugCategoryFood',
                    data: {
                        name_category_food: name_category_food
                    },
                    type: "POST",
                    success: function(data) {
                        $(".key-search-category-food").val(data);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Chưa điền thông tin trong ô tên món ăn !',
                    text: 'Nếu bạn muốn tự động tạo thì phải điền tên sản phẩm đã!',
                    footer: '<a href="">Nếu vẫn gặp liên hệ Dương 0868617603 ?</a>'
                })
            }

        })

        //thêm 1 category
        $(".btn-add-cate-food").click(function() {
            var name_category_food = $(".name-category-food").val();
            var key_search_category_food = $(".key-search-category-food").val();
            var descripts_category_food = $(".descripts-category-food").val();
            var upload_img_food_1 = $('#upload-img-cate-food-1')[0].files;
            if (name_category_food == "" || key_search_category_food == "" || descripts_category_food == "" || upload_img_food_1[0] === undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Thông tin đang thiếu',
                    text: 'Vui lòng kiểm tra lại các ô đang trống!',
                    footer: '<a href="">Nếu vẫn gặp lỗi, liên hệ 0868617603(Dương)?</a>'
                })
            } else {
                var form_cate_food = new FormData();
                form_cate_food.append('name_category_food', name_category_food);
                form_cate_food.append('key_search_category_food', key_search_category_food);
                form_cate_food.append('descripts_category_food', descripts_category_food);
                form_cate_food.append('upload_img_food_1', upload_img_food_1[0]);



                Swal.fire({
                    title: 'Bạn có chắc muốn thêm doanh mục này chứ ?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Chắc chắn',
                    denyButtonText: `Huỷ bỏ`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'admin/categoryfood/CreareCategoryFood',
                            data: form_cate_food,
                            cache: false,
                            processData: false,
                            contentType: false,
                            type: "POST",
                            success: function(data) {
                                if (data != 0) {
                                    Swal.fire('Thêm thành công!', '', 'success');
                                    setTimeout(function() {
                                        window.location.reload(1);
                                    }, 1200);
                                } else {
                                    alert("thêm thất bại");
                                }
                            }
                        });
                        //gọi ajax để lưu vào cơ sở dữ liệu
                    } else if (result.isDenied) {
                        Swal.fire('Thao tác chưa thưc hiện !', '', 'info')
                    }
                })
            }
        })
    });
</script>
<style>
    .layout-opacity {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        background-color: black;
        position: fixed;
        z-index: 100;
        opacity: 0.7;
        display: none;
    }

    .form-edit-cate-food {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 80;
        position: fixed;
        z-index: 101;
        overflow-y: scroll;
        display: none;
    }
</style>
<script>
    $(document).ready(function() {

        $(".btn-edit-cate-food").click(function() {
            $(".layout-opacity").css("display", "block");
            $(".form-edit-cate-food").css("display", "block");
            var id_cate_food = $(this).attr('data-id-catefood');
            //call ajax get data
            $.ajax({
                url: 'admin/categoryfood/GetCategoryById',
                data: {
                    id_cate_food: id_cate_food
                },
                type: "POST",
                success: function(data) {
                    $(".form-edit-cate-food").html(data);

                    // tự động tạo 1 slug
                    $(".ed-btn-create-slug-category-food").click(function() {
                        var ed_name_category_food = $(".ed-name-category-food").val();
                        if (ed_name_category_food != "") {

                            $.ajax({
                                url: 'admin/categoryfood/CreateSlugCategoryFood',
                                data: {
                                    name_category_food: ed_name_category_food
                                },
                                type: "POST",
                                success: function(data) {
                                    $(".ed-key-search-category-food").val(data);
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Chưa điền thông tin trong ô tên món ăn !',
                                text: 'Nếu bạn muốn tự động tạo thì phải điền tên sản phẩm đã!',
                                footer: '<a href="">Nếu vẫn gặp liên hệ Dương 0868617603 ?</a>'
                            })
                        }

                    })
                    //nút huỷ
                    $(".btn-close-form-edit").click(function() {
                        $(".layout-opacity").css("display", "none");
                        $(".form-edit-cate-food").css("display", "none");
                    })

                    //lưu cập nhật
                    $(".ed-btn-add-cate-food").click(function() {
                        var ed_name_category_food = $(".ed-name-category-food").val();
                        var ed_key_search_category_food = $(".ed-key-search-category-food").val();
                        var ed_descripts_category_food = $(".ed-descripts-category-food").val();
                        var ed_upload_img_food_1 = $('#ed-upload-img-cate-food-1')[0].files;
                        var ed_old_img_food = $(".old-img-cate-food").val();
                        if (ed_name_category_food == "" || ed_key_search_category_food == "" || ed_descripts_category_food == "" || ed_upload_img_food_1[0] === undefined) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Thông tin đang thiếu',
                                text: 'Vui lòng kiểm tra lại các ô đang trống!',
                                footer: '<a href="">Nếu vẫn gặp lỗi, liên hệ 0868617603(Dương)?</a>'
                            })
                        } else {
                            var ed_form_cate_food = new FormData();
                            ed_form_cate_food.append('ed_name_category_food', ed_name_category_food);
                            ed_form_cate_food.append('id_category_food', id_cate_food);
                            ed_form_cate_food.append('ed_key_search_category_food', ed_key_search_category_food);
                            ed_form_cate_food.append('ed_descripts_category_food', ed_descripts_category_food);
                            ed_form_cate_food.append('ed_upload_img_food_1', ed_upload_img_food_1[0]);
                            ed_form_cate_food.append('ed_old_img_food', ed_old_img_food);

                            Swal.fire({
                                title: 'Bạn có chắc muốn sửa đổi doanh mục này chứ ?',
                                showDenyButton: true,
                                showCancelButton: true,
                                confirmButtonText: 'Chắc chắn',
                                denyButtonText: `Huỷ bỏ`,
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: 'admin/categoryfood/UpdateCategoryById',
                                        data: ed_form_cate_food,
                                        cache: false,
                                        processData: false,
                                        contentType: false,
                                        type: "POST",
                                        success: function(data) {
                                            
                                        }
                                    });
                                    //gọi ajax để lưu vào cơ sở dữ liệu
                                } else if (result.isDenied) {
                                    Swal.fire('Thao tác chưa thưc hiện !', '', 'info')
                                }
                            })
                        }
                    })

                }
            });
        })



    })
</script>
<div class="layout-opacity">

</div>

<div class="form-edit-cate-food">

</div>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Thêm một danh mục món ăn nào đó</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
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
                                <input type="text" class="form-control name-category-food" id="basic-default-name" placeholder="các món cơm" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Từ khoá tìm kiếm</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control key-search-category-food" id="basic-default-name" placeholder="cac-mon-com" />
                                <button type="button" class="btn btn-primary btn-create-slug-category-food">Tự động tạo</button>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">Giới thiệu món ăn</label>
                            <div class="col-sm-10">
                                <textarea id="basic-default-message" class="form-control descripts-category-food" placeholder="giới thiệu sơ qua về món ăn" aria-describedby="basic-icon-default-message2"></textarea>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img id="img-cate-food" src="./mvc/public/admin/assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="200" width="200" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload-img-cate-food-1" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload ảnh thứ 1</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload-img-cate-food-1" onchange="document.getElementById('img-cate-food').src = window.URL.createObjectURL(this.files[0])" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                    </label>


                                    <p class="text-muted mb-0">Chỉ cho phép sử dụng file ảnh JPG, GIF và PNG (lưu ý không được để trống)</p>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-primary btn-add-cate-food">Hoàn thành</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Các món hiện có</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Tên danh mục</th>
                        <th>Giới thiệu</th>
                        <th>Từ khoá tìm kiếm</th>
                        <th>Hình ảnh</th>
                        <th>Thay đổi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    if (isset($data['set_all_category_food']) && $data['set_all_category_food'] != false) {
                        $set_all_category_food = $data['set_all_category_food'];
                        foreach ($set_all_category_food as $key => $value) {
                            foreach ($value as $k => $vl) {
                                echo ' <tr>
                             <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $set_all_category_food[$key]['idCategoryFood'] . '</strong></td>
                             <td><span class="badge bg-label-primary me-1">' . $set_all_category_food[$key]['nameCateFood'] . '</span></td>
                             <td>' . $set_all_category_food[$key]['descriptCate'] . '</td>
                             <td>' . $set_all_category_food[$key]['slug'] . '</td>


                             <td>
                                 <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                     <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                         <img src="./mvc/public/img-food/' . $set_all_category_food[$key]['img'] . '" alt="Avatar" class="rounded-circle" />
                                     </li>
                                 </ul>
                             </td>
                            
                             <td>
                                 <div class="dropdown">
                                     <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                         <i class="bx bx-dots-vertical-rounded"></i>
                                     </button>
                                     <div class="dropdown-menu">
                                         <a class="dropdown-item btn-edit-cate-food" data-id-catefood=' . $set_all_category_food[$key]['idCategoryFood'] . ' href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                         <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                     </div>
                                 </div>
                             </td>
                         </tr>';
                                break;
                            }
                        }
                    } else {
                        echo '<td>Chưa có thông tin nào được thêm !</td>';
                    }
                    ?>
                    <!-- <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong></td>
                        <td>Albert Cook</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>

</div>