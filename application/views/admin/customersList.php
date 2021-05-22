
    <div class="container">

        <div class="container">
            <h5>Customers List</h5>
        </div>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col">
                    Customer List :- <?php echo anchor('admin/customerList_pdf', 'Download Pdf'); ?>
                </div>
                <div class="col">
                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search name..">
                </div>
            </div>
        </div>
        <hr>

        <?php $count = 1;?>
        <div class="container">
            
            <div class="container">
                <table id="customerTable" class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Total</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!empty($customers)) {
                                foreach($customers as $customer){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $count++;?></th>
                                        <td><?php echo $customer['id']?></td>
                                        <td><?php echo $customer['name']?></td>
                                        <td><?php echo $customer['email']?></td>
                                        <td><?php echo $customer['phone']?></td>
                                        <td><?php echo $customer['address']?></td>
                                        <td><?php echo $customer['username']?></td>
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
  table = document.getElementById("customerTable");
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