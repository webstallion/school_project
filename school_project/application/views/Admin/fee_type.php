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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a style="text-decoration: underline;font-weight: bold;" href="<?= base_url('Fee_type/add') ?>">Add</a>
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
                                      <th scope="col">Fee Name</th>
                                      <th scope="col">Class ID</th>
                                      <th scope="col">Amount</th>
                                      <th scope="col">Month Value</th>
                                      <th scope="col">Edit</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($fee_values as $fee_value) {

                                    ?>
                                    <tr>
                                      <th scope="row">#</th>
                                      <td><?= $fee_value->fee_name; ?></td>
                                      <td><?= $fee_value->class_id; ?></</td>
                                      <td><?= $fee_value->amount; ?></td>
                                      <td><?= $fee_value->month; ?></td>
                                      <td><a href="<?= base_url('Fee_type/edit/'.$fee_value->ftype_id) ?>">
                                          <span class="fas fa-edit" style="color:green;font-size:15px;"></span>
                                          </a>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                  </tbody>
                            </table>
                        </div>
                    </div>
                </diphp>
            </div>
    </div>
    <?php include 'footer.php'; ?>