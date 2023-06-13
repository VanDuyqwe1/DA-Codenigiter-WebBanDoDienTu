<div class="container">
    <div class="card">
        <h5 class="card-header">List Categories</h5>
        <div class="card-body">
        <a class=" btn btn-primary" href="<?php echo base_url('category/create')?> ">Add Categories</a>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php 
                foreach ($categories as $key => $category) {
                    
                
            ?>
            <tr>
                <th scope="row"><?php echo $key ?></th>
                <td><?php echo $category->title ?></td>
                <td><?php echo $category->description ?></td>
                <td><img src="<?php  echo base_url('uploads/category/'.$category->image )  ?>" alt="" width="150" height="150"></td>
                <td>
                    <?php if ($category->status == 1) {
                        echo "Active";
                    }
                    else{
                        echo "Inactive";
                    } ?>
               </td>
                <td>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo base_url('category/delete/' . $category->id) ?>" class="btn btn-danger">Delete</a>
                    <a href="<?php echo base_url('category/edit/' . $category->id) ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
        </table>
        </div>
    </div>
</div>