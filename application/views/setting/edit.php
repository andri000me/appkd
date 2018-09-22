
<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Edit User</h2>
      </div>
      <div class="body">
       <form action="<?= site_url('user/update') ?>" method="post">
           <input type="hidden" name="id" value="<?= $user->id ?>">
           <div class="form-group">
               <label for="nopol">E - mail</label>
               <input type="email" name="email" class="form-control <?= form_error('email')?'is-invalid':'' ?>" id="email" placeholder="Masukkan Email" value="<?= $user->email ?>">
               <div class="invalid-feedback"><?= form_error('email') ?></div>
           </div>
        
           <div class="form-group">
               <label for="hak_akses">Hak Akses</label>
               <select name="hak_akses" class="form-control">
                   <option value="" disabled selected >Pilih Hak Akses</option>
                   <option <?= $user->hak_akses=='ketua'?'selected':'' ?> value="ketua">Ketua</option>
                   <option <?= $user->hak_akses=='penanggung_jawab_id'?'selected':'' ?> value="penanggung_jawab_id">Penanggung Jawab</option>
               </select>
              <div class="invalid-feedback"><?= form_error('hak_akses') ?></div>
           </div>
           <div class="form-group">
               <label for="hak_akses">Penanggung Jawab</label>
               <select name="penanggung_jawab_id" class="form-control">
                   <option value="" disabled selected >Pilih Penanggung Jawab</option>
                   <?php foreach ($penanggung_jawab as $row): ?>
                       <option <?= $row->id==$user->penanggung_jawab_id?'selected':'' ?> value="<?= $row->id ?>"><?= $row->nama?></option>
                   <?php endforeach ?>
               </select>
              <div class="invalid-feedback"><?= form_error('penanggung_jawab_id') ?></div>
           </div>
           <button type="submit" class="btn btn-primary">Update</button>
           <a href="<?= site_url('user') ?>" class="btn btn-warning">Batal</a>
       </form>
      </div>
    </div>
    
  </div>
</div>

