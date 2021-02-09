<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="card shadow mb-3" style="max-width: 540px;">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <form action="<?= base_url('user/changepassword') ?>" method="post">
                                <div class="form-group">
                                    <label for="current_password">Current_password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <small class=" text-danger"><?= form_error('current_password'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="new_password1">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                    <small class=" text-danger"><?= form_error('new_password1'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="new_password2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                    <small class=" text-danger"><?= form_error('new_password2'); ?></small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"> Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->