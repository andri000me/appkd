<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>


<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Tambah Peminjam</h2>
      </div>
      <div class="body">
        
      <form action="<?= site_url('peminjam/simpan') ?>" method="post">
          <div class="form-group">
              <label for="no_surat">No. Surat</label>
              <input type="text" name="no_surat" class="form-control <?= form_error('no_surat')?'is-invalid':'' ?>" id="no_surat" placeholder="Masukkan No Surat" value="<?= set_value('no_surat') ?>">
              <div class="invalid-feedback"><?= form_error('no_surat') ?></div>
          </div>
          <div class="form-group">
              <label for="nama_peminjam">Nama Peminjam</label>
              <input type="text" name="nama_peminjam" class="form-control <?= form_error('nama_peminjam')?'is-invalid':'' ?>" id="nama_peminjam" placeholder="Masukkan Nama Peminjam" value="<?= set_value('nama_peminjam') ?>">
              <div class="invalid-feedback"><?= form_error('nama_peminjam') ?></div>
          </div>
          <div class="form-group">
              <label for="no_hp">No HP</label>
              <input type="number" class="form-control <?= form_error('no_hp')?'is-invalid':'' ?>" id="no_hp" placeholder="Masukkan No HP peminjam" name="no_hp" value="<?= set_value('no_hp') ?>" >
             <div class="invalid-feedback"><?= form_error('no_hp') ?></div>
          </div>
          <div class="form-group">
              <label for="no_hp">Alamat</label>
              <textarea class="form-control <?= form_error('alamat')?'is-invalid':'' ?>" name="alamat" ><?= set_value('alamat') ?></textarea>
             <div class="invalid-feedback"><?= form_error('alamat') ?></div>
          </div>
          <div class="form-group">
              <label for="keperluan">Keperluan</label>
              <textarea name="keperluan" id="" cols="30" rows="10" class="form-control <?= form_error('keperluan')?'is-invalid':'' ?>" placeholder="Masukkan keperluan"><?= set_value('keperluan') ?></textarea>
             <div class="invalid-feedback"><?= form_error('keperluan') ?></div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
    
  </div>
</div>
