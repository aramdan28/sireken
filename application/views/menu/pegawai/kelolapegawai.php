<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <section class="content">
        <!-- Default box -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php echo $this->session->flashdata('warning'); ?>
                <?php if ($this->session->flashdata("message")) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                        <?php
                        echo strtoupper($this->session->flashdata("message"));
                        unset($_SESSION["message"]);
                        ?>
                    </div>
                <?php } ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserModal">Tambah data pegawai</a>
                    </div>
                    <!-- <div class="row" style="padding-left: 50px; padding-top: 20px ; position: right ;">
                              <div class="col-sm-12 col-md-6" style="text-align: right; padding-right: 50px;">
                                   <?php echo form_open('menu/cariuser') ?>
                                   <div id="dataTable_filter" class="dataTables_filter">
                                        <label>
                                             <input type="text" name="keyword" class="form-control" placeholder="Ketik kata yang dicari">
                                        </label>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-fw fa-search"></i>Cari</button>
                                   </div>
                                   <?php echo form_close() ?>
                              </div>
                         </div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatablepegawai">
                                <thead>
                                    <th style="min-width: 100px;">Aksi</th>
                                    <th>id karyawan</th>
                                    <th>Name</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamt</th>
                                    <th>Pendidikan Terakhir</th>
                                    <th>Tanggal masuk</th>
                                    <th>Jabatan</th>
                                    <th>Gambar</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md-4">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Pegawai/addpegawai'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">ID Karyawan</label>
                            <input type="text" class="form-control form-control-user" id="id_karyawan" name="id_karyawan" placeholder="ID karyawan baru" value="<?= set_value('id_karyawan'); ?>">
                            <small class="text-danger"> <?= form_error('id_karyawan'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Nama</label>
                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>">
                            <small class="text-danger"> <?= form_error('name'); ?></small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Kota Lahir </label>
                            <input type="text" class="form-control form-control-user" id="tempatlahir" name="tempatlahir" placeholder="Full tempatlahir" value="<?= set_value('tempatlahir'); ?>">
                            <small class="text-danger"> <?= form_error('tempatlahir'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgllahir" name="tgllahir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="alamat" value="<?= set_value('alamat'); ?>">
                        <small class="text-danger"> <?= form_error('alamat'); ?></small>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Pendidikan terakhir</label>
                            <input type="text" class="form-control form-control-user" id="pendidikanterakhir" name="pendidikanterakhir" placeholder="Full pendidikanterakhir" value="<?= set_value('pendidikanterakhir'); ?>">
                            <small class="text-danger"> <?= form_error('pendidikanterakhir'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Masuk</label>
                            <input type="date" class="form-control" id="date_created" name="date_created">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">Jabatan</label>
                            <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="jabatan" value="<?= set_value('jabatan'); ?>">
                            <small class="text-danger"> <?= form_error('jabatan'); ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=" ">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#datatablepegawai').DataTable({
            "ajax": {
                "url": "<?= base_url(); ?>Pegawai/getPegawai",
            },
            "columns": [{
                    "data": "id",
                    "render": function(data, type, row) {
                        return `<a href="<?php base_url(); ?> Pegawai/editpegawai/${data}" class="btn btn-primary btn-sm">edit</a>
                                        <a href="<?php base_url(); ?> Pegawai/hapuspegawai/${data}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?');">delete</a>`;
                    }
                },
                {
                    "data": "id_karyawan"
                },
                {
                    "data": "name",
                },
                {
                    "data": "tempatlahir",
                },
                {
                    "data": "tgllahir",
                },
                {
                    "data": "alamat",
                },
                {
                    "data": "pendidikanterakhir",
                },
                {
                    "data": "date_created",
                },
                {
                    "data": "jabatan"
                },
                {
                    "data": "image",
                    "render": function(data, type, row) {
                        return `<img class="img-thumbnail" width="100px" height="80px" src="<?php echo base_url('./assets/img/profile/') ?>${data}">`;
                    }
                },
            ]
        });
    });
</script>