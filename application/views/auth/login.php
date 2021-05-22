
<section id="login" class="login">
	<div class="container">
        <!-- row 1-->
		<div class="row page-heading">
			<h3> Login</h3>
		</div>
        <!-- row 2-->
		<div class="row wrapper ">
                <div class="col-12 col-md-6 col-lg-6 "><!-- Container for login form -->
                    <form method="post" action="login" onsubmit="return validateForm()">
                        <div class="container">
                                <br>
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" autofocus>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password" autofocus>
                                </div>
                                <br>
                                <button  type="submit" class="btn btn-primary">Login</button>
                                <br>
                        </div>
                        <br>
                    </form>
                </div>
		</div>
	</div> 
</section>



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


