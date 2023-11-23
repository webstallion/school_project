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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php echo form_open('Class_work/add',['class'=>'form-horizontal']); ?>
                                <div class="card-body">
                                    <h4 class="card-title">Class</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Class Name</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'class_name','placeholder'=>'Enter Class Name','value'=>set_value('class_name')]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('class_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Class No.</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'class_no','placeholder'=>'Enter Class No','value'=>set_value('class_no')]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('class_no'); ?>
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
