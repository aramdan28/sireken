<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <section class="content">
        <!-- Default box -->
        <div class="row justify-content-center">
            <div class="col-md-12">

                <?php echo $this->session->flashdata('warning'); ?>
                <?php if ($this->session->flashdata("pesan")) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button>
                        <?php
                        echo strtoupper($this->session->flashdata("pesan"));
                        unset($_SESSION["pesan"]);
                        ?>
                    </div>
                <?php } ?>

                <div class="card card-primary">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatablepesan">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Pesan</th>

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



<script>
    $(document).ready(function() {
        $('#datatablepesan').DataTable({
            "ajax": {
                "url": "<?= base_url(); ?>Menu/getPesan",
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "email"
                },
                {
                    "data": "phone"
                },
                {
                    "data": "pesan"
                },
            ]
        });
    });
</script>