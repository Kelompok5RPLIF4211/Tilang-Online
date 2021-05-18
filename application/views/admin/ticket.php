<!-- Bagian Nova -->

<div class="container-fluid">
    <h1 class="h2 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Mengeluarkan message error  -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <!-- Tampilan Data Tilang -->
    <?= $this->session->flashdata('message'); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddFaq">Tambah Data Tilang</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tilang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <!-- Tampilan Data Tilang berisi Kode Tilang, KTP, KTA, Pelanggaran, Denda, Tanggal Tilang, Status -->
                        <tr>
                            <th>Kode Tilang</th>
                            <th>KTP</th>
                            <th>KTA</th>
                            <th>Pelanggaran</th>
                            <th>Denda</th>
                            <th>Tanggal Tilang</th>
                            <th>Status<th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($ticket as $ticket) :
                        ?>
                            <tr>
                                <!-- Mengisi parameter id_ticket, ktp, kta, article, nominal, data_crate dan status dari db ticket -->
                                <td><?= $ticket['id_ticket']; ?></td>
                                <td><?= $ticket['ktp'] ; ?></td>
                                <td><?= $ticket['kta']; ?></td>
                                <td><?= $ticket['article'] ; ?></td>
                                <td><?= $ticket['nominal']; ?></td>
                                <td><?= $ticket['date_create']; ?></td>
                                <td><?= $ticket['status'] ; ?></td>
                                <td class="d-flex text-center">
                                    <!-- Button untuk engedit data Diatas -->
                                    <button class="btn btn-success mr-1" data-toggle="modal" data-target="#modalEditRule<?= $ticket['id_ticket'] ?>">Edit</button>
                                    <!-- Button untuk mendelete data diatas -->
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteRule<?= $ticket['id_ticket'] ?>">Delete</button>
                                </td>
                            </tr>

                            <!-- Digunakan untuk mengedit undang-undang yang ada dalam ticket -->
                            <div class="modal fade" id="modalEditRule<?= $ticket['id_ticket'] ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Undang Undang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('admin/editRule/' . $ticket['id_ticket']); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div>Pasal</div>
                                                    <input type="text" class="form-control" id="article" name="article" placeholder="Pertanyaan" value="<?= $ticket['article']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <div>Detail Pasal</div>
                                                    <textarea class="form-control w-100" name="detail" id="detail" cols="30" rows="10" placeholder="Detail Pasal"><?= $ticket['detail']; ?></textarea>
                                                </div>
                                            </div>
                                            <!-- Button untuk melakukan perubahan undang-undang -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Ubah Undang Undang</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalDeleteRule<?= $ticket['id_ticket'] ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <!-- Menghapus undang-undang yang telah dibuat -->
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Undang Undang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!-- Message yang keluar jika ingin menghapus undang-undang -->
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data undang undang ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <!-- Menghapus form Tanya jawab (faq) -->
                                            <button type="button" class="btn btn-primary"
                                            onclick="location.href='<?php echo base_url('admin/deleteRule/'. $ticket['id_ticket']);?>'">Hapus Tanya Jawab</button>
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
<div class="modal fade" id="modalAddFaq" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Undang undang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/addTicket/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <div>Nomor Tilang</div>
                        <input type="text" class="form-control" id="id_ticket" name="id_ticket" placeholder="Nomor Tilang">
                    </div>
                    <div class="form-group">
                        <div>KTP</div>
                        <select class="select2 js-states form-control" name="ktp" style="width: 100%">
                            <?php
                                foreach ($data_profile as $profile) :
                            ?>
                                <option value="<?= $profile['ktp']?>"><?= $profile['ktp'] . " | " .$profile['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>KTA</div>
                        <select class="select2 js-states form-control" name="kta" style="width: 100%">
                            <?php
                                foreach ($data_police as $police) :
                            ?>
                                <option value="<?= $police['kta']?>"><?= $police['kta'] . " | " . $police['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>Pasal</div>
                        <select class="select2 js-states form-control" name="article[]" style="width: 100%" multiple>
                            <?php
                                foreach ($data_rule as $rule) :
                            ?>
                                <option value="<?= $rule['article']?>"><?= $rule['article'] . " | " .$rule['detail']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>Denda</div>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="Denda" min="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Data Tilang</button>
                </div>
            </form>
        </div>
    </div>
</div>