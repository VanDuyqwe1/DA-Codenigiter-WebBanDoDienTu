<div class="container">
    <div class="card">
        <h5 class="card-header">List brand</h5>
        <div class="card-body">
        <a class=" btn btn-primary" href="<?php echo base_url('brand/create')?> ">Add Brand</a>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <!-- <th scope="col">Category_id</th> -->
            
            <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php 
                foreach ($brand as $key => $bra) {
                    
                
            ?>
            <tr>
                <th scope="row"><?php echo $key ?></th>
                <td><?php echo $bra->title ?></td>
                <td><?php echo $bra->description ?></td>
                <td><img src="<?php  echo base_url('uploads/brand/'.$bra->image )  ?>" alt="" width="150" height="150"></td>
                <td>
                    <?php if ($bra->status == 1) {
                        echo "Active";
                    }
                    else{
                        echo "Inactive";
                    } ?>
               </td>
                <td>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo base_url('brand/delete/' . $bra->id) ?>" class="btn btn-danger">Delete</a>
                    <a href="<?php echo base_url('brand/edit/' . $bra->id) ?>" class="btn btn-warning">Edit</a>
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