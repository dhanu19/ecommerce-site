<br><br>
<h1>PROFILE</h1>

<div class="container">
<form action="<?php echo base_url().'Users/updateUser/'.$user['id']; ?>" method="post" name="updateUser">
            <label for="id">ID:</label>
            <input type="number" name="id" id="id" value="<?php echo $user['id']?>">
            <br>
            <br>
            
            <label for="name">User Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $user['name']?>">
            <br>
            <br>
            
            <label for="email">User Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']?>">
            <br>
            <br>

            <label for="phone">User Phone:</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $user['phone']?>">
            <br>
            <br>

            <label for="address">User Address:</label>
            <input type="text" name="address" id="address" value="<?php echo $user['address']?>">
            <br>
            <br>

            <input type = "submit" value="Update">
        </form>
</div>
<br><br>