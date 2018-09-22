<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 >Form Penanggung Jawab</h2>
      </div>
      <div class="body">
       <form action="<?= site_url('penanggung_jawab/simpan') ?>" method="post">
           <div class="form-group">
               <label for="nama">Nama Penanggung Jawab</label>
               <input type="text" name="nama" class="form-control <?= form_error('nama')?'is-invalid':'' ?>" id="nama" placeholder="Masukkan Nama Penanggung Jawab" value="<?= set_value('nama') ?>">
               <div class="invalid-feedback"><?= form_error('nama') ?></div>
           </div>
           <div class="form-group">
               <label for="jabatan">Jabatan</label>
               <input type="text" class="form-control <?= form_error('jabatan')?'is-invalid':'' ?>" id="jabatan" placeholder="Masukkan Jabatan" name="jabatan" value="<?= set_value('jabatan') ?>" >
              <div class="invalid-feedback"><?= form_error('jabatan') ?></div>
           </div>
           <div class="form-group">
               <label for="no_hp">Alamat</label>
               <textarea class="form-control <?= form_error('alamat')?'is-invalid':'' ?>" name="alamat" ><?= set_value('alamat') ?></textarea>
              <div class="invalid-feedback"><?= form_error('alamat') ?></div>
           </div>
           <div class="form-group">
               <label for="no_hp">No HP</label>
               <input type="number" class="form-control <?= form_error('no_hp')?'is-invalid':'' ?>" id="no_hp" placeholder="Masukkan No HP peminjam" name="no_hp" value="<?= set_value('no_hp') ?>" >
              <div class="invalid-feedback"><?= form_error('no_hp') ?></div>
           </div>
           <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control <?= form_error('password')?'is-invalid':'' ?>" id="password" placeholder="Masukkan Password" name="password" value="<?= set_value('password') ?>" >
              <div class="invalid-feedback"><?= form_error('password') ?></div>
           </div>
           <button type="submit" class="btn btn-primary">Simpan</button>
       </form>
      </div>
    </div>
    
  </div>
</div>





