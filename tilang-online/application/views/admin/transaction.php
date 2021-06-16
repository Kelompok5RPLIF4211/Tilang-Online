<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <?= $this->session->flashdata('message'); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddTransaction">Tambah Transaksi</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>No Tilang</th>
                            <th>Foto</th>
                            <th>Tanggal Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($transaction as $transaction) :
                            ?>
                            <tr>
                                <td class="text-center align-middle"><?= $transaction['id_transaction']; ?></td>
                                <td class="text-center align-middle"><?= $transaction['id_ticket'] ; ?></td>
                                <td class="text-center align-middle">
                                    <img class="w-100 img-fluid" src="data:image/jpeg;base64, <?= base64_encode($transaction['image']) ?>"/>
                                </td>
                                <td class="text-center align-middle"><?= $transaction['date_transaction'] ; ?></td>

                                <td class="d-flex text-center">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteTransaction<?= $transaction['id_ticket'] ?>">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalEditTransaction<?= $transaction['id_ticket'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/editTransaction/' . $transaction['id_ticket']); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div>Foto</div>
                                                    <div>
                                                        <input
                                                        class="d-block"
                                                        name="image"
                                                        type="file"
                                                        onchange="readIMG(this);"
                                                        accept="image/*"
                                                        />
                                                        <div class="w-100 border mt-3" style="width: 600px; height: 600px;">
                                                            <img
                                                            class="img-fluid w-100"
                                                            id="IMGRead"
                                                            alt="your image"
                                                            src="<?= base_url('assets/'); ?>img/profile/default.jpg"
                                                            style="object-fit: cover"
                                                            />
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Ubah Transaksi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalDeleteTransaction<?= $transaction['id_ticket'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data transaksi ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-primary"
                                        onclick="location.href='<?php echo base_url('admin/deleteTransaction/'. $transaction['id_ticket']);?>'">Hapus Transaksi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
<div class="modal fade" id="modalAddTransaction" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addTransaction/'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <div>Nomor Tilang</div>
                        <select class="select2 js-states form-control" name="id_ticket" style="width: 100%">
                            <?php
                            foreach ($data_ticket as $ticket) :
                                ?>
                                <option value="<?= $ticket['id_ticket']?>"><?= $ticket['id_ticket'] . " | " .$ticket['ktp']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>Foto Transaksi</div>
                        <div>
                            <input
                            class="d-block"
                            name="image"
                            type="file"
                            onchange="readIMG(this);"
                            accept="image/*"
                            />
                            <div class="w-100 border mt-3" style="width: 600px; height: 600px;">
                                <img
                                class="img-fluid w-100"
                                id="IMGRead"
                                alt="your image"
                                src="<?= base_url('assets/'); ?>img/profile/default.jpg"
                                style="object-fit: cover"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Data Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>