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
							<?php echo form_open('Fee_type/add',['class'=>'form-horizontal']); ?>
								<div class="card-body">
									<h4 class="card-title">Fee Type Module</h4>
									<div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label">Fees Name</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'fee_name','placeholder'=>'Enter Fees Name','value'=>set_value('fee_name')]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('fee_name'); ?>
										</div>
									</div>
									<div class="form-group row">
	                                    <label class="col-sm-3 text-right control-label col-form-label">Month</label>
	                                    <div class="col-sm-5">
	                                        <div class="custom-control custom-checkbox">
	                                           	<input type="checkbox" name="value[]" value="1"
	                                           	 id="customControlAutosizing1">
	                                            <label for="customControlAutosizing1">Jan</label>

	                              				<input type="checkbox" name="value[]" value="2"  
	                              				id="customControlAutosizing2">
	                                            <label  for="customControlAutosizing2">Feb</label>

	                                            <input type="checkbox" name="value[]" value="3" 
	                                             id="customControlAutosizing3">
	                                            <label for="customControlAutosizing3">March</label>

	                              				 <input type="checkbox" name="value[]" value="4"
	                              				  id="customControlAutosizing4">
	                                            <label for="customControlAutosizing4">April</label>

	                                             <input type="checkbox" name="value[]" value="5"
	                                              id="customControlAutosizing5">
	                                            <label for="customControlAutosizing5">May</label>

	                              				 <input type="checkbox" name="value[]" value="6"  
	                              				  id="customControlAutosizing6">
	                                            <label for="customControlAutosizing6">June</label>

	                                             <input type="checkbox" name="value[]" value="7"
	                                              id="customControlAutosizing7">
	                                            <label for="customControlAutosizing7">July</label>

	                              				 <input type="checkbox" name="value[]" value="8"
	                              				  id="customControlAutosizing8">
	                                            <label for="customControlAutosizing8">Aug</label>
	                                             
	                                             <input type="checkbox" name="value[]" value="9"
	                                              id="customControlAutosizing9">
	                                            <label for="customControlAutosizing9">Sep</label>

	                              				 <input type="checkbox" name="value[]" value="10"
	                              				  id="customControlAutosizing10">
	                                            <label for="customControlAutosizing10">Oct</label>

	                                             <input type="checkbox" name="value[]" value="11"
	                                              id="customControlAutosizing11">
	                                            <label for="customControlAutosizing11">Nov</label>

	                              				 <input type="checkbox" name="value[]" value="12"
	                              				  id="customControlAutosizing12">
	                                            <label for="customControlAutosizing12">Dec</label>
	                                   		</div>
                                		</div>
                                		<div class="col-sm-4">
											<?php echo form_error('value'); ?>
										</div>
									</div>
									 <div class="form-group row">
										<label for="lname" class="col-sm-3 text-right control-label col-form-label">Class Name</label>
										<div class="col-sm-5">
											<select name="class_id" class="form-control input-lg">
												<option value="">Select ID</option>
												 <?php foreach ($classes as $classID){
												 ?>
												  <option value="<?php echo $classID->id; ?>"><?= $classID->class_name; ?>(<?=$classID->id; ?>)</option>
												<?php } ?>
											</select> 
										</div>
										<div class="col-sm-4">
											<?php echo form_error('class_id'); ?>
										</div>
									 </div>
									 <div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label">Amount</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'amount','placeholder'=>'Enter Amount','value'=>set_value('amount')]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('amount'); ?>
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
