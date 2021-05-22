<div class="container">

    <div class="container">
        <h5>Products List</h5>
    </div>
    <?php $count = 1;?>
    <hr>
    <div>
        Products List :- <?php echo anchor('admin/productList_pdf', 'Download Pdf'); ?>
        <br>
        <?php /*
        Tshirt List :- <?php echo anchor('admin/tshirtList_pdf', 'Download Pdf'); ?>
        <br>
        Tops List :- <?php echo anchor('admin/topsList_pdf', 'Download Pdf'); ?>
        <br>
        Dress List :- <?php echo anchor('admin/dressList_pdf', 'Download Pdf'); ?>
        <br>
        Trousers List :- <?php echo anchor('admin/trousersList_pdf', 'Download Pdf'); ?>
        <br>
        Jeans List :- <?php echo anchor('admin/jeansList_pdf', 'Download Pdf'); ?>
        */
        ?>
    </div>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col col-md-6 col-lg-4">
                <div>Add products - 
                    <button class="btn_addproducts"><a href="<?php echo base_url(); ?>admin/AddProductForm">Add</a>
                </div>
            </div>
            <div class="col col-md-6 col-lg-8">
                <div> <!-- search function-->
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search categories..">
                </div>
            </div>
        </div>
    </div>
    <hr>






    <div class="container">
        <!--Display Products -Admin --->
        <div class="container">
            <table id="productsTable" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Total</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($products)) {
                            foreach($products as $product){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $product['id']?></td>
                                    <td><?php echo $product['name']?></td>
                                    <td><?php echo $product['image']?></td>
                                    <td><?php echo $product['quantity']?></td>
                                    <td><?php echo $product['category']?></td>
                                    <td><?php echo $product['description']?></td>
                                    <td><?php echo $product['price']?></td>
                                    <td>
                                        <a href="<?php echo base_url().'Admin/editProduct/'.$product['id'] ?>" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url().'Admin/deleteProduct/'.$product['id'] ?>" class="btn btn-primary">Delete</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                                <tr>
                                    <td colspan="6">Records not found </td>
                                </tr>
                            <?php }?>
                </tbody>
            </table>
            
        </div>
    </div>

</div>
<!-- Display using if else loop-->

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value;
  table = document.getElementById("productsTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>