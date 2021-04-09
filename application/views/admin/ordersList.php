<div class="container">
    <hr>
    <div class="container">
        <h5>Orders List</h5>
    </div>
    <div>
    Orders List :- <?php echo anchor('admin/ordersList_pdf', 'Download Pdf'); ?>
    </div>
    <?php $count = 1;?>
    <div class="container">
        
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Total</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Ordered Item ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sub-Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($orders) || !empty($orderItems)) {
                            foreach($orders as $order){
                                foreach($orderItems as $orderItem)
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $count++;?></th>
                                    <td><?php echo $order['id']?></td>
                                    <td><?php echo $order['customer_id']?></td>
                                    <td><?php echo $orderItem['product_id']?></td>
                                    <td><?php echo $orderItem['id']?></td>
                                    <td><?php echo $orderItem['quantity']?></td>
                                    <td><?php echo $orderItem['sub_total']?></td>
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