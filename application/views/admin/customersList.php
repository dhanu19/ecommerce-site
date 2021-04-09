    <div class="container">
    <div class="container">
        <h5>Customers List</h5>
    </div>
    <hr>
    <div>
        Customer List :- <?php echo anchor('admin/customerList_pdf', 'Download Pdf'); ?>
    </div>

    <?php $count = 1;?>
    <div class="container">
        
        <div class="container">
            <table class="table table-striped">
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