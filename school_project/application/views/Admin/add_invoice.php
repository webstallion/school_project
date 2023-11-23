   <?php include 'header.php'; ?>
   <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
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
							<?php echo form_open('invoice/add',['class'=>'form-horizontal']); ?>
								<div class="card-body">
									<h4 class="card-title">Invoice</h4>
									<div class="form-group row">
										<label for="class_id" class="col-sm-3 text-right control-label col-form-label">Class Name</label>
										<div class="col-sm-5">
											<select name="class_id" id="class" class="form-control input-lg">
												<option value="">Select ID</option>
												<?php foreach ($class_List as $list) { ?>
												<option value="<?= $list->id; ?>"><?= $list->class_name; ?></option>
												<?php } ?>
											</select> 
										</div>
										<div class="col-sm-4">
											<?php echo form_error('class_id'); ?>
										</div>
									</div>
									 <div class="form-group row">
										<label for="lname" class="col-sm-3 text-right control-label col-form-label">Section Name</label>
										<div class="col-sm-5">
											<select name="section_id" id="section" class="form-control input-lg">
												<option value="">Select ID</option>
											</select> 
										</div>
										<div class="col-sm-4">
											<?php echo form_error('section_id'); ?>
										</div>
									 </div>
									 <div class="form-group row">
										<label for="std_id" class="col-sm-3 text-right control-label col-form-label">Student Name</label>
										<div class="col-sm-5">
											<select name="student_id" id="student" class="form-control input-lg">
												<option value="">Select Student</option>
											</select>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('student_name'); ?>
										</div>
									</div>
									 <div class="form-group row">
										<label for="ftype" class="col-sm-3 text-right control-label col-form-label">Fee Name</label>
										<div class="col-sm-5">
											<select name="ftype_id" id="fee_type" class="form-control input-lg">
												<option value="">Select Fees</option>
											</select> 
										</div>
										<div class="col-sm-4">
											<?php echo form_error('ftype_id'); ?>
										</div>
									 </div>

									 <div class="form-group row">
										<label for="amount" class="col-sm-3 text-right control-label col-form-label">Amount</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'amount','placeholder'=>'Enter Amount','id'=>'amount',
											'value'=>set_value('amount')]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('amount'); ?>
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
	<script type='text/javascript'>
		$(document).ready(function(){
			$('#class').change(function(){
				var class_id = $('#class').val();
				if(class_id !=''){
						$.ajax({
						url:"<?php echo base_url(); ?>Invoice/getsectionlist",
						method:"POST",
						data:{class_id:class_id},
						success:function(data)

						{
							$('#section').html(data);
						}

					});
				}
			});

				$('#class').change(function(){
				var class_id = $('#class').val();
				if(class_id !=''){
						$.ajax({
						url:"<?php echo base_url(); ?>Invoice/getfeetypelist",
						method:"POST",
						data:{class_id:class_id},
						success:function(data)

						{
							$('#fee_type').html(data);
						}

					});
				}
			});

			$('#section').change(function(){
				var section_id = $('#section').val();
				if(section_id !=''){
						$.ajax({
						url:"<?php echo base_url(); ?>Invoice/getstudentlist",
						method:"POST",
						data:{section_id:section_id},
						success:function(data)
						{
							$('#student').html(data);
						}

					});
				}
			});

			$('#fee_type').change(function(){
				var ftype_id = $('#fee_type').val();
				if(ftype_id !=''){
						$.ajax({
						url:"<?php echo base_url(); ?>Invoice/getamount",
						method:"POST",
						data:{ftype_id:ftype_id},
						success:function(data)
						{
							$('#amount').val(data);
						}

					});
				}
			});
		});
</script>
	<?php include 'footer.php'; ?>
