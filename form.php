<div class="container-fluid">

<div class="card">

<div class="card-header">
    <?= $button ?> Fakultas
</div>

<div class="card-body">

<form action="<?= $action ?>" method="post">

    <?php if(!isset($fakultas)): ?>

    <div class="mb-3">

        <label>ID Fakultas</label>

        <input type="number"
               name="fakultas_id"
               class="form-control">

        <?= form_error('fakultas_id') ?>

    </div>

    <?php endif; ?>

    <div class="mb-3">

        <label>Nama Fakultas</label>

        <input type="text"
               name="fakultas_name"
               class="form-control"
               value="<?= set_value(
                    'fakultas_name',
                    isset($fakultas['fakultas_name'])
                    ? $fakultas['fakultas_name']
                    : ''
               ) ?>">

        <?= form_error('fakultas_name') ?>

    </div>

    <button type="submit"
            class="btn btn-primary">

        <?= $button ?>

    </button>

</form>

</div>
</div>
</div>