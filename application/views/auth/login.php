<!-- Form Validation -->
<script type="text/javascript">
    // JAVASCRIPT FORM VALIDATION
    function validateForm(){
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username == "" && password == "" ) {
            alert("Username and Password must be filled out");
            return false;
        }else if(username == ""){
            alert("Username must be filled out");
            return false;
        }else if(password == ""){
            alert("Password must be filled out");
            return false;
        }else {
            return true;
        }
    }
</script>




<div class="container"><!-- Container for login form -->
    <?php #echo form_open('Authentication/login')?>

    <form method="post" action="login" onsubmit="return validateForm()">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h1 class="text-center">LOGIN</h1>
                <br>
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" autofocus>
                </div>
                <br>
                <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" autofocus>
                </div>
                <br>
                <button  type="submit" class="btn btn-primary ">Login</button>
            </div>
        </div>
    </form>

    <?php #echo form_close()?>
</div>