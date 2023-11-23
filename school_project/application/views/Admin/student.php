<?php include 'header.php'; ?>
    <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Student</h4>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a style="text-decoration: underline;font-weight: bold;" href="<?= base_url('Student/addNewStudent/') ?>">Add Student</a>
                            </div>

                            <?php if($msg=$this->session->flashdata('msg')){
                                  $msg_class=$this->session->flashdata('msg_class');
                            ?>
                            <div class="row" style="margin-top: 20px;">
                                <div class="col-lg-6">
                                    <div class="alert <?= $msg_class ?>">
                                        <?php echo $msg; ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Student Name</th>
                                      <th scope="col">Section Name</th>
                                      <th scope="col">Class Name</th>
                                      <th scope="col">Created By</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php  foreach ($st_list as $value) {

                                    ?>

                                    <tr>
                                      <th scope="row"><?= $value->id; ?></th>
                                      <td><?= $value->student_name; ?></td>
                                      <td><?= $value->section_name; ?></td>
                                      <td><?= $value->class_name; ?></td>
                                      <td><?= $value->created_by ?></td>
                                      <td><a href="<?= base_url('Student/edit/'.$value->id) ?>"><span class="fas fa-edit" style="color:green;font-size:15px;"></span></a>/
                                          <a href="<?= base_url('Student/delete/'.$value->id) ?>"><span class="fas fa-trash" style="color:red;font-size:15px;"></span></a></td>
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
