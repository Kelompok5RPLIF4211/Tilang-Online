<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4 text-gray-800">Data Pelanggar</h1>

    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahUser">Tambah Pelanggar</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>KTP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_user as $users) :
                            if ($users['type'] == 3) {?>
                                <tr>
                                    <td><?= $users['username']; ?></td>
                                    <td><?= $users['ktp'] ; ?></td>
                                    <td><?= $users['name']; ?></td>
                                    <td><?= $users['address']; ?></td>
                                    <td><?= $users['phone']; ?></td>
                                    <td>
                                        <?php 
                                        if ($users['gender'] == 1) {
                                            echo "Laki-laki";
                                        } else {
                                            echo "Perempuan";
                                        }
                                        ?>
                                    </td>
                                    
                                </tr>
                            <?php } endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="modalTambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Police/adduser/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div>No. KTP</div>
                        <input type="text" class="form-control" id="ktp" name="ktp" placeholder="No. KTP">
                    </div>
                    <div class="form-group">
                        <div>Nama Lengkap</div>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <div>Alamat</div>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <div>Telepon</div>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <div>Jenis Kelamin</div>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Jenis Kelamin</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Pelanggar</button>
                </div>
            </form>
        </div>
    </div>
</div>