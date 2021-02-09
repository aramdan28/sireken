<!-- Begin Page Content -->
<div class="container-fluid">
     <!-- Content Wrapper. Contains page content -->

     <section class="content">
          <div class="row justify-content-center">
               <div class="col-7">
                    <div class="card card-primary">
                         <form action="<?php echo base_url('menu/ubahtidakaktif/' . $tidakaktif['id']) ?>" method="POST" role="form" enctype="multipart/form-data">
                              <input type="hidden" name="id" value="<?= $tidakaktif['id']; ?>">
                              <div class="card-body">
                                   <div class="form-group">
                                        <label for=" ">Nik</label>
                                        <input type="text" name="nik" class="form-control" id="nik" value="<?= $tidakaktif['nik']; ?>">
                                        <small class=" text-danger"><?php echo form_error('nik'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $tidakaktif['nama']; ?>">
                                        <small class=" text-danger"><?php echo form_error('nama'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Kampung</label>
                                        <input type="text" name="kampung" class="form-control" id="kampung" placeholder="kampung" value="<?= $tidakaktif['kampung']; ?>">
                                        <small class="text-danger"><?php echo form_error('kampung'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Rt</label>
                                        <input type="text" name="rt" class="form-control" id="rt" placeholder="rt" value="<?= $tidakaktif['rt']; ?>">
                                        <small class=" text-danger"><?php echo form_error('rt'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="">Rw</label>
                                        <input type="text" name="rw" class="form-control" id="rw" placeholder="rw" value="<?= $tidakaktif['rw']; ?>">
                                        <small class=" text-danger"><?php echo form_error('rw'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="n">Sektor</label>
                                        <input type="text" name="sektor" class="form-control" id="sektor" placeholder="sektor" value="<?= $tidakaktif['sektor']; ?>">
                                        <small class=" text-danger"><?php echo form_error('sektor'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for="">No meter</label>
                                        <input type="text" name="nometer" class="form-control" id="nometer" placeholder="nometer" value="<?= $tidakaktif['nometer']; ?>">
                                        <small class=" text-danger"><?php echo form_error('nometer'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Status</label>
                                        <select type="input" class="form-control" id="" name="status">
                                             <option value="closed">Closed</option>
                                             <option value="pending">Pending </option>
                                        </select>
                                        <small class=" text-danger"><?php echo form_error('tglkunjungan'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Tgl Kunjungnan</label>
                                        <input type="date" name="tglkunjungan" class="form-control" id="tglkunjungan" placeholder="tglkunjungan" value="<?= $tidakaktif['tglkunjungan']; ?>">
                                        <small class=" text-danger"><?php echo form_error('tglkunjungan'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Tgl Eksekusi</label>
                                        <input type="date" name="tgleksekusi" class="form-control" id="tgleksekusi" placeholder="tgleksekusi" value="<?= $tidakaktif['tgleksekusi']; ?>">
                                        <small class=" text-danger"><?php echo form_error('tgleksekusi'); ?></small>
                                   </div>
                                   <div class="form-group">
                                        <label for=" ">Keterangan</label>
                                        <textarea name="keterangan" id="keterangan" cols="10" class="form-control"><?php echo $tidakaktif['keterangan']; ?></textarea>
                                        <small class=" text-danger"><?php echo form_error('keterangan'); ?></small>
                                   </div>
                              </div>
                    </div>

                    <!-- /.card-body -->

                    <div class="card-footer">
                         <button type="submit" class="btn btn-primary">Simpan <i class="far fa-paper-plane"></i></button>
                         <a href="<?php echo base_url('menu/kendalatidakaktif'); ?>" class="btn btn-outline-danger">Batal <i class="fas fa-window-close"></i></a>
                    </div>
                    </form>
                    <!-- /.card-body -->
               </div>
               <!-- /.card -->
          </div>
          <!-- /.col -->
</div>
<!-- /.row -->
</section>
</div>


<!-- End of Main Content -->