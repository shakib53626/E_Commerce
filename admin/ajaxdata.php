<?php
include 'inc/connection.php';

if($_POST['cat_id']){
    // $e_id    = $_GET['ed_id'];
    $cat_pid = $_POST['cat_id'];
    $product_cat_sql = "SELECT * FROM mart_category WHERE  is_parent=$cat_pid";
    $product_cat_res = mysqli_query($db,$product_cat_sql);
    echo '<option value="">Choose Category.....</option>';
    while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
        $sub_cat_id     = $product_cat_row['ID'];
        $sub_cat_name   = $product_cat_row['cat_name'];
        ?><option value="<?php echo $sub_cat_id;?>"><?php echo $sub_cat_name;?></option><?php
    }
}
if($_POST['ecat_id']){
    $dis_on     = $_POST['ecat_id'];
    if($dis_on == 1){
        $product_cat_sql = "SELECT * FROM mart_product";
        $product_cat_res = mysqli_query($db,$product_cat_sql);
        echo '<option value="">Choose Product.....</option>';
        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
            $product_id     = $product_cat_row['ID'];
            $product_name   = $product_cat_row['p_name'];
            ?><option value="<?php echo $product_id;?>"><?php echo $product_name;?></option><?php
        }
    }
    if($dis_on == 2){
        $product_cat_sql = "SELECT * FROM mart_category";
        $product_cat_res = mysqli_query($db,$product_cat_sql);
        echo '<option value="">Choose Category.....</option>';
        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
            $sub_cat_id     = $product_cat_row['ID'];
            $sub_cat_name   = $product_cat_row['cat_name'];
            ?><option value="<?php echo $sub_cat_id;?>"><?php echo $sub_cat_name;?></option><?php
        }
    }
    if($dis_on == 3){
        $product_cat_sql = "SELECT * FROM mart_brand";
        $product_cat_res = mysqli_query($db,$product_cat_sql);
        echo '<option value="">Choose Category.....</option>';
        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
            $sub_cat_id     = $product_cat_row['ID'];
            $sub_cat_name   = $product_cat_row['Brand_Name'];
            ?><option value="<?php echo $sub_cat_id;?>"><?php echo $sub_cat_name;?></option><?php
        }
    }


}





if($_POST['ucat_id']){
    $dis_on     = $_POST['ucat_id'];
    if($dis_on == 1){
        $product_cat_sql = "SELECT * FROM mart_product";
        $product_cat_res = mysqli_query($db,$product_cat_sql);
        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
            $product_id     = $product_cat_row['ID'];
            $product_name   = $product_cat_row['p_name'];
            ?><option value="<?php echo $product_id;?>"><?php echo $product_name;?></option><?php
        }
    }
    if($dis_on == 2){
        $product_cat_sql = "SELECT * FROM mart_category";
        $product_cat_res = mysqli_query($db,$product_cat_sql);
        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
            $sub_cat_id     = $product_cat_row['ID'];
            $sub_cat_name   = $product_cat_row['cat_name'];
            ?><option value="<?php echo $sub_cat_id;?>"><?php echo $sub_cat_name;?></option><?php
        }
    }
    if($dis_on == 3){
        $product_cat_sql = "SELECT * FROM mart_brand";
        $product_cat_res = mysqli_query($db,$product_cat_sql);
        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
            $sub_cat_id     = $product_cat_row['ID'];
            $sub_cat_name   = $product_cat_row['Brand_Name'];
            ?><option value="<?php echo $sub_cat_id;?>"><?php echo $sub_cat_name;?></option><?php
        }
    }


}



?>