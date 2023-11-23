    <?php include 'header.php'; ?>
    <div class="page-wrapper">
      <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
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
                            <?php //echo form_open('Student/addNewStudent',['class'=>'form-horizontal']); ?>
                            <form name="form" method="post">
                                <div class="card-body">
                                    <h4 class="card-title">Student</h4>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Student Name</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'student_name','placeholder'=>'Enter Student Name','value'=>set_value('student_name',
                                            $std_list->student_name)]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('student_name'); ?>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Class Name</label>
                                        <div class="col-sm-5">
                                                <?php
                                                foreach ($class_id as $cid){
                                                    $array_class[$cid->id]=$cid->class_name;
                                                 }
                                                  echo form_dropdown("class_id", $array_class, set_value("class_id", $std_list->class_id), "id='class' class='form-control'");
                                                 ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('class_id'); ?>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Section Name</label>
                                        <div class="col-sm-5">
                                                <?php
                                                foreach ($section_id as $sid){
                                                    $array[$sid->id]=$sid->section_name;
                                                 }
                                                  echo form_dropdown('section_id',$array, set_value('section_id',$std_list->section_id),
                                                                     "id='section' class='form-control'");
                                                 ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('section_id'); ?>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Admission NO</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'admission_no','placeholder'=>'Enter Admission no','value'=>set_value('admission_no',
                                            $std_list->admission_no)]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('admission_no'); ?>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Parents Name</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'parents_name','placeholder'=>'Enter Parents Name','value'=>set_value('parents_name',
                                            $std_list->parents_name)]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('parents_name'); ?>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Roll No</label>
                                        <div class="col-sm-5">
                                            <?php echo form_input(['class'=>'form-control','name'=>'roll_no','placeholder'=>'Enter Roll No','value'=>set_value('roll_no',
                                                $std_list->rollno)]); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('roll_no'); ?>
                                        </div>
                                     </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Academic Year</label>
                                        <div class="col-sm-5">
                                                <?php
                                                foreach ($acedmic_id as $valuee){
                                                    $array[$valuee->acdmc_id]=$valuee->name;
                                                 }
                                                  echo form_dropdown('acdmc',$array, set_value('acdmc',$std_list->acedmic_year_id), 'class="form-control"');
                                                 ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('acdmc'); ?>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Branch Name</label>
                                        <div class="col-sm-5">
                                                <?php
                                                foreach ($branch_id as $values){
                                                    $array[$values->branch_id]=$values->branch_name;
                                                 }
                                                  echo form_dropdown('branch_id',$array, set_value('branch_id',$std_list->branch_id), 'class="form-control"');
                                                 ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <?php echo form_error('acdmc'); ?>
                                        </div>
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
    <script type='text/javascript'>
      $(document).ready(function(){

        $('#class').change(function(){
          var class_id = $('#class').val();
          if(class_id !=''){
              $.ajax({
              url:"<?php echo base_url(); ?>Student/getsectionlist",
              method:"POST",
              data:{class_id:class_id},
              success:function(data)

              {
                $('#section').html(data);
              }

            });
          }
        });
      });
    </script>
    <?php include 'footer.php'; ?>
