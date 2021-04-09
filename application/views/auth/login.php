
<div class="container"><!-- Container for login form -->


<?php echo form_open('Authentication/login')?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1 class="text-center">LOGIN</h1>
        <br>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
        </div>
        <br>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
        </div>
        <br>
        <button  type="submit" class="btn btn-primary ">Login</button>
    </div>


</div>



<?php echo form_close()?>











</div>