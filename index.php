<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h4>Data Program Studi</h4>

        <a href="<?= site_url('prodi/tambah') ?>"
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
                    <th>Nama Program Studi</th>
                    <th>Strata</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php $no=1; foreach($prodi as $p): ?>

                <tr>

                    <td><?= $no++ ?></td>

                    <td><?= $p['prodi_id'] ?></td>

                    <td><?= $p['prodi_name'] ?></td>

                    <td><?= $p['prodi_strata'] ?></td>

                    <td><?= $p['fakultas_name'] ?></td>

                    <td>

                        <a href="<?= site_url('prodi/ubah/'.$p['prodi_id']) ?>"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="<?= site_url('prodi/hapus/'.$p['prodi_id']) ?>"
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