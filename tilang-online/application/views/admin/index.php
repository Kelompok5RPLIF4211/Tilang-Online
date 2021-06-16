<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4 text-gray-800"><?= $title; ?></h1>
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
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_user as $users) :
                            ?>
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