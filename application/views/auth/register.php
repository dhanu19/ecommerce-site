<script type="text/javascript">
    // JAVASCRIPT FORM VALIDATION
    function validateForm(){
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var address = document.getElementById('address').value;
        var uname = document.getElementById('username').value;
        var pass = document.getElementById('password').value;
        var pass2 = document.getElementById('password2').value;

        if (name == "" && email == "" && phone == "" && address == "" && uname == "" && pass == "" ) {
            alert("Name\nEmail\nPhone\nAddress\nUsername\nPassword\nThese all fields must be filled out");
            return false;
        }else if(name == ""){
            alert("Name must be filled out");
            return false;
        }else if(email == ""){
            alert("Email must be filled out");
            return false;
        }else if(phone == ""){
            alert("Phone must be filled out");
            return false;
        }else if(address == ""){
            alert("Address must be filled out");
            return false;
        }else if(uname == ""){
            alert("Username must be filled out");
            return false;
        }else if(pass == ""){
            alert("Password must be filled out");
            return false;
        }else if(pass2 == ""){
            alert("Confirm Password must be filled out");
            return false;
        }
        else {
            return true;
        }

    }
</script>


<?php #echo validation_errors();?>
<form action="register" method="post" onsubmit="return validateForm()" >
    <div class="container">
    <h4> Sign Up </h4>
    </div>

    <div class="container">

    <br>
    <?php #echo form_open('authentication/register');?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" name = "name" placeholder = "Name" >
        </div>
        <br>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" name = "email" placeholder = "Email" >
        </div>
        <br>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" class="form-control" name = "phone" placeholder = "Phone" >
        </div>
        <br>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" class="form-control" name = "address" placeholder = "Address" >
        </div>
        <br>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" class="form-control" name = "username" placeholder = "Username" >
        </div>
        <br>
        <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" class="form-control" name = "password" placeholder = "Password" >
        </div>
        <br>
        <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" id="password2" class="form-control" name = "password2" placeholder = "Confirm Password" >
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
    </form>
<?php #echo form_close();?>
<br>




</div>
