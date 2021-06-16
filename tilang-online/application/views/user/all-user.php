<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>KTP</th>
                            <th>Nama</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_user as $users) :
                            $username = $this->session->userdata("username");
                            if ($users['username'] == $username) {?>
                                <tr>
                                    <td><?= $users['username']; ?></td>
                                    <td><?= $users['ktp'] ; ?></td>
                                    <td><?= $users['name']; ?></td>
                                    <td>Pelanggar</td>

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