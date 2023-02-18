<?php
include('connection.php');


function Show_Sub_Category($cat_id){
    global $db;

    $sub_cat_sql = "SELECT * FROM mart_category WHERE is_parent = '$cat_id'";
    $sub_cat_res = mysqli_query($db,$sub_cat_sql);

    while($cat_info_row = mysqli_fetch_assoc($sub_cat_res)){
        $cat_id     = $cat_info_row['ID'];
        $cat_name   = $cat_info_row['cat_name'];
        $cat_img    = $cat_info_row['cat_img'];
        $sub_cname  = $cat_info_row['sub_cname'];
        $cat_status = $cat_info_row['cat_status'];

        ?>
            <tr>
                <th scope="row"><?php echo '-';?></th>
                <td><img src="assets/img/categorys/<?php echo '';?>" alt="" width="40"></td>
                <td><img src="assets/img/categorys/<?php echo $cat_img;?>" alt="" width="40"></td>
                <td><?php echo '<span class="sub_cat_icon text-center"><i class="fa-solid fa-arrow-turn-up text-info"></i></span>';?></td>
                <td><?php echo $cat_name;?></td>
                <td>
                    <?php if($cat_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?>
                </td>
                <td class="text-end">
                    <a href="category.php?edit_id=<?php echo $cat_id;?>" class="cat_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <a href="" class="cat_delete" data-bs-toggle="modal" data-bs-target="#del_id<?php echo $cat_id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                    <!-- modal Code -->
                        <div class="modal fade delet_modal" id="del_id<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-footer  p-4">
                                        <div class="confirmition-mg">
                                            <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                        </div>
                                        <div class="modal-btn">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a type="button" class="btn btn-success" href="category.php?del_id=<?php echo $cat_id;?>">Confirm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Delete modal Code End -->
                </td>
            </tr>
        
        <?php
        
    }

}




// Find Cat name brand name and isparent name......

function findVal($field,$table,$fKey){
    global $db;
    
    $catName=mysqli_query($db,"SELECT $field FROM $table WHERE ID='$fKey'");
    $row=mysqli_fetch_assoc($catName);
    $cat_name = $row[$field];
    echo $cat_name;
    return $cat_name;
}


// Delete With Image Function......
function deleteProduct(){
    global $db;
    if(isset($_GET['del_id'])){
        $del_id = $_GET['del_id'];
        $file_name_res = mysqli_query($db,"SELECT p_featured_img FROM mart_product WHERE ID='$del_id'");
        $file_row = mysqli_fetch_assoc($file_name_res);
        $file_name = $file_row['p_featured_img'];
        unlink('assets/img/products/'.$file_name);

        $res = mysqli_query($db,"DELETE FROM mart_product WHERE ID='$del_id'");
        if($res){
            header('location: add_product.php');
        }else{
            die('Add product delete Error!'.mysqli_error($db));
        }
    }
}
// Delete without image.......

function delete($deleteID,$db_name,$location){
    global $db;
    if(isset($_GET[$deleteID])){
        $del_id = $_GET[$deleteID];

        $res = mysqli_query($db,"DELETE FROM $db_name WHERE ID='$del_id'");
        if($res){
            header($location);
        }else{
            die('Add product delete Error!'.mysqli_error($db));
        }
    }
}