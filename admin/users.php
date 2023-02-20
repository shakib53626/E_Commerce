




<?php include 'inc/header.php'?>
<?php include 'inc/side_menu.php'?>

        <div class="body">
            <div class="body-header">
                <h3>Dashboard</h3>
                <ul>
                    <li><a href="index.php">Home /</a></li>
                    <li><a href="" class="active">Users</a></li>
                </ul>
                <hr>
            </div>
            <div class="body-main">
                <!-- Body main section here -->
                <div class="category">
                    <div class="pupup-category" id="add-category">
                        <div class="add-category">
                            <button class="close"><i class="fa-solid fa-xmark me-3" onclick="document.getElementById('add-category').style.display='none'"></i></button>
                            <h3 class="text-center mb-4">Add New User</h3>


                            <form action="core/insert.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                                <div class="row">
                                      <div class="col-md-6">
                                        <label for="" class="d-block">User Name</label>
                                        <input type="text" name="user_name" placeholder="Enter User Name....." required>

                                        <label for="" class="mt-2 d-block">User Email</label>
                                        <input type="email" name="user_mail" placeholder="Enter Mail....." required>
                                        
                                        <label for="" class="mt-2 d-block">Password</label>
                                        <input type="password" name="user_pass" placeholder="Create a Password.....">

                                        <label for="" class="mt-2 d-block">Phone Number</label>
                                        <input type="number" name="phone">

                                        <div class="mt-2">
                                            <label for="">User Status</label>
                                            <select name="user_status" id="">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        
                                      </div><!--Coll-md-6 End-->


                                    <div class="col-md-6">
                                        <div>
                                            <label for="">Address</label>
                                            <textarea name="address" id="" cols="5" rows="1" class="d-block address_area" style="width:100%;background:transparent;border:1px solid green; padding: 5px 10px;" placeholder="Enter Your Address...."></textarea>
                                        </div>
                                        <div class="panel">
                                          <h4>Profile Image</h4>
                                          <div class="button_outer button_outer_edit">
                                              <div class="btn_upload">
                                                  <input type="file" id="edit_upload_file" name="choose_file">
                                                  Upload Image
                                              </div>
                                              
                                              <div class="processing_bar"></div>
                                              <div class="success_box"></div>
                                          </div>
                                        </div>
                                        <div class="error_msg edit_error_msg"></div>
                                        <div class="uploaded_file_view" id="edit_uploaded_view">
                                            <span class="file_remove">X</span>
                                        </div>

                                        <div class="cat-add-btn text-end mt-5">
                                            <button type="submit" name="add_user">Add User</button>
                                        </div>
                                    </div><!--Coll-md-6 End-->
                                </div>
                            </form><!--Add Category Form code End-->
                        </div><!--Add-category code End-->
                    </div>
                </div><!-- Category section here -->
                <div class="category-info">
                    <div class="row">
                        <div class="col-md-6 text-start">
                            <div class="cat-info-search">
                                <span>Search :</span> <input type="text" id="search" autocomplete="off" placeholder="Search......">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="add-cat-button text-end mb-3">
                                <a type="button" class="add_new_category" id="add_cat_btn" onclick="clcAddNew();"><i class="fa-solid fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="cat-all-info mt-4">
                        <div class="cat-info-table">
                            <h5 class="mb-4 ms-3">All Coupon Code Information</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User Image</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $user_sql = "SELECT * FROM mart_user";
                                        $user_res = mysqli_query($db,$user_sql);
                                        $serial =0;
                                        while($user_row = mysqli_fetch_assoc($user_res)){
                                            $user_Id      = $user_row['ID'];
                                            $user_name    = $user_row['user_name'];
                                            $user_mail    = $user_row['user_mail'];
                                            $pass         = $user_row['pass'];
                                            $phone        = $user_row['phone'];
                                            $user_address = $user_row['user_address'];
                                            $user_img     = $user_row['user_img'];
                                            $user_status  = $user_row['user_status'];
                                            $serial++;
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $serial;?></th>
                                                    <td><?php
                                                        if(empty($user_img)){
                                                            echo '<p class="user_logo">'.substr($user_name,0,1).'</p>';
                                                        }else{
                                                            echo '<img src="assets/img/users/'.$user_img.'" alt="" width="50">';
                                                        }
                                                    ?></td>
                                                    <td><?php echo '<h5>'.$user_name.'</h5>';?></td>
                                                    <td><?php echo $user_mail;?></td>
                                                    <td><?php echo '+880 '.$phone;?></td>
                                                    <td><?php echo $user_address;?></td>
                                                    <td><?php if($user_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?></td>
                                                    <td class="text-end">
                                                        <a href="users.php?editid=<?php echo $user_Id;?>" class="cat_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                        <!-- Edit Modal Code here -->



                                                        <a href="" class="cat_delete" data-bs-toggle="modal" data-bs-target="#del_id<?php echo $user_Id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                                            <!-- modal Code -->
                                                                <div class="modal fade delet_modal" id="del_id<?php echo $user_Id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-footer  p-4">
                                                                                <div class="confirmition-mg">
                                                                                    <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                                                                </div>
                                                                                <div class="modal-btn">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                    <a type="button" class="btn btn-success" href="users.php?del_id=<?php echo $user_Id;?>">Confirm</a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div><!-- Delete modal Code End -->
                                                    </td>
                                                </tr>
                                            <?php
                                            deleteWithImg('del_id','user_img','mart_user','ID','assets/img/users/','location: users.php');
                                        }
                                    ?>

                                    
                                </tbody>
                            </table>
                        </div><!-- cat-info-table -->
                    </div><!-- Cat-all-info End -->
                </div>
            </div>
                    


        </div>

<!-- ------------------------------------------------------
-----------------------------------------------------------
            Edit Category Code here
----------------------------------------------------------
--------------------------------------------------------- -->
<?php
    if(isset($_GET['editid'])){
        $edit_ID    = $_GET['editid'];
        $user_sql = "SELECT * FROM mart_user WHERE ID='$edit_ID'";
        $user_res = mysqli_query($db,$user_sql);
        while($user_row = mysqli_fetch_assoc($user_res)){
            $user_name    = $user_row['user_name'];
            $user_mail    = $user_row['user_mail'];
            $pass         = $user_row['pass'];
            $phone        = $user_row['phone'];
            $user_address = $user_row['user_address'];
            $user_img     = $user_row['user_img'];
            $user_status  = $user_row['user_status'];


            ?>
                <div class="edit_category" id="edit_category">
                    <div class="add-category">
                        <a href="users.php" class="close"><i class="fa-solid fa-xmark me-3"></i></a>
                        <h3 class="text-center mb-4">Edit User</h3>


                        <form action="core/update.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                            <div class="row">
                                    <div class="col-md-6">
                                    <label for="" class="d-block">User Name</label>
                                    <input type="text" name="user_name" value="<?php echo $user_name;?>" required>

                                    <label for="" class="mt-2 d-block">User Email</label>
                                    <input type="email" name="user_mail" value="<?php echo $user_mail;?>" required>
                                    
                                    <label for="" class="mt-2 d-block">Password</label>
                                    <input type="password" name="user_pass" placeholder="Change Password.....">

                                    <label for="" class="mt-2 d-block">Phone Number</label>
                                    <input type="number" value="<?php echo '0'.$phone;?>" name="phone">

                                    <div class="mt-2">
                                        <label for="">User Status</label>
                                        <select name="user_status" id="">
                                            <option value="1" <?php if($user_status == 1)echo 'selected';?>>Active</option>
                                            <option value="0" <?php if($user_status == 0)echo 'selected';?>>Deactive</option>
                                        </select>
                                    </div>
                                    
                                    </div><!--Coll-md-6 End-->


                                <div class="col-md-6">
                                    <div>
                                        <label for="">Address</label>
                                        <textarea name="address" id="" cols="5" rows="1" class="d-block address_area" style="width:100%;background:transparent;border:1px solid green; padding: 5px 10px;" placeholder="Enter Your Address...."><?php echo $user_address;?></textarea>
                                    </div>
                                    <div class="panel">
                                        <?php
                                            if(empty($user_img)){
                                                echo '<p class="alert alert-danger">No Image Found</p>';
                                            }else{
                                                ?>
                                                <div class="mb-3"><img src="assets/img/users/<?php echo $user_img;?>" alt="" width="100"></div>
                                                <?php
                                            }
                                        ?>
                                        <div class="button_outer button_outer_edit">
                                            <div class="btn_upload">
                                                <input type="file" id="edit_upload_file" name="choose_file">
                                                Upload Image
                                            </div>
                                            <div class="processing_bar"></div>
                                            <div class="success_box"></div>
                                        </div>
                                    </div>
                                    <div class="error_msg edit_error_msg"></div>
                                    <div class="uploaded_file_view" id="edit_uploaded_view">
                                        <span class="file_remove">X</span>
                                    </div>

                                    <div class="cat-add-btn text-end mt-5">
                                        <input type="hidden" name="editID" value="<?php echo $edit_ID;?>">
                                        <button type="submit" name="update_user">Update User</button>
                                    </div>
                                </div><!--Coll-md-6 End-->
                            </div>
                        </form><!--Add Category Form code End-->
                    </div><!--Add-category code End-->
                </div>
            <?php
        }
    }
?>


<?php include('inc/footer.php')?>
