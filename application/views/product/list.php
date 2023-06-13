<div class="container">
    <div class="card">
        <h5 class="card-header">List product</h5>
        <div class="card-body">
        <a class=" btn btn-primary" href="<?php echo base_url('product/create')?> ">Add product</a>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Brand_id</th>
            <th scope="col">Brand_id</th>
            <th scope="col">Quantity</th>
            <th scope="col">Slug</th>
            <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php 
                foreach ($product as $key => $pro) {
                    
                
            ?>
            <tr>
                <th scope="row"><?php echo $key ?></th>
                <td><?php echo $pro->title ?></td>
                <td><?php echo $pro->description ?></td>
                <td><?php echo number_format($pro->price, 0, ',', '.')  ?>VND</td>
                <td><img src="<?php  echo base_url('uploads/product/'.$pro->image )  ?>" alt="" width="150" height="150"></td>
                <td>
                    <?php if ($pro->status == 1) {
                        echo "Active";
                    }
                    else{
                        echo "Inactive";
                    } ?>
               </td>
                
                <td><?php echo $pro->category_id ?></td>
                <td><?php echo $pro->brand_id ?></td>
                <td><?php echo $pro->quantity ?></td>
                <td><?php echo $pro->slug ?></td>
                <td>
                    <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="<?php echo base_url('product/delete/' . $pro->id) ?>" class="btn btn-danger">Delete</a>
                    <a href="<?php echo base_url('product/edit/' . $pro->id) ?>" class="btn btn-warning">Edit</a>
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