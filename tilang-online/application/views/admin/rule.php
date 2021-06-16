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
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddFaq">Tambah Undang Undang</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Undang undang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pasal</th>
                            <th>Penjelasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rule as $rule) :
                            ?>
                            <tr>
                                <td><?= $rule['article']; ?></td>
                                <td><?= $rule['detail'] ; ?></td>
                                <td class="d-flex text-center">
                                    <button class="btn btn-success mr-1" data-toggle="modal" data-target="#modalEditRule<?= $rule['id_rule'] ?>">Edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteRule<?= $rule['id_rule'] ?>">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalEditRule<?= $rule['id_rule'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Undang Undang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/editRule/' . $rule['id_rule']); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div>Pasal</div>
                                                    <input type="text" class="form-control" id="article" name="article" placeholder="Pertanyaan" value="<?= $rule['article']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <div>Detail Pasal</div>
                                                    <textarea class="form-control w-100" name="detail" id="detail" cols="30" rows="10" placeholder="Detail Pasal"><?= $rule['detail']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Ubah Undang Undang</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalDeleteRule<?= $rule['id_rule'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Undang Undang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data undang undang ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary"
                                            onclick="location.href='<?php echo base_url('admin/deleteRule/'. $rule['id_rule']);?>'">Hapus Undang Undang</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Undang undang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addRule/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div>Pasal</div>
                        <input type="text" class="form-control" id="article" name="article" placeholder="Pasal">
                    </div>
                    <div class="form-group">
                        <div>Detail Pasal</div>
                        <textarea class="form-control w-100" name="detail" id="detail" cols="30" rows="10" placeholder="Detail Pasal"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Undang Undang</button>
                </div>
            </form>
        </div>
    </div>
</div>