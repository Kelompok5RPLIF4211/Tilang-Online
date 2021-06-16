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
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddFaq">Tambah Tanya Jawab</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($faq as $faq) :
                            ?>
                            <tr>
                                <td><?= $faq['question']; ?></td>
                                <td><?= $faq['answer'] ; ?></td>
                                <td class="text-center">
                                    <button class="btn btn-success" data-toggle="modal" data-target="#modalEditFaq<?= $faq['id_faq'] ?>">Edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteFaq<?= $faq['id_faq'] ?>">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalEditFaq<?= $faq['id_faq'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tanya Jawab</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/editFaq/' . $faq['id_faq']); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div>Pertanyaan</div>
                                                    <input type="text" class="form-control" id="question" name="question" placeholder="Pertanyaan" value="<?= $faq['question']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <div>Jawaban</div>
                                                    <input type="text" class="form-control" id="answer" name="answer" placeholder="Jawaban" value="<?= $faq['answer']; ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Edit Tanya Jawab</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalDeleteFaq<?= $faq['id_faq'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tanya Jawab</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data tanya jawab ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary"
                                            onclick="location.href='<?php echo base_url('admin/deleteFaq/'. $faq['id_faq']);?>'">Hapus Tanya Jawab</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tanya Jawab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addFaq/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div>Pertanyaan</div>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Pertanyaan">
                    </div>
                    <div class="form-group">
                        <div>Jawaban</div>
                        <input type="text" class="form-control" id="answer" name="answer" placeholder="Jawaban">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Tanya Jawab</button>
                </div>
            </form>
        </div>
    </div>
</div>