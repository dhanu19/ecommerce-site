<style>
.page-heading{
	margin:20px;
	padding:20px;
}
</style>


<section id="profile" class="profile">

	<div class="container">
		<div class="row">
			<div class="page-heading">
				<h3> Profile</h3>
			</div>
		</div>
		<div class="row">
			 <div class="col col-sm-12 col-md-10 col-lg-8">
				<form action="<?php echo base_url().'Users/updateUser/'.$user['id']; ?>" method="post" name="updateUser">
					<div style="padding:30px;">
						<div class="form-group row">
							<label for="id" class="col-sm-2 col-form-label">ID</label>
							<div class="col-sm-10">
								<input type="id" class="form-control" name="id" id="id" value="<?php echo $user['id']?>" readonly>
							</div>
						</div>
						<br>
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" id="name" value="<?php echo $user['name']?>">
							</div>
						</div>
						<br>
						<div class="form-group row">
							<label for="email" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" id="email" value="<?php echo $user['email']?>">
							</div>
						</div>
						<br>
						<div class="form-group row">
							<label for="phone" class="col-sm-2 col-form-label">Mobile</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user['phone']?>">
							</div>
						</div>
						<br>
						<div class="form-group row">
							<label for="address" class="col-sm-2 col-form-label">Address</label>
							<div class="col-sm-10">
								<input type="address" class="form-control" name="address" id="address" value="<?php echo $user['address']?>">
							</div>
						</div>
						<br>
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</div>
					</div>
				</form>
				</div>
		
		</div>
	</div>


</section>






<br>




<!-- 
<div class="container">
<h1>PROFILE</h1>
<form action="<?php #echo base_url().'Users/updateUser/'.$user['id']; ?>" method="post" name="updateUser">
						<label for="id">ID:</label>
						<input type="number" name="id" id="id" value="<?php #echo $user['id']?>">
						<br>
						<br>
						
						<label for="name">User Name:</label>
						<input type="text" name="name" id="name" value="<?php #echo $user['name']?>">
						<br>
						<br>
						
						<label for="email">User Email:</label>
						<input type="email" name="email" id="email" value="<?php #echo $user['email']?>">
						<br>
						<br>

						<label for="phone">User Phone:</label>
						<input type="tel" name="phone" id="phone" value="<?php #echo $user['phone']?>">
						<br>
						<br>

						<label for="address">User Address:</label>
						<input type="text" name="address" id="address" value="<?php #echo $user['address']?>">
						<br>
						<br>

						<input type = "submit" value="Update">
				</form>
</div>
<br><br>
-->

