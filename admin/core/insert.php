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


// Coupon Insert Code HEre........

if(isset($_POST['add_coupon'])){
    $copon_code     = $_POST['copon_code'];
    $dis_amount     = $_POST['dis_amount'];
    $dis_type       = $_POST['dis_type'];
    $Copon_sdate    = $_POST['Copon_sdate'];
    $Copon_edate    = $_POST['Copon_edate'];
    $dis_object     = $_POST['dis_object'];
    $dis_on         = $_POST['dis_on'];
    $dis_status     = $_POST['dis_status'];


    $id_array = '';
    foreach($dis_on as $data){
        $data = ','.$data;
        $id_array .= $data;
    }
        $dis_sql    = "INSERT INTO mart_coupon(coupon_code,amount,dis_on,start_date,end_date,dis_on_type,discount_on,copon_status) VALUES ('$copon_code','$dis_amount','$dis_type','$Copon_sdate','$Copon_edate','$dis_object','$id_array','$dis_status')";
        $dis_res    = mysqli_query($db,$dis_sql);
        if($dis_res){
            header('location: ../copon_code.php');
        }else{
            die('Copon Code add error!'.mysqli_error($db));
        }
    
}


// Add Users Insert Code........


if(isset($_POST['add_user'])){
    $user_name      = $_POST['user_name'];
    $user_mail      = $_POST['user_mail'];
    $user_pass      = $_POST['user_pass'];
    $phone          = $_POST['phone'];
    $user_status    = $_POST['user_status'];
    $address        = $_POST['address'];
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
            move_uploaded_file($tmp_name, '../assets/img/users/'.$update_name);
            $cat_insert = "INSERT INTO mart_user (user_name,user_mail,pass,phone,user_address,user_img,user_status) VALUES ('$user_name','$user_mail', '$user_pass', '$phone','$address','$update_name','$user_status')";
            $cat_insert_res = mysqli_query($db,$cat_insert);
    
            if($cat_insert_res){
                header('location: ../users.php');
            }else{
                die('users Insert Error!'.mysqli_error($db));
            }
        }else{
            echo 'Worning ! Please Upload and Image file (png,jpg,jpeg)!';
        }
    }else{
        $cat_insert = "INSERT INTO mart_user (user_name,user_mail,pass,phone,user_address,user_status) VALUES ('$user_name','$user_mail', '$user_pass', '$phone','$address','$user_status')";
        $cat_insert_res = mysqli_query($db,$cat_insert);

        if($cat_insert_res){
            header('location: ../users.php');
        }else{
            die('users Insert Error!'.mysqli_error($db));
        }
    }
}