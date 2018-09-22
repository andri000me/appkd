
<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Tambah User</h2>
      </div>
      <div class="body">
       <form action="<?= site_url('user/simpan') ?>" method="post">
           <div class="form-group">
               <label for="nopol">E - mail</label>
               <input type="email" name="email" class="form-control <?= form_error('email')?'is-invalid':'' ?>" id="email" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
               <div class="invalid-feedback"><?= form_error('email') ?></div>
           </div>
           <div class="form-group">
               <label for="password">Password</label>
               <input type="password" class="form-control <?= form_error('password')?'is-invalid':'' ?>" id="password" placeholder="Masukkan Password" name="password" value="<?= set_value('password') ?>" >
              <div class="invalid-feedback"><?= form_error('password') ?></div>
           </div>
           <div class="form-group">
               <label for="konfirmasi_password">Konfirmasi Password</label>
               <input type="password" class="form-control <?= form_error('konfirmasi_password')?'is-invalid':'' ?>" id="konfirmasi_password" placeholder="Masukkan Konfirmasi Password" name="konfirmasi_password" value="<?= set_value('konfirmasi_password') ?>" >
              <div class="invalid-feedback"><?= form_error('konfirmasi_password') ?></div>
           </div>
           <div class="form-group">
               <label for="hak_akses">Hak Akses</label>
               <select name="hak_akses" class="form-control">
                   <option value="" disabled selected >Pilih Hak Akses</option>
                   <option value="ketua">Ketua</option>
                   <option value="penangung_jawab">Penanggung Jawab</option>
               </select>
              <div class="invalid-feedback"><?= form_error('hak_akses') ?></div>
           </div>
           <div class="form-group">
               <label for="hak_akses">Penanggung Jawab</label>
               <select name="penanggung_jawab_id" class="form-control">
                   <option value="" disabled selected >Pilih Penanggung Jawab</option>
                   <?php foreach ($penanggung_jawab as $row): ?>
                       <option value="<?= $row->id ?>"><?= $row->nama?></option>
                   <?php endforeach ?>
               </select>
              <div class="invalid-feedback"><?= form_error('penanggung_jawab_id') ?></div>
           </div>
           <button type="submit" class="btn btn-primary">Simpan</button>
       </form>
      </div>
    </div>
    
  </div>
</div>

