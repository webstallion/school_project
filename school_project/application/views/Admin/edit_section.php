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
                            <?php echo form_open('Section/edit/'.$section_list->id,['class'=>'form-horizontal']); ?>
                                <div class="card-body">
                                    <h4 class="card-title">Section</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Section Name</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'section_name','placeholder'=>'Enter Section Name','value'=>set_value('section_name',
                                        $section_list->section_name)]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('section_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Class ID</label>
                                        <div class="col-sm-5">

                                                 <?php
                                                 //$array=array('' => '');
                                                foreach ($classes as $sid){
                                                    $array[$sid->id]=$sid->class_name;
                                                 }
                                                  echo form_dropdown('class_id',$array, set_value('class_id',$section_list->class_id), 'class="form-control"');
                                                 ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('class_id'); ?>
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
