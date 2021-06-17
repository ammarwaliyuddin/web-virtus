<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 ">
            <?php
            $session = \Config\Services::session();
            if (!empty($session->getFlashdata('pesan'))) {

                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . $session->getFlashdata('pesan') . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
            ?>
            <div class="card p-5">


                <div class="btngrp-zaam mt-2  w-100">
                    <a href="/Smartwatch_reportpdf" class="btn btn-danger mr-2">Unduh PDF</a>
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-success">Excel</button>
                        <button type="button" class="btn btn-success dropdown-toggle excel dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <!-- Button trigger modal -->
                            <a class="dropdown-item" data-toggle="modal" data-target="#import_excel" href="#">
                                Import
                            </a>
                            <a class="dropdown-item" href="/Jabatan/export_excel">
                                Export
                            </a>
                        </div>
                    </div>
                </div>

                <div class="jabatan-header mt-4 mb-2">
                    <h4>Smartwatch</h4>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#jabatanModal">
                        Tambah
                    </button>
                </div>
                <div class="card-content card-table">
                    <table class="table card-table-setting table-hover table-borderless">
                        <thead>
                            <th>Nama Smartwatch</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php foreach ($Smartwatch as $S) : ?>
                                <tr>

                                    <td><?= $S['merek']; ?></td>
                                    <td><?= $S['longitude']; ?></td>
                                    <td><?= $S['latitude']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="<?= $S['ID_jam']; ?>" data-merek="<?= $S['merek']; ?>" data-lat="<?= $S['latitude']; ?>" data-long="<?= $S['longitude']; ?>" data-lokasi="<?= $S['lokasi']; ?>">edit</a>


                                        <form action="/Smartwatch/<?= $S['ID_jam']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Modal jabatan -->
<div class="modal fade" id="jabatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Smartwatch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Smartwatch/save" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="merek">Nama Smartwatch</label>
                        <input name="merek" type="text" class="form-control" id="merek" placeholder="Masukkan Nama Smartwatch">
                    </div>
                    <div class="form-group">
                        <label for="Longitude">Longitude</label>
                        <input name="longitude" type="text" class="form-control" id="longitude" placeholder="Masukkan Area">
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input name="latitude" type="text" class="form-control" id="latitude" placeholder="Masukkan Area">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                <button type="submit" class="btn btn-primary">simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="smartwatchModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Update Smartwatch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editForm">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input name="merek" type="text" class="form-control merek" placeholder="Masukkan Nama merek">
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input name="latitude" type="text" class="form-control latitude" placeholder="Masukkan latitude">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input name="longitude" type="text" class="form-control longitude" placeholder="Masukkan longitude">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input name="lokasi" type="text" class="form-control lokasi" placeholder="Masukkan lokasi">
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="AreaLama" type="text" class="form-control Nama_area" id="AreaLama" aria-describedby="emailHelp" placeholder="Masukkan Nama Area">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
                <button type="submit" class="btn btn-primary">simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>


<?= $this->section('script'); ?>

<!-- <script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script> -->
<script>
    $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {

            // get data from button edit
            const id = $(this).data('id');
            const merek = $(this).data('merek');
            const lat = $(this).data('lat');
            const long = $(this).data('long');
            const lokasi = $(this).data('lokasi');
            const URL = '/Smartwatch/edit/' + id;


            console.log(URL);
            // Set data to Form Edit
            $('.ID_jam').val(id);
            $('.merek').val(merek);
            $('.latitude').val(lat);
            $('.longitude').val(long);
            $('.lokasi').val(lokasi);



            $('#editForm').attr('action', URL)
            $('#smartwatchModalEdit').modal('show');
        });

    });
</script>

<?= $this->endSection(); ?>