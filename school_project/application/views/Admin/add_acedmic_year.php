    <?php include 'header.php'; ?>
    <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Academic</h4>
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
                <div ="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php echo form_open('Acedmic_year/add',['class'=>'form-horizontal']); ?>
                                <div class="card-body">
                                    <h4 class="card-title">Acedmic year</h4>
                                    <div class="form-group row">
                                        <label for="acdmc_name" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'acdmc_name','placeholder'=>'Enter Acedmic Year','value'=>set_value('acdmc_name')]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('acdmc_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date_from" class="col-sm-3 text-right control-label col-form-label">Date_From</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'date_from','placeholder'=>'Enter here','id'=>'datepicker',
                                                'value'=>set_value('date_from')]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('date_from'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date_to" class="col-sm-3 text-right control-label col-form-label">Date_To</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'date_to','placeholder'=>'Enter here','value'=>set_value('date_to')]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('date_to'); ?>
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
