<div class="container">
    <div class="card">
        <h5 class="card-header">Create Category</h5>
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

            <a class=" btn btn-success" href="<?php echo base_url('category/list')?> ">List Brand</a>
            <form action="<?php echo base_url('category/store'); ?>" method="POST" enctype="multipart/form-data"> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php echo form_error('title'); ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <?php echo form_error('slug'); ?>
            </div>
            
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                <?php echo form_error('description'); ?>
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
           
            <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>