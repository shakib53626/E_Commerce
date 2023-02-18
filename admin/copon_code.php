




<?php include 'inc/header.php'?>
<?php include 'inc/side_menu.php'?>

        <div class="body">
            <div class="body-header">
                <h3>Dashboard</h3>
                <ul>
                    <li><a href="index.php">Home /</a></li>
                    <li><a href="">Copon Code /</a></li>
                    <li><a href="add_products.php" class="active">Add Copon</a></li>
                </ul>
                <hr>
            </div>
            <div class="body-main">
                <!-- Body main section here -->
                <div class="category">
                    <div class="pupup-category" id="add-category">
                        <div class="add-category">
                            <button class="close"><i class="fa-solid fa-xmark me-3" onclick="document.getElementById('add-category').style.display='none'"></i></button>
                            <h3 class="text-center mb-4">Add New Copon</h3>


                            <form action="core/insert.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="mb-2 d-block">Copon Code</label>
                                        <input type="text" name="copon_code" id="strlength" style=" font-weight:400; font-size:20px; letter-spacing: 1px; text-align:center;">
                                        <div class="my-3 random-gen-btn"><a href="#" id="gen" onClick="generate()">Random Generate</a></div>
                                        <label for="" class="mb-1 mt-2 d-block">Discount Amount</label>
                                        <input type="text" name="dis_amount" placeholder="Enter Discount Amount">
                                        <div class="copon_date">
                                            <label for="" class="mb-1 mt-2 d-block">Select Discount Type</label>
                                            <select name="dis_type" id="">
                                                <option value="0" selected>Percentage Discount(%)</option>
                                                <option value="1">Fixed Discount on Total Price</option>
                                            </select>
                                        </div>
                                        <div class="mt-2">
                                            <label for="">Coupon Status</label>
                                            <select name="dis_status" id="">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                        
                                    </div><!--Coll-md-6 End-->


                                    <div class="col-md-6 copon_date">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="mb-2">Starting Date</label>
                                                <input type="date" name="Copon_sdate">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="mb-2">Starting Date</label>
                                                <input type="date" name="Copon_edate">
                                            </div>
                                        </div>
                                        <div class="copon_date">
                                            <label for="" class="mb-1 mt-2 d-block">Discount On</label>
                                            <select name="dis_object" id="" onchange="discountObject(this.value)">
                                                <option value="">Choose Option......</option>
                                                <option value="1">Specific Product</option>
                                                <option value="2">Specific Category</option>
                                                <option value="3">Specific Brand</option>
                                            </select>
                                        </div>
                                        <div class="mt-2">
                                            <label for="">Select Your Desire Option</label>
                                            <select name="dis_on[]" id="dis_on" multiple>
                                            </select>
                                        </div>
                                        <div class="cat-add-btn text-end mt-5">
                                            <button type="submit" name="add_coupon">Add Copon</button>
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
                                        <th scope="col">Coupon Code</th>
                                        <th scope="col">Discount Amount</th>
                                        <th scope="col">Starting Date</th>
                                        <th scope="col">Ending Date</th>
                                        <th scope="col">Discount On</th>
                                        <th scope="col">Discount Subject</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $discount_sql = "SELECT * FROM mart_coupon";
                                        $discount_res = mysqli_query($db,$discount_sql);
                                        $serial =0;
                                        while($discount_row = mysqli_fetch_assoc($discount_res)){
                                            $dis_Id     = $discount_row['ID'];
                                            $coupon_code= $discount_row['coupon_code'];
                                            $amount     = $discount_row['amount'];
                                            $dis_on     = $discount_row['dis_on'];
                                            $start_date = $discount_row['start_date'];
                                            $end_date   = $discount_row['end_date'];
                                            $dis_on_type= $discount_row['dis_on_type'];
                                            $discount_on= $discount_row['discount_on'];
                                            $copon_status= $discount_row['copon_status'];
                                            $serial++;
                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $serial;?></th>
                                                    <td><?php echo $coupon_code;?></td>
                                                    <td>
                                                        <?php  
                                                            if($dis_on == 1){
                                                                echo '<i class="fa-solid fa-bangladeshi-taka-sign text-danger">.</i> '.$amount;
                                                            }else{
                                                                echo $amount.' <span class=text-danger>%</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $start_date;?></td>
                                                    <td><?php echo '<span class="text-danger">'.$end_date.'</span>';?></td>
                                                    <td>
                                                        <?php 
                                                            if($dis_on_type == 1){
                                                                echo 'Product';
                                                            }else if($dis_on_type == 2){
                                                                echo 'Category';
                                                            }else{
                                                                echo 'Brand';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php 
                                                        if($dis_on_type == 1){
                                                            $cat_id     = explode(',', $discount_on);
                                                            $total_dis  = count($cat_id);

                                                            for($x=1; $x < $total_dis; $x++){
                                                                $catName=mysqli_query($db,"SELECT p_name FROM mart_product WHERE ID='$cat_id[$x]'");
                                                                $row=mysqli_fetch_assoc($catName);
                                                                $cat_name = $row['p_name'];
                                                                $cat_names = $cat_name.', '; 

                                                                echo $cat_names;
                                                                
                                                            }
                                                        }
                                                        else if($dis_on_type == 2){
                                                            $cat_id     = explode(',', $discount_on);
                                                            $total_dis  = count($cat_id);

                                                            for($x=1; $x < $total_dis; $x++){
                                                                $catName=mysqli_query($db,"SELECT cat_name FROM mart_category WHERE ID='$cat_id[$x]'");
                                                                $row=mysqli_fetch_assoc($catName);
                                                                $cat_name = $row['cat_name'];
                                                                $cat_names = $cat_name.', '; 

                                                                echo $cat_names;
                                                                
                                                            }
                                                        }
                                                        else{
                                                            $cat_id     = explode(',', $discount_on);
                                                            $total_dis  = count($cat_id);

                                                            for($x=1; $x < $total_dis; $x++){
                                                                $catName=mysqli_query($db,"SELECT Brand_Name FROM mart_brand WHERE ID='$cat_id[$x]'");
                                                                $row=mysqli_fetch_assoc($catName);
                                                                $cat_name = $row['Brand_Name'];
                                                                $cat_names = $cat_name.', '; 

                                                                echo $cat_names;
                                                                
                                                            }
                                                        }
                                                    ?></td>
                                                    <td><?php if($copon_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?></td>
                                                    <td class="text-end">
                                                        <a href="copon_code.php?editid=<?php echo $dis_Id;?>" class="cat_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                        <!-- Edit Modal Code here -->



                                                        <a href="" class="cat_delete" data-bs-toggle="modal" data-bs-target="#del_id<?php echo $dis_Id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                                            <!-- modal Code -->
                                                                <div class="modal fade delet_modal" id="del_id<?php echo $dis_Id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-footer  p-4">
                                                                                <div class="confirmition-mg">
                                                                                    <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                                                                </div>
                                                                                <div class="modal-btn">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                    <a type="button" class="btn btn-success" href="copon_code.php?del_id=<?php echo $dis_Id;?>">Confirm</a>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div><!-- Delete modal Code End -->
                                                    </td>
                                                </tr>
                                            <?php
                                            delete('del_id', 'mart_coupon', 'location: copon_code.php');
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
        $editID     = $_GET['editid'];
        $cat_info_sql = "SELECT * FROM mart_coupon WHERE ID='$editID'";
        $cat_info_res = mysqli_query($db,$cat_info_sql);
        while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
            $coupon_code    = $cat_info_row['coupon_code'];
            $amount         = $cat_info_row['amount'];
            $dis_on         = $cat_info_row['dis_on'];
            $start_date     = $cat_info_row['start_date'];
            $end_date       = $cat_info_row['end_date'];
            $dis_on_type    = $cat_info_row['dis_on_type'];
            $discount_on    = $cat_info_row['discount_on'];
            $copon_status   = $cat_info_row['copon_status'];
            ?>
                    <div class="edit_category" id="edit_category">
                        <div class="add-category">
                            <a href="copon_code.php" class="close"><i class="fa-solid fa-xmark me-3"></i></a>
                            <h3 class="text-center mb-4">Edit Copon</h3>


                            <form action="core/update.php" method="POST" enctype="multipart/form-data"><!--Add Category Form code Start-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="mb-2 d-block">Copon Code</label>
                                        <input type="text" name="copon_code" id="strlength" value="<?php echo $coupon_code;?>" style=" font-weight:400; font-size:20px; letter-spacing: 1px; text-align:center;">
                                        <div class="my-3 random-gen-btn"><a href="#" id="gen" onClick="generate()">Random Generate</a></div>
                                        <label for="" class="mb-1 mt-2 d-block">Discount Amount</label>
                                        <input type="text" name="dis_amount" value="<?php echo $amount;?>" placeholder="Enter Discount Amount">
                                        <div class="copon_date">
                                            <label for="" class="mb-1 mt-2 d-block">Select Discount Type</label>
                                            <select name="dis_type" id="">
                                                <option value="0" <?php if($dis_on == 0)echo 'selected';?>>Percentage Discount(%)</option>
                                                <option value="1" <?php if($dis_on == 1)echo 'selected';?>>Fixed Discount on Total Price</option>
                                            </select>
                                        </div>
                                        <div class="mt-2">
                                            <label for="">Coupon Status</label>
                                            <select name="dis_status" id="">
                                                <option value="1" <?php if($copon_status == 1)echo 'selected';?>>Active</option>
                                                <option value="0" <?php if($copon_status == 0)echo 'selected';?>>Deactive</option>
                                            </select>
                                        </div>
                                        
                                    </div><!--Coll-md-6 End-->


                                    <div class="col-md-6 copon_date">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="mb-2">Starting Date</label>
                                                <input type="date" value="<?php echo $start_date;?>" name="Copon_sdate">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="mb-2">Starting Date</label>
                                                <input type="date" value="<?php echo $end_date;?>" name="Copon_edate">
                                            </div>
                                        </div>
                                        <div class="copon_date">
                                            <label for="" class="mb-1 mt-2 d-block">Discount On</label>
                                            <select name="dis_object" id="" onchange="discountObj(this.value)">
                                                <option value="1" <?php if($dis_on_type == 1)echo 'selected';?>>Specific Product</option>
                                                <option value="2" <?php if($dis_on_type == 2)echo 'selected';?>>Specific Category</option>
                                                <option value="3" <?php if($dis_on_type == 3)echo 'selected';?>>Specific Brand</option>
                                            </select>
                                        </div>
                                        <div class="mt-2">
                                            <label for="">Select Your Desire Option</label>
                                            <select name="edis_on[]" id="udis_on" multiple>
                                                <?php
                                                    if($dis_on_type == 1){
                                                        $cat_info_sql = "SELECT * FROM mart_product";
                                                        $cat_info_res = mysqli_query($db,$cat_info_sql);
                                                        
                                                        while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
                                                            $cat_id     = $cat_info_row['ID'];
                                                            $cat_name   = $cat_info_row['p_name'];
                                                            ?><option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option><?php
                                                        
                                                        }
                                                    }
                                                    else if($dis_on_type == 2){
                                                        $cat_info_sql = "SELECT * FROM mart_category";
                                                        $cat_info_res = mysqli_query($db,$cat_info_sql);
                                                        
                                                        while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
                                                            $cat_id     = $cat_info_row['ID'];
                                                            $cat_name   = $cat_info_row['cat_name'];
                                                            ?><option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option><?php
                                                        
                                                        }
                                                    }
                                                    else{
                                                        $cat_info_sql = "SELECT * FROM mart_brand";
                                                        $cat_info_res = mysqli_query($db,$cat_info_sql);
                                                        
                                                        while($cat_info_row = mysqli_fetch_assoc($cat_info_res)){
                                                            $cat_id     = $cat_info_row['ID'];
                                                            $cat_name   = $cat_info_row['Brand_Name'];
                                                            ?><option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option><?php
                                                        
                                                        }
                                                    }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="cat-add-btn text-end mt-5">
                                            <input type="hidden" name="editid" value="<?php echo $editID;?>">
                                            <button type="submit" name="edit_coupon">Add Copon</button>
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
