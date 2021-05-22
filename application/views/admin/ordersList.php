<div class="container">
    <div class="container">
        <h5>Orders List</h5>
    </div>
    <hr>
    
    <div class="container">
        <div class="row">
            <div class="col">
                Orders List :- <?php echo anchor('admin/ordersList_pdf', 'Download Pdf'); ?>
            </div>
            <div class="col">
                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Customer ID..">
            </div>
        </div>
    </div>


    <hr>
    <?php $count = 1;?>
    <div class="container">
        
        <div class="container">
            <table id="ordersTable" class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Total</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Ordered Item ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($orders) ) {
                            foreach($orders as $order){
                                
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $order['id']?></td>
                                    <td><?php echo $order['customer_id']?></td>
                                    <td><?php echo $order['product_id']?></td>
                                    <td><?php echo $order['id']?></td>
                                    <td><?php echo $order['quantity']?></td>
                                    <td><?php echo $order['sub_total']?></td>
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
  table = document.getElementById("ordersTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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


