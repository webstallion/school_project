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
                                    <h4 class="card-title">Add Expanses</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'amount','placeholder'=>'Enter Amount','value'=>set_value('amount',
                                                $find_expanse_list->amount)]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('amount'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Paymen Mode</label>
                                        <div class="col-sm-5">
                                            <select name="payment" class="form-control input-lg">
                                                <?php if($find_expanse_list->payment_mode=='cash'){
                                                ?>
                                                <option value="cash">Cash</option>
                                                <option value="check">Check</option>
                                                <option value="electronic">Electronic</option>
                                                <?php } elseif($find_expanse_list->payment_mode=='check'){
                                                ?>
                                                 <option value="check">Check</option>
                                                 <option value="electronic">Electronic</option>
                                                 <option value="cash">Cash</option>
                                                <?php } elseif
                                                        ($find_expanse_list->payment_mode=='electronic'){
                                                ?>
                                                 <option value="electronic">Electronic</option>
                                                 <option value="cash">Cash</option>
                                                 <option value="check">Check</option>
                                             <?php } else{ ?>
                                                <option value='0'>Select Payment</option>
                                                <option value="cash">Cash</option>
                                                <option value="check">Check</option>
                                                <option value="electronic">Electronic</option>
                                                <?php } ?>
                                            </select> 
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('payment'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Employee Name</label>
                                        <div class="col-sm-5">
                                                <?php $array['0']='Select'; ?>
                                                <?php foreach ($employee_id as $value){ 
                                                    $array[$value->employee_id]=$value->name;
                                                 } 
                                                  echo form_dropdown('employee_id',$array, set_value('employee_id',$find_expanse_list->employee_id), 'class="form-control input-lg"');
                                                 ?> 
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('employee_id'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label         col-form-label">Notes</label>
                                        <div class="col-sm-5">
                                        <?php echo form_textarea(['class'=>'form-control','name'=>'note', 'placeholder'=>'Enter Notes','value'=>set_value('note',
                                            $find_expanse_list->notes)]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('note'); ?>
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
