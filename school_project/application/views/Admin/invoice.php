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
				<div class="form-group row">
					<div class="col-md-12">
						<div class="card">
							<?php echo form_open('Invoice',['class'=>'form-horizontal']); ?>
								<div class="card-body">
									<a style="text-decoration: underline;font-weight: bold;" href="<?= base_url('Invoice/add') ?>">Add Invoice</a>
									<div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label"><h5>Student Details</h5></label>
										<div class="col-sm-6">
											<?php echo form_input(['class'=>'form-control','name'=>'detail','value'=>set_value('detail')]); ?>
										</div>
										<div class="col-sm-3">
											<?php echo form_error('detail'); ?>
										</div>
									</div>

									<div class="form-group row">
	                                    <label class="col-sm-3 text-right control-label col-form-label"><h5>Select Field</h5></label>
	                                    <div class="col-sm-6">
	                                        <div class="custom-control custom-checkbox">
	                                           	<input type="checkbox" value="name" name="selsct_field[]" id="customControlAutosizing1">
	                                            <label for="customControlAutosizing">Name</label>

	                              				<input type="checkbox" value="roll" name="selsct_field[]"  
	                              				id="customControlAutosizing2">
	                                            <label  for="customControlAutosizing2">Roll No</label>

	                                            <input type="checkbox" value="fname" name="selsct_field[]"
	                                             id="customControlAutosizing3">
	                                            <label for="customControlAutosizing3">Father Name</label>

	                              				 <input type="checkbox" value="admsnno" name="selsct_field[]" 
	                              				  id="customControlAutosizing4">
	                                            <label for="customControlAutosizing4">Admission No</label>

	                                             
	                                             <input type="checkbox" value="class" name="selsct_field[]"
	                                              id="customControlAutosizing5">
	                                             <label for="customControlAutosizing5">Class</label>
	                                   		</div>
                                		</div>
                                		<div class="col-sm-3">
											<?php echo form_error('selsct_field'); ?>
										</div>
									</div>
								<div class="border-top">
									<div class="card-body">
										<?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']); ?>
									</div>
								</div>
							</form>

							 <table class="table">
	                            <thead>
	                                <tr>
	                                    <th scope="col">Student Name</th>
	                                    <th scope="col">Class</th>
	                                    <th scope="col">Admission no</th>
	                                    <th scope="col">parents Name</th>
	                                    <th scope="col">Roll No</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	<?php if(count($std_details)){ 
	                            		foreach ($std_details as $std_detail) {
	                            	?>
	                                <tr>
	                                    <td><?= $std_detail->student_name; ?></td>
	                                    <td><?= $std_detail->class_name; ?></</td>
	                                    <td><?= $std_detail->admission_no; ?></</td>
	                                    <td><?= $std_detail->parents_name; ?></</td>
	                                    <td><?= $std_detail->rollno; ?></</td>
	                                </tr>
	                            	<?php } }else{
	                            	 ?>
	                            	 <tr>
	                                    <td>No Records Found</td>
	                                </tr>
	                            <?php } ?>
	                            </tbody>
	                         </table>	
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php include 'footer.php'; ?>
