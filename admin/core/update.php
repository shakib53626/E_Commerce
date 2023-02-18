<?php
include '../inc/connection.php';
//  update Category code
if(isset($_POST['update_category'])){
    $update_cat_name    = $_POST['cat_name'];
    $update_is_parent   = $_POST['is_parent'];
    $update_cat_status  = $_POST['cat_status'];
    $editid  = $_POST['editid'];

    
    if(!empty($_FILES['choose_file']['name'])){
        $file_name = $_FILES['choose_file']['name'];
        $tmp_name = $_FILES['choose_file']['tmp_name'];

        $extn = explode('.', $file_name);
        $file_extn = strtolower(end($extn));

        $extensions = array('png', 'jpg', 'jpeg');
        if(in_array($file_extn,$extensions) === true){
            $file_name_res = mysqli_query($db,"SELECT cat_img FROM mart_category WHERE ID='$editid'");
            $file_row = mysqli_fetch_assoc($file_name_res);
            $pfile_name = $file_row['cat_img'];
            unlink('../assets/img/categorys/'.$pfile_name);

            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/categorys/'.$update_name);
            $cat_update_sql = "UPDATE mart_category SET cat_name='$update_cat_name', cat_img='$update_name', is_parent='$update_is_parent', cat_status='$update_cat_status' WHERE ID='$editid'";
            $cat_update_res = mysqli_query($db,$cat_update_sql);
            if($cat_update_res){
                header('location: ../category.php');
            }else{
                die('Category Update Error!'.mysqli_error($db));
            }
        }else{
            echo 'Please Upload and Image File';
        }

    }else{
        $cat_update_sql = "UPDATE mart_category SET cat_name='$update_cat_name', is_parent='$update_is_parent', cat_status='$update_cat_status' WHERE ID='$editid'";
        $cat_update_res = mysqli_query($db,$cat_update_sql);
        if($cat_update_res){
            header('location: ../category.php');
        }else{
            die('Category Update Error!'.mysqli_error($db));
        }
    }

}


//  update Brand code
if(isset($_POST['update_brand'])){
    $update_brand_name    = $_POST['brand_name'];
    $update_is_parent   = $_POST['is_parent'];
    $update_brand_status  = $_POST['brand_status'];
    $beditid  = $_POST['beditid'];

    
    if(!empty($_FILES['choose_file']['name'])){
        $file_name = $_FILES['choose_file']['name'];
        $tmp_name = $_FILES['choose_file']['tmp_name'];

        $extn = explode('.', $file_name);
        $file_extn = strtolower(end($extn));

        $extensions = array('png', 'jpg', 'jpeg');
        if(in_array($file_extn,$extensions) === true){
            $file_name_res = mysqli_query($db,"SELECT Brand_Image FROM mart_brand WHERE ID='$beditid'");
            $file_row = mysqli_fetch_assoc($file_name_res);
            $pfile_name = $file_row['Brand_Image'];
            unlink('../assets/img/brands/'.$pfile_name);

            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/brands/'.$update_name);
            $brand_update_sql = "UPDATE mart_brand SET Brand_Name='$update_brand_name', Brand_Image='$update_name', is_parent='$update_is_parent', Brand_Status='$update_brand_status' WHERE ID='$beditid'";
            $brand_update_res = mysqli_query($db,$brand_update_sql);
            if($brand_update_res){
                header('location: ../brand.php');
            }else{
                die('Brand Update Error!'.mysqli_error($db));
            }
        }else{
            echo 'Please Upload and Image File';
        }

    }else{
        $cat_update_sql = "UPDATE mart_brand SET Brand_Name='$update_brand_name', is_parent='$update_is_parent', Brand_Status='$update_brand_status' WHERE ID='$beditid'";
        $cat_update_res = mysqli_query($db,$cat_update_sql);
        if($cat_update_res){
            header('location: ../brand.php');
        }else{
            die('Brand Update Error!'.mysqli_error($db));
        }
    }

}

// Coupon Update Code HEre........

if(isset($_POST['edit_coupon'])){
    $editID  = $_POST['editid'];
    $copon_code     = $_POST['copon_code'];
    $dis_amount     = $_POST['dis_amount'];
    $dis_type       = $_POST['dis_type'];
    $Copon_sdate    = $_POST['Copon_sdate'];
    $Copon_edate    = $_POST['Copon_edate'];
    $dis_object     = $_POST['dis_object'];
    $dis_on         = $_POST['edis_on'];
    $dis_status     = $_POST['dis_status'];


    if(!empty($dis_on)){
        $id_array = '';
        foreach($dis_on as $data){
            $data = ','.$data;
            $id_array .= $data;
        }
        $dis_sql    = "UPDATE mart_coupon SET coupon_code='$copon_code', amount='$dis_amount', dis_on='$dis_type', start_date='$Copon_sdate', end_date='$Copon_edate', dis_on_type='$dis_object', discount_on='$id_array', copon_status='$dis_status' WHERE ID='$editID'";
        $dis_res    = mysqli_query($db,$dis_sql);
        if($dis_res){
            header('location: ../copon_code.php');
        }else{
            die('Copon Code add error!'.mysqli_error($db));
        }
    }else{
        $dis_sql    = "UPDATE mart_coupon SET coupon_code='$copon_code', amount='$dis_amount', dis_on='$dis_type', start_date='$Copon_sdate', end_date='$Copon_edate', dis_on_type='$dis_object', copon_status='$dis_status' WHERE ID='$editID'";
        $dis_res    = mysqli_query($db,$dis_sql);
        if($dis_res){
            header('location: ../copon_code.php');
        }else{
            die('Copon Code add error!'.mysqli_error($db));
        }
    }
    
}