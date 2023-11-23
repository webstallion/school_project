  <?php include 'header.php'; ?>
    <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Class</h4>
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
                                <a style="text-decoration: underline;font-weight: bold;" href="<?= base_url('Acedmic_year/add') ?>">Add Acedmic Year</a>
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
                                      <th scope="col">Expanse ID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Date From</th>
                                      <th scope="col">Date To</th>
                                      <th scope="col">Created By</th>
                                      <th scope="col">Edit</th>
                                      <th scope="col">Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($acedmic_year_list as $value) {
                                     
                                    ?>
                                    <tr>
                                      <th scope="row">#</th>
                                      <td><?= $value->name; ?></td>
                                      <td><?= $value->date_from; ?></td>
                                      <td><?= $value->date_to; ?></td>
                                      <td><?= $value->created_by; ?></td>
                                      <td><a href="<?= base_url('Acedmic_year/edit/'.$value->acdmc_id) ?>">
                                        <span class="fas fa-edit" style="color:green;font-size:15px;"></span></a>
                                      </td>
                                      <td><a href="<?= base_url('Acedmic_year/delete/'.$value->acdmc_id) ?>"><span class="fas fa-trash" style="color:red;font-size:15px;"></span></a></td>
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