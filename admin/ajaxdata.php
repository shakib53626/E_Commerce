<?php
include 'inc/connection.php';

if($_POST['cat_id']){
    $e_id    =$_GET['ed_id'];
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




?>