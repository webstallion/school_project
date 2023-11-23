   <?php include 'header.php'; ?>
	<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h4 class="page-title">User Insertion</h4>
						<div class="ml-auto text-right">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Library</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<?php echo form_open('Admin/add',['class'=>'form-horizontal']); ?>
								<div class="card-body">
									<h4 class="card-title">Admin</h4>
									<div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label">User Name</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'user_name','placeholder'=>'Enter user Name','value'=>set_value('user_name')]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('user_name'); ?>
										</div>
									</div>
									<div class="form-group row">
										<label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'password','placeholder'=>'Enter Password','value'=>set_value('password')]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('password'); ?>
										</div>
									</div>
									 <div class="form-group row">
										<label for="user_type" class="col-sm-3 text-right control-label col-form-label">User Type</label>
										<div class="col-sm-5">
											<select name="user_type" class="form-control input-lg">
												<option value="">Select User</option>
												<option value="admin">Admin</option>
												<option value="user">User</option>
											</select>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('user_type'); ?>
										</div>
									 </div>
									 <div class="form-group row">
										<label for="school_code" class="col-sm-3 text-right control-label col-form-label">School Code</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'school_code','placeholder'=>'Enter School Code','value'=>set_value('school_code')]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('school_code'); ?>
										</div>
									 </div>

									 <div class="form-group row">
										<label for="post" class="col-sm-3 text-right control-label col-form-label">Post</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'post','placeholder'=>'Enter Post Name','value'=>set_value('post')]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('post'); ?>
										</div>
									 </div>
								</div>
								<div class="border-top">
									<div class="card-body">
										<?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']); ?>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php include 'footer.php'; ?>
