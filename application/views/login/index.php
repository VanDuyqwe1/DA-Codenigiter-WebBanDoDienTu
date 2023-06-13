

<div class="container">
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
    
    <form action="<?php echo base_url('login_user') ?>" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo form_error('email'); ?>
        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <?php echo form_error('password'); ?>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>