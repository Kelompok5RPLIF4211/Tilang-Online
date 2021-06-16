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
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAddFaq">Tambah Data Tilang</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tilang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
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
                                <td><?= $ticket['id_ticket']; ?></td>
                                <td><?= $ticket['ktp'] ; ?></td>
                                <td><?= $ticket['kta']; ?></td>
                                <td><?= $ticket['article'] ; ?></td>
                                <td><?= $ticket['nominal']; ?></td>
                                <td><?= $ticket['date_create']; ?></td>
                                <td><?= $ticket['status'] ; ?></td>
                                <td class="d-flex text-center">
                                    <button class="btn btn-success mr-1" data-toggle="modal" data-target="#modalEditRule<?= $ticket['id_ticket'] ?>">Edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteRule<?= $ticket['id_ticket'] ?>">Delete</button>
                                </td>
                            </tr>
                            <div class="modal fade" id="modalEditRule<?= $ticket['id_ticket'] ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Tilang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?= base_url('police/editTicket/' . $ticket['id_ticket']); ?>" method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div>Denda</div>
                                                    <input type="text" class="form-control" id="denda" name="denda" placeholder="Denda" value="<?= $ticket['nominal']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <div>Status</div>
                                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="<?= $ticket['status']; ?>">
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Edit Data Tilang</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalDeleteRule<?= $ticket['id_ticket'] ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Tilang</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data tilang ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="button" class="btn btn-primary"
                                            onclick="location.href='<?php echo base_url('Police/deleteTicket/'. $ticket['id_ticket']);?>'">Hapus Data Tilang</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tilang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Police/addTicket/'); ?>" method="post">
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
        </div