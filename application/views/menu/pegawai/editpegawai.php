<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Content Wrapper. Contains page content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card card-primary">
                    <form action="<?php echo base_url('Pegawai/editpegawai/' . $Pegawai['id']) ?>" method="POST" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $Pegawai['id']; ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">ID Karyawan</label>
                                    <input type="text" name="id_karyawan" class="form-control" id="id_karyawan" placeholder="id_karyawan" value="<?= $Pegawai['id_karyawan']; ?>">
                                    <small class="text-danger"> <?= form_error('id_karyawan'); ?></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?= $Pegawai['name']; ?>">
                                    <small class="text-danger"> <?= form_error('name'); ?></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Kota Lahir </label>
                                    <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" placeholder="tempatlahir" value="<?= $Pegawai['tempatlahir']; ?>">
                                    <small class="text-danger"> <?= form_error('tempatlahir'); ?></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" class="form-control" id="tgllahir" placeholder="tgllahir" value="<?= $Pegawai['tgllahir']; ?>">
                                    <small class="text-danger"> <?= form_error('tgllahir'); ?></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Alamat</label>
                                    <textarea type="text" name="alamat" class="form-control" rows="3" id="alamat" placeholder="alamat" value="<?= $Pegawai['alamat']; ?>"></textarea>
                                    <small class="text-danger"> <?= form_error('alamat'); ?></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Pendidikan terakhir</label>
                                    <input type="text" name="pendidikanterakhir" class="form-control" id="pendidikanterakhir" placeholder="pendidikanterakhir" value="<?= $Pegawai['pendidikanterakhir']; ?>">
                                    <small class="text-danger"> <?= form_error('pendidikanterakhir'); ?></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Tanggal Masuk</label>
                                    <input type="date" name="date_created" class="form-control" id="date_created" placeholder="date_created" value="<?= $Pegawai['date_created']; ?>">
                                    <small class="text-danger"> <?= form_error('date_created'); ?></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="jabatan" value="<?= $Pegawai['jabatan']; ?>">
                                    <small class="text-danger"> <?= form_error('jabatan'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $Pegawai['image']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-md-9">
                                            <label for=" ">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Pilih Gambar</label>
                                                <small class="text-danger"><?php echo form_error('image'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan<i class="far fa-paper-plane"></i></button>
                                <a href="<?php echo base_url('Pegawai'); ?>" class="btn btn-outline-danger">Batal <i class="fas fa-window-close"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- /.row -->
    </section>
</div>
</div>

<!-- End of Main Content -->