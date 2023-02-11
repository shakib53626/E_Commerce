<?php
include('../inc/connection.php');


// Category Form insert Code here--------------
if(isset($_POST['add_category'])){
    $cat_name   = $_POST['cat_name'];
    $is_parent  = $_POST['is_parent'];
    $cat_status = $_POST['cat_status'];
    $file_name  = $_FILES['choose_file']['name'];
    $tmp_name  = $_FILES['choose_file']['tmp_name'];
    $file_size  = $_FILES['choose_file']['size'];

    $mb_file_size = $file_size/(1024*1024);

    if($mb_file_size > 1){
        echo 'Warning! Maximum File Size 1MB';
    }


    $extn = explode('.', $file_name);
    $file_extn = strtolower(end($extn));

    $extensions = array('png', 'jpg', 'jpeg');

    if(!empty($file_name)){
        if(in_array($file_extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/categorys/'.$update_name);
            $cat_insert = "INSERT INTO mart_category (cat_name,cat_img,is_parent,cat_status) VALUES ('$cat_name','$update_name', '$is_parent', '$cat_status')";
            $cat_insert_res = mysqli_query($db,$cat_insert);
    
            if($cat_insert_res){
                header('location: ../category.php');
            }else{
                die('Category Insert Error!'.mysqli_error($db));
            }
        }else{
            echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
        }
    }else{
        $cat_insert = "INSERT INTO mart_category (cat_name,is_parent,cat_status) VALUES ('$cat_name', '$is_parent', '$cat_status')";
        $cat_insert_res = mysqli_query($db,$cat_insert);

        if($cat_insert_res){
            header('location: ../category.php');
        }else{
            die('Category Insert Error!'.mysqli_error($db));
        }
    }
}

// insert Add Brand .....************************************

if(isset($_POST['add_brand'])){
    $brand_name     = $_POST['brand_name'];
    $Brand_Category = $_POST['is_parent'];
    $brand_status   = $_POST['brand_status'];
    $file_name      = $_FILES['choose_file']['name'];
    $tmp_name       = $_FILES['choose_file']['tmp_name'];
    $file_size      = $_FILES['choose_file']['size'];

    $mb_file_size = $file_size/(1024*1024);

    if($mb_file_size > 1){
        echo 'Warning! Maximum File Size 1MB';
    }


    $extn = explode('.', $file_name);
    $file_extn = strtolower(end($extn));

    $extensions = array('png', 'jpg', 'jpeg');

    if(!empty($file_name)){
        if(in_array($file_extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/brands/'.$update_name);
            $cat_insert = "INSERT INTO mart_brand (Brand_Name,Brand_Image,Brand_Category,Brand_Status) VALUES ('$brand_name','$update_name', '$Brand_Category', '$brand_status')";
            $cat_insert_res = mysqli_query($db,$cat_insert);
    
            if($cat_insert_res){
                header('location: ../brand.php');
            }else{
                die('Category Insert Error!'.mysqli_error($db));
            }
        }else{
            echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
        }
    }else{
        $cat_insert = "INSERT INTO mart_brand (Brand_Name,Brand_Category,Brand_Status) VALUES ('$brand_name', '$Brand_Category', '$brand_status')";
        $cat_insert_res = mysqli_query($db,$cat_insert);

        if($cat_insert_res){
            header('location: ../brand.php');
        }else{
            die('Category Insert Error!'.mysqli_error($db));
        }
    }
}




// Add Product Insert Code Here........


if(isset($_POST['product_add'])){
    $product_name       = $_POST['product_name'];
    $product_cat        = $_POST['product_cat'];
    $product_sub_cat    = $_POST['product_sub_cat'];
    $product_sdesc      = mysqli_real_escape_string($db,$_POST['short_desc']);
    $product_bdesc      = mysqli_real_escape_string($db,$_POST['editor']);
    $product_re_price   = $_POST['reg_price'];
    $product_offer_price   = $_POST['offer_price'];
    $product_brand      = $_POST['product_brand'];
    $product_stock      = $_POST['p_stock'];
    $product_stock      = $_POST['p_stock'];
    $featur_img         = $_FILES['choose_file']['name'];
    $tmp_img            = $_FILES['choose_file']['tmp_name'];
    $img_size           = $_FILES['choose_file']['size'];


    $file_mb_size       = $img_size/(1024*1024);
    if($file_mb_size > 1){
        echo 'Warning! Maximum File Size 1MB';
    }


    $extn           = explode('.', $featur_img);
    $file_extn      = strtolower(end($extn));
    $extention      = array('jpg', 'jpeg', 'png');
    if(!empty($featur_img)){
        if(in_array($file_extn,$extention) == true){
            $updateName = rand().$featur_img;
            move_uploaded_file($tmp_img, '../assets/img/products/'.$updateName);
            $product_sql = "INSERT INTO mart_product (p_name,p_category,p_sub_category,p_brand,p_reg_price,p_offer_price,p_featured_img,p_short_desc,p_long_desc,p_stock,p_status) VALUES ('$product_name','$product_cat','$product_sub_cat','$product_brand','$product_re_price','$product_offer_price','$updateName','$product_sdesc','$product_bdesc','$product_stock','1')";
            $product_res = mysqli_query($db,$product_sql);
            if($product_res){
                header('location: ../add_product.php');
            }else{
                die('Add Product Insert Error!'.mysqli_error($db));
            }

        }else{
            echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
        }
    }else{
        $product_sql = "INSERT INTO mart_product (p_name,p_category,p_sub_category,p_brand,p_reg_price,p_offer_price,p_short_desc,p_long_desc,p_stock,p_status) VALUES ('$product_name','$product_cat','$product_sub_cat','$product_brand','$product_re_price','$product_offer_price','$product_sdesc','$product_bdesc','$product_stock','0')";
        $product_res = mysqli_query($db,$product_sql);
        if($product_res){
            header('location: ../add_product.php');
        }else{
            die('Add Product Insert Error!'.mysqli_error($db));
        }
    }
    
}