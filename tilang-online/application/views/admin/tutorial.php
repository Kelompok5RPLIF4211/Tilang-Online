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
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddFaq">Tambah Cara Bayar</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cara Bayar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Bank</th>
                            <th>Cara Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tutorial as $tutorial) :
                            ?>
                            <tr>
                                <td><?= $tutorial['id_bank']; ?></td>
                                <td><?= $tutorial['step'] ; ?></td>
                                <td class="d-flex text-center">
                                    <button class="btn btn-success mr-1" data-toggle="modal" data-target="#modalEditTutorial<?= $tutorial['id_tutorial'] ?>">Edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteTutorial<?= $tutorial['id_tutorial'] ?>">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalEditTutorial<?= $tutorial['id_tutorial'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Cara Bayar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/editTutorial/' . $tutorial['id_tutorial']); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div>Kode BANK</div>
                                                    <input type="text" class="form-control" id="id_bank" name="id_bank" placeholder="Kode BANK" value="<?= $tutorial['id_bank']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <div>Cara Bayar</div>
                                                    <textarea class="form-control w-100" name="step" id="step" cols="30" rows="10" placeholder="Tata Cara"><?= $tutorial['step']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Edit Cara Bayar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalDeleteTutorial<?= $tutorial['id_tutorial'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Cara Bayar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data cara bayar ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary"
                                            onclick="location.href='<?php echo base_url('admin/deleteTutorial/'. $tutorial['id_tutorial']);?>'">Hapus Cara Bayar</button>
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
<div class="modal fade" id="modalAddFaq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Cara Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addTutorial/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div>Kode BANK</div>
                        <input type="text" class="form-control" id="id_bank" name="id_bank" placeholder="Kode BANK">
                    </div>
                    <div class="form-group">
                        <div>Cara Bayar</div>
                        <textarea type="text" class="form-control w-100" id="step" name="step" cols="30" rows="10" placeholder="Cara Bayar"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Cara Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>