<div class="container-fluid">

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Fakultas</h4>

            <a href="<?= site_url('fakultas/tambah') ?>"
               class="btn btn-primary">
                Tambah
            </a>
        </div>

        <div class="card-body">

            <table id="datatable" class="table table-bordered">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php $no=1; foreach($fakultas as $f): ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $f['fakultas_id'] ?></td>
                        <td><?= $f['fakultas_name'] ?></td>

                        <td>

                            <a href="<?= site_url('fakultas/ubah/'.$f['fakultas_id']) ?>"
                               class="btn btn-warning btn-sm">

                               Edit

                            </a>

                            <a href="<?= site_url('fakultas/hapus/'.$f['fakultas_id']) ?>"
                               class="btn btn-danger btn-sm btn-hapus">

                               Hapus

                            </a>

                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </div>

</div>