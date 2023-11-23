 <?php include 'header.php'; ?>
	<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="page-breadcrumb">
				<div class="row">
					<div class="col-12 d-flex no-block align-items-center">
						<h4 class="page-title">Accounts</h4>
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
							 <form name="frm" method="post">
								<div class="card-body">
									<h4 class="card-title">Fee Type Module</h4>
									<div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label">Employee Name</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'employee','placeholder'=>'Enter Employee Name','value'=>set_value('employee',$find_employees->name)]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('employee'); ?>
										</div>
									</div>
									 <div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label">Degination</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'dgsn','placeholder'=>'Enter Post','value'=>set_value('dgsn',
												$find_employees->post)]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('dgsn'); ?>
										</div>
									 </div>
								<div class="border-top">
									<div class="card-body">
										<?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Update']); ?>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php include 'footer.php'; ?>
