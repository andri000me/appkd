<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>


<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Setting</h2>
      </div>
      <div class="body">
       <form action="<?= site_url('setting/update') ?>" method="post" enctype="multipart/form-data">
           <input type="hidden" name="id" value="<?= $setting->id ?>">
           <div class="form-group">
               <label for="nopol">App Name</label>
               <input type="text" name="app_name" class="form-control <?= form_error('app_name')?'is-invalid':'' ?>" id="app_name" placeholder="Masukkan app_name" value="<?= $setting->app_name ?>">
               <div class="invalid-feedback"><?= form_error('app_name') ?></div>
           </div>
           <div class="form-group">
               <label for="nopol">Short Name</label>
               <input type="text" name="short_name" class="form-control <?= form_error('short_name')?'is-invalid':'' ?>" id="short_name" placeholder="Masukkan short_name" value="<?= $setting->short_name ?>">
               <div class="invalid-feedback"><?= form_error('short_name') ?></div>
           </div>
           <div class="form-group">
               <label for="nopol">Logo</label>
               <input type="file" name="logo" class="form-control <?= form_error('logo')?'is-invalid':'' ?>" id="logo" placeholder="Masukkan logo" value="<?= $setting->logo ?>">
               <div class="invalid-feedback"><?= form_error('logo') ?></div>
               <div class="text-center">
                 <img class="img-fluid" src="<?= base_url() ?>uploads/<?= $setting->logo ?>" >
               </div>
           </div>
        
          
          
           <button type="submit" class="btn btn-primary">Update</button>
           <a href="<?= site_url('setting') ?>" class="btn btn-warning">Batal</a>
       </form>
      </div>
    </div>
    
  </div>
</div>





