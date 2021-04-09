<?php echo validation_errors();?>

<div class="container">
<h4> Sign Up </h4>
</div>

<div class="container">


<?php echo form_open('authentication/register');?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name = "name" placeholder = "Name" >
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" name = "email" placeholder = "Email" >
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="tel" class="form-control" name = "phone" placeholder = "Phone" >
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" name = "address" placeholder = "Address" >
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name = "username" placeholder = "Username" >
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name = "password" placeholder = "Password" >
    </div>

    <div class="form-group">
        <label for="password2">Confirm Password</label>
        <input type="password" class="form-control" name = "password2" placeholder = "Confirm Password" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo form_close();?>





</div>
