
<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Tambah Sopir</h2>
      </div>
      <div class="body">
        <form action="<?= site_url('sopir/simpan') ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama Sopir</label>
                <input type="text" name="nama" class="form-control <?= form_error('nama')?'is-invalid':'' ?>" id="nama" placeholder="Masukkan Nama Sopir" value="<?= set_value('nama') ?>">
                <div class="invalid-feedback"><?= form_error('nama') ?></div>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="number" class="form-control <?= form_error('no_hp')?'is-invalid':'' ?>" id="no_hp" placeholder="Masukkan No HP" name="no_hp" value="<?= set_value('no_hp') ?>" >
               <div class="invalid-feedback"><?= form_error('no_hp') ?></div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
    
  </div>
</div>


