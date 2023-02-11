<?php include 'inc/header.php'?>
<?php include 'inc/side_menu.php'?>

        <div class="body">
            <!-- Body main section here -->
            <?php
                $data = isset($_GET['data']) ? $_GET['data'] : 'view';

                    if($data == 'view'){
                        // View code heare
                        ?>

                            <div class="body-header" id="body-header">
                                <h3>Dashboard</h3>
                                <ul>
                                    <li><a href="index.php">Home /</a></li>
                                    <li><a href="add_product.php">Products /</a></li>
                                    <li><a href="add_product.php?data=add">Add New Product /</a></li>
                                    <li><a href="add_product.php" class="active">All Product</a></li>
                                    <hr>
                                </ul>
                            </div>
                            <div class="products">
                                <div class="view-products">
                                    <div class="row mb-5">
                                        <div class="col-md-6 text-start">
                                            <div class="cat-info-search">
                                                <span>Search :</span> <input type="text" id="search" autocomplete="off" placeholder="Search......">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="add-cat-button text-end mb-3">
                                                <a href="add_product.php?data=add" type="button" class="add_new_cat" id="add_brand_btn"><i class="fa-solid fa-plus"></i> Add New</a>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width=10%;">#</th>
                                                <th scope="col" style="width=10%;">Image</th>
                                                <th scope="col" style="width=15%;">Product Name</th>
                                                <th scope="col" style="width=10%;">Category</th>
                                                <th scope="col" style="width=10%;">Sub Category</th>
                                                <th scope="col" style="width=10%;">Brand</th>
                                                <th scope="col" style="width=10%;">Price</th>
                                                <th scope="col" style="width=5%;">Stocks</th>
                                                <th scope="col" style="width=10%;">Status</th>
                                                <th scope="col" class="text-end" style="width=10%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $p_read_sql = "SELECT * FROM mart_product;";
                                                $serial=0;
                                                $p_read_res = mysqli_query($db,$p_read_sql);
                                                while($p_read_row = mysqli_fetch_assoc($p_read_res)){
                                                    $product_id             = $p_read_row['ID'];
                                                    $product_name           = $p_read_row['p_name'];
                                                    $p_category             = $p_read_row['p_category'];
                                                    $p_sub_category         = $p_read_row['p_sub_category'];
                                                    $p_brand                = $p_read_row['p_brand'];
                                                    $p_reg_price            = $p_read_row['p_reg_price'];
                                                    $p_offer_price          = $p_read_row['p_offer_price'];
                                                    $p_featured_img         = $p_read_row['p_featured_img'];
                                                    $p_stock                = $p_read_row['p_stock'];
                                                    $p_status               = $p_read_row['p_status'];
                                                    $serial++;
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $serial;?></th>
                                                            <td><img src="assets/img/products/<?php echo $p_featured_img;?>" alt="" width="40"></td>
                                                            <td><?php echo $product_name;?></td>
                                                            <td>
                                                                <?php  findVal('cat_name','mart_category',$p_category);?>
                                                            </td>
                                                            <td>
                                                                <?php  findVal('cat_name','mart_category',$p_sub_category);?>
                                                            </td>
                                                            <td>
                                                                <?php findVal('Brand_Name','mart_brand',$p_brand);?>
                                                            </td>
                                                            <td><?php echo '<span class="text-danger" style="text-decoration:line-through">'.$p_reg_price.'</span>'.' '.$p_offer_price;?></td>
                                                            <td><?php echo $p_stock;?></td>
                                                            <td><?php if($p_status == 0)echo '<span class="badge bg-danger">Deactive</span>';else echo '<span class="badge bg-success">Active</span>';?></td>
                                                            <td class="text-end">
                                                                <a href="add_product.php?data=edit&&editid=<?php echo $product_id;?>" class="cat_edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                                <!-- Edit Modal Code here -->



                                                                <a href="" class="cat_delete" data-bs-toggle="modal" data-bs-target="#del_id<?php echo $product_id;?>"><i class="fa-regular fa-trash-can"></i> Delete</a>
                                                                    <!-- modal Code -->
                                                                        <div class="modal fade delet_modal" id="del_id<?php echo $product_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-footer  p-4">
                                                                                        <div class="confirmition-mg">
                                                                                            <h5>Are You Sure You Want to <span class="text-danger">Delete</span> This ?</h5>
                                                                                        </div>
                                                                                        <div class="modal-btn">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                            <a type="button" class="btn btn-success" href="add_product.php?del_id=<?php echo $product_id;?>">Confirm</a>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div><!-- Delete modal Code End -->
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                                 deleteProduct();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        
                        <?php
                    }
                    if($data == 'add'){
                        // View code heare
                        ?>
                            <div class="body-header" id="body-header">
                                <h3>Dashboard</h3>
                                <ul>
                                    <li><a href="index.php">Home /</a></li>
                                    <li><a href="add_product.php">Products /</a></li>
                                    <li><a href="add_product.php?data=add" class="active">Add New Product /</a></li>
                                    <li><a href="add_product.php">All Product</a></li>
                                    <hr>
                                </ul>
                            </div>
                            <form action="core/insert.php" method="POST" enctype="multipart/form-data">
                                <div class="add_product mt-5">
                                    <div class="row">
                                        <div class="col-md-8 p-5">
                                            <form action="">
                                                <div class="add_p">
                                                    <div class="row">
                                                        <div class="col-md-4 p_name">
                                                            <label for="">Product Name<span class="required">*</span></label>
                                                            <input type="text" name="product_name" placeholder="Enter Product Name" required>
                                                        </div>
                                                        <div class="col-md-4 p_name">
                                                            <label for="">Product Category</label>
                                                            <select name="product_cat" id="pcat" onchange="fetchSubCat(this.value)">
                                                                <option value="">Choose Category.....</option>
                                                                <?php
                                                                    $product_cat_sql = "SELECT * FROM mart_category WHERE  is_parent='0' ORDER BY cat_name ASC";
                                                                    $product_cat_res = mysqli_query($db,$product_cat_sql);
                                                                    while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
                                                                        $cat_id     = $product_cat_row['ID'];
                                                                        $cat_name   = $product_cat_row['cat_name'];
                                                                        ?><option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option><?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 p_name">
                                                            <label for="">Product Sub-Category</label>
                                                            <select name="product_sub_cat" id="psubcat">
                                                                <option value="">Choose Category.....</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="p_name">
                                                            <label for="" class="mb-2">Short Description<span class="required">*</span></label>
                                                            <textarea name="short_desc" id="" cols="30" rows="2" placeholder="Product Short Description Here....." required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="p_name">
                                                            <label for="" class="mb-2">Big Description</label>
                                                            <textarea name="editor" id="editor" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <form action="" method="post" enctype="multipart/form-data" id="form-upload">
                                                                <div class="form-group mt-5">
                                                                    <label for="">Choose Gallery Images</label>
                                                                    <input type="file" class="form-control mb-4 mt-1 py-1 px-2" name="images[]" multiple id="upload-img" />
                                                                </div>
                                                                <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-4 p-5">
                                            <div class="row p_price">
                                                <div class="col-md-6">
                                                    <label for="">Regular Price<span class="required">*</span></label>
                                                    <input type="text" name="reg_price" class="mt-2">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Offer Price</label>
                                                    <input type="text" name="offer_price" class="mt-2" required>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <div>
                                                        <label for="">Product Brand</label>
                                                        <select name="product_brand" id="" class="p_brand">
                                                            <option value="">Choose Brand.....</option>
                                                            <?php
                                                                $product_brand_sql = "SELECT * FROM mart_brand";
                                                                $product_brand_res = mysqli_query($db,$product_brand_sql);
                                                                while($product_brand_row = mysqli_fetch_assoc($product_brand_res)){
                                                                    $pbrand_id      = $product_brand_row['ID'];
                                                                    $pbrand_name    = $product_brand_row['Brand_Name'];
                                                                    ?><option value="<?php echo $pbrand_id;?>"><?php echo $pbrand_name;?></option><?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p_price">
                                                    <label for="">Product Stock</label>
                                                    <input type="text" name="p_stock" class="mt-2" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="panel">
                                                    <div class="button_outer">
                                                        <div class="btn_upload">
                                                            <input type="file" id="upload_file" name="choose_file">
                                                            Upload Image
                                                        </div>
                                                        <div class="processing_bar"></div>
                                                        <div class="success_box"></div>
                                                    </div>
                                                    <h5>Upload Features Image</h5>
                                                </div>
                                                <div class="error_msg"></div>
                                                <div class="uploaded_file_view mb-3" id="uploaded_view">
                                                    <span class="file_remove">X</span>
                                                </div>
                                            </div>
                                            <div class="publish">
                                                <button type="submit" name="product_add">Publish</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php
                    }
                    if($data == 'edit'){
                        // View code heare
                        if(isset($_GET['editid'])){
                            $edit_ID    = $_GET['editid'];

                            $edit_product_sql = "SELECT * FROM mart_product WHERE ID='$edit_ID'";
                            $edit_product_res = mysqli_query($db,$edit_product_sql);
                            while($edit_product_row = mysqli_fetch_assoc($edit_product_res)){
                                $product_name       = $edit_product_row['p_name'];
                                $product_cat        = $edit_product_row['p_category'];
                                $product_sub_cat    = $edit_product_row['p_sub_category'];
                                $product_brand      = $edit_product_row['p_brand'];
                                $product_reg_price  = $edit_product_row['p_reg_price'];
                                $product_offer_price= $edit_product_row['p_offer_price'];
                                $p_featured_img     = $edit_product_row['p_featured_img'];
                                $p_short_desc       = $edit_product_row['p_short_desc'];
                                $p_long_desc        = $edit_product_row['p_long_desc'];
                                $p_stock            = $edit_product_row['p_stock'];
                                $p_status           = $edit_product_row['p_status'];
                            }
                            ?>
                                <div class="body-header" id="body-header">
                                    <h3>Dashboard</h3>
                                    <ul>
                                        <li><a href="index.php">Home /</a></li>
                                        <li><a href="add_product.php">Products /</a></li>
                                        <li><a href="add_product.php?data=edit" class="active">Edit Product Information /</a></li>
                                        <li><a href="add_product.php">All Product</a></li>
                                        <hr>
                                    </ul>
                                </div>
                                <form action="add_product.php?data=update" method="POST" enctype="multipart/form-data">
                                    <div class="add_product mt-5">
                                        <div class="row">
                                            <div class="col-md-8 p-5">
                                                <form action="">
                                                    <div class="add_p">
                                                        <div class="row">
                                                            <div class="col-md-4 p_name">
                                                                <label for="">Product Name<span class="required">*</span></label>
                                                                <input type="text" name="product_name" value="<?php echo $product_name;?>" placeholder="Enter Product Name" required>
                                                            </div>
                                                            <div class="col-md-4 p_name">
                                                                <label for="">Product Category</label>
                                                                <select name="product_cat" id="pcat" onchange="fetchSubCat(this.value)">
                                                                    <option value="">Choose Category.....</option>
                                                                    <?php
                                                                        $product_cat_sql = "SELECT * FROM mart_category WHERE  is_parent='0' ORDER BY cat_name ASC";
                                                                        $product_cat_res = mysqli_query($db,$product_cat_sql);
                                                                        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
                                                                            $cat_id     = $product_cat_row['ID'];
                                                                            $cat_name   = $product_cat_row['cat_name'];
                                                                            ?><option value="<?php echo $cat_id;?>"<?php if($product_cat == $cat_id)echo 'selected';?>><?php echo $cat_name;?></option><?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4 p_name">
                                                                <label for="">Product Sub-Category</label>
                                                                <select name="product_sub_cat" id="psubcat">
                                                                    <option value="">Choose Category.....</option>
                                                                    <?php
                                                                        $product_cat_sql = "SELECT * FROM mart_category WHERE is_parent='$product_cat'";
                                                                        $product_cat_res = mysqli_query($db,$product_cat_sql);
                                                                        while($product_cat_row = mysqli_fetch_assoc($product_cat_res)){
                                                                            $cat_id     = $product_cat_row['ID'];
                                                                            $cat_name   = $product_cat_row['cat_name'];
                                                                            ?><option value="<?php echo $cat_id;?>"<?php if($product_sub_cat == $cat_id)echo 'selected';?>><?php echo $cat_name;?></option><?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="p_name">
                                                                <label for="" class="mb-2">Short Description<span class="required">*</span></label>
                                                                <textarea name="short_desc" id="" cols="30" rows="2" placeholder="Product Short Description Here....." required><?php echo $p_short_desc;?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="p_name">
                                                                <label for="" class="mb-2">Big Description</label>
                                                                <textarea name="editor" id="editor" cols="30" rows="10"><?php echo $p_long_desc;?></textarea>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <form action="" method="post" enctype="multipart/form-data" id="form-upload">
                                                                    <div class="form-group mt-5">
                                                                        <label for="">Choose Gallery Images</label>
                                                                        <input type="file" class="form-control mb-4 mt-1 py-1 px-2" name="images[]" multiple id="upload-img" />
                                                                    </div>
                                                                    <div class="img-thumbs img-thumbs-hidden" id="img-preview"></div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4 p-5">
                                                <div class="row p_price">
                                                    <div class="col-md-6">
                                                        <label for="">Regular Price<span class="required">*</span></label>
                                                        <input type="number" value="<?php echo $product_reg_price;?>" name="reg_price" class="mt-2">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="">Offer Price</label>
                                                        <input type="number" name="offer_price" value="<?php echo $product_offer_price;?>" class="mt-2" required>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-md-6">
                                                        <div>
                                                            <label for="">Product Brand</label>
                                                            <select name="product_brand" id="" class="p_brand">
                                                                <option value="">Choose Brand.....</option>
                                                                <?php
                                                                    $product_brand_sql = "SELECT * FROM mart_brand";
                                                                    $product_brand_res = mysqli_query($db,$product_brand_sql);
                                                                    while($product_brand_row = mysqli_fetch_assoc($product_brand_res)){
                                                                        $pbrand_id      = $product_brand_row['ID'];
                                                                        $pbrand_name    = $product_brand_row['Brand_Name'];
                                                                        ?><option value="<?php echo $pbrand_id;?>" <?php if($product_brand == $pbrand_id)echo 'selected'?>><?php echo $pbrand_name;?></option><?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p_price">
                                                        <label for="">Product Stock</label>
                                                        <input type="number" name="p_stock" value="<?php echo $p_stock;?>" class="mt-2" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="cat-status mt-4">
                                                            <label for="" class="mb-2 d-block">Category Status</label>
                                                            <select name="product_status" id="">
                                                                <option value="1" <?php if($p_status == 1)echo 'selected';?>>Active</option>
                                                                <option value="0" <?php if($p_status == 0)echo 'selected';?>>Deactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="panel">
                                                        <?php
                                                            if(empty($p_featured_img)){
                                                                echo '<p class="alert alert-danger">No Image Found</p>';
                                                            }else{
                                                                ?><div class="mb-3"><img src="assets/img/products/<?php echo $p_featured_img;?>" alt="" width="100"></div><?php
                                                            }
                                                        
                                                        ?>
                                                        <div class="button_outer">
                                                            <div class="btn_upload">
                                                                <input type="file" id="upload_file" name="choose_file">
                                                                Change Image
                                                            </div>
                                                            <div class="processing_bar"></div>
                                                            <div class="success_box"></div>
                                                        </div>
                                                    </div>
                                                    <div class="error_msg"></div>
                                                    <div class="uploaded_file_view mb-3" id="uploaded_view">
                                                        <span class="file_remove">X</span>
                                                    </div>
                                                </div>
                                                <div class="publish">
                                                    <input type="hidden" name="peditID" value="<?php echo $edit_ID;?>">
                                                    <button type="submit" name="product_update">Publish</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php
                        }
                        
                    }
                    if($data == 'update'){
                        if($_SERVER['REQUEST_METHOD'] === 'POST'){
                            $product_name       = $_POST['product_name'];
                            $product_cat        = $_POST['product_cat'];
                            $product_sub_cat    = $_POST['product_sub_cat'];
                            $product_sdesc      = mysqli_real_escape_string($db,$_POST['short_desc']);
                            $product_bdesc      = mysqli_real_escape_string($db,$_POST['editor']);
                            $product_re_price   = $_POST['reg_price'];
                            $product_offer_price   = $_POST['offer_price'];
                            $product_brand      = $_POST['product_brand'];
                            $product_stock      = $_POST['p_stock'];
                            $product_status      = $_POST['product_status'];
                            $peditid  = $_POST['peditID'];
                        
                            
                            if(!empty($_FILES['choose_file']['name'])){
                                $file_name = $_FILES['choose_file']['name'];
                                $tmp_name = $_FILES['choose_file']['tmp_name'];
                        
                                $extn = explode('.', $file_name);
                                $file_extn = strtolower(end($extn));
                        
                                $extensions = array('png', 'jpg', 'jpeg');
                                if(in_array($file_extn,$extensions) === true){
                                    $file_name_res = mysqli_query($db,"SELECT p_featured_img FROM mart_product WHERE ID='$peditid'");
                                    $file_row = mysqli_fetch_assoc($file_name_res);
                                    $pfile_name = $file_row['p_featured_img'];
                                    unlink('assets/img/products/'.$pfile_name);

                                    $update_name = rand().$file_name;
                                    move_uploaded_file($tmp_name, 'assets/img/products/'.$update_name);
                                    $product_update_sql = "UPDATE mart_product SET p_name='$product_name', p_category='$product_cat', p_sub_category='$product_sub_cat', p_brand='$product_brand', p_reg_price='$product_re_price', p_offer_price='$product_offer_price', p_featured_img='$update_name', p_short_desc='$product_sdesc', p_long_desc='$product_bdesc', p_stock='$product_stock', p_status='$product_status' WHERE ID='$peditid'";
                                    $product_update_res = mysqli_query($db,$product_update_sql);
                                    if($product_update_res){
                                        header('location: add_product.php');
                                    }else{
                                        die('Brand Update Error!'.mysqli_error($db));
                                    }
                                }else{
                                    echo 'Please Upload and Image File';
                                }
                        
                            }else{
                                $product_update_sql = "UPDATE mart_product SET p_name='$product_name', p_category='$product_cat', p_sub_category='$product_sub_cat', p_brand='$product_brand', p_reg_price='$product_re_price', p_offer_price='$product_offer_price', p_short_desc='$product_sdesc', p_long_desc='$product_bdesc', p_stock='$product_stock', p_status='$product_status' WHERE ID='$peditid'";
                                $product_update_res = mysqli_query($db,$product_update_sql);
                                if($product_update_res){
                                    header('location: add_product.php');
                                }else{
                                    die('Product Update Error!'.mysqli_error($db));
                                }
                            }
                        
                        }
                        
                    }
            ?>
        </div>
<?php include('inc/footer.php')?>