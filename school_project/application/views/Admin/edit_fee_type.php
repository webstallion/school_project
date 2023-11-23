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
							<form name="form" method="post">
								<div class="card-body">
									<h4 class="card-title">Fee Type Module</h4>
									<div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label">Fees Name</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'fee_name','placeholder'=>'Enter Fees Name','value'=>
												set_value('fee_name',$fee_type->fee_name)]); ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('fee_name'); ?>
										</div>
									</div>
									<div class="form-group row">
	                                    <label class="col-sm-3 text-right control-label col-form-label">Month</label>
	                                    <div class="col-sm-5">
	                                        <div class="custom-control custom-checkbox">
	                                           	<input type="checkbox" name="value[]"
	                                           	 value="1"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='1') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	                    } ?>
	                                           	 id="customControlAutosizing1">
	                                            <label for="customControlAutosizing1">Jan</label>

	                              				<input type="checkbox" name="value[]"
	                              				 value="2"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='2') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                              				id="customControlAutosizing2">
	                                            <label  for="customControlAutosizing2">Feb</label>

	                                            <input type="checkbox" name="value[]"
	                                             value="3"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='3') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                                             id="customControlAutosizing3">
	                                            <label for="customControlAutosizing3">March</label>

	                              				 <input type="checkbox" name="value[]"
	                              				  value="4"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='4') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                              				  id="customControlAutosizing4">
	                                            <label for="customControlAutosizing4">April</label>

	                                             <input type="checkbox" name="value[]"
	                                              value="5"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='5') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                                              id="customControlAutosizing5">
	                                            <label for="customControlAutosizing5">May</label>

	                              				 <input type="checkbox" name="value[]"
	                              				 value="6"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='6') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                              				  id="customControlAutosizing6">
	                                            <label for="customControlAutosizing6">June</label>

	                                             <input type="checkbox" name="value[]"
	                                              value="7"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='7') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                                              id="customControlAutosizing7">
	                                            <label for="customControlAutosizing7">July</label>

	                              				 <input type="checkbox" name="value[]"
	                              				  value="8" <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='8') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                              				  id="customControlAutosizing8">
	                                            <label for="customControlAutosizing8">Aug</label>

	                                             <input type="checkbox" name="value[]"
	                                              value="9" <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='9') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                                              id="customControlAutosizing9">
	                                            <label for="customControlAutosizing9">Sep</label>

	                              				 <input type="checkbox" name="value[]"
	                              				  value="10" <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='10') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                              				  id="customControlAutosizing10">
	                                            <label for="customControlAutosizing10">Oct</label>

	                                             <input type="checkbox" name="value[]"
	                                              value="11" <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='11') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
	                                              id="customControlAutosizing11">
	                                            <label for="customControlAutosizing11">Nov</label>

	                              				 <input type="checkbox" name="value[]"
	                              				  value="12"  <?php foreach ($months as $month){
	                              				 					if ((int)$month->month_value=='12') { ?>
	                              				 					checked="checked"
	                              				 	  	 	  <?php }
   													 	          } ?>
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
											<?php foreach ($classes as $classID){
                                               $array[$classID->id]=$classID->class_name;
                                            }
                                               echo form_dropdown('class_id',$array, set_value(
                                                'class_id',$fee_type->class_id), 'class="form-control input-lg"');
                                                 ?>
										</div>
										<div class="col-sm-4">
											<?php echo form_error('class_id'); ?>
										</div>
									 </div>
									 <div class="form-group row">
										<label for="fname" class="col-sm-3 text-right control-label col-form-label">Amount</label>
										<div class="col-sm-5">
											<?php echo form_input(['class'=>'form-control','name'=>'amount','placeholder'=>'Enter Amount','value'=>
												set_value('amount',$fee_type->amount)]); ?>
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
