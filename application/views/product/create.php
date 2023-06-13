<div class="container">
    <div class="card">
        <h5 class="card-header">Create Product</h5>
        <?php
        if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>

            <?php
        }
        else if($this->session->flashdata('fail')){
            ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('fail') ?></div>
            <?php
        }
    ?>
    
        <div class="card-body">

            <a class=" btn btn-success" href="<?php echo base_url('product/list')?> ">List product</a>
            <form action="<?php echo base_url('product/store'); ?>" method="POST" enctype="multipart/form-data"> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php echo form_error('title'); ?>
            </div>
            
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                <?php echo form_error('description'); ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="exampleInputPassword1">
                <?php echo form_error('price'); ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control-file" id="exampleInputPassword1">
                <small><?php if(isset($error)){ echo $error;} ?></small>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Status</label>
                <select class="form-select" name="status" aria-label="Default select example">
                <option value="1">Active</option>
                <option value="0">Inactive</option>

                </select>
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php echo form_error('slug'); ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                <?php foreach ($categories as $key => $cate) {          
                ?>
                <option value="<?php echo $cate->id ?>"><?php echo $cate->title ?></option>
                <?php  }  ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Brand</label>
                <select class="form-select" name="brand_id" aria-label="Default select example">
                <?php foreach ($brand as $key => $bra) {          
                ?>
                <option value="<?php echo $bra->id ?>"><?php echo $bra->title ?></option>
                <?php  }  ?>
                </select>
            </div>
            
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php echo form_error('quantity'); ?>
            </div>
           
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>