<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/color_skins.css">
</head>
<body>
	<div class="col-lg-4 offset-md-4 py-5">
      <div class="card">
          <div class="header">
              <p class="lead">Login to your account</p>
              <?php if ($this->session->userdata('gagal')): ?>
              	<div class="alert alert-danger" role="alert">
              	  <?= $this->session->userdata('gagal'); ?>
              	</div>
              <?php endif ?>
          </div>
          <div class="body ">
              <form class="form-auth-small" action="<?= site_url('login/validate') ?>" method="post" >
                  <div class="form-group">
                      <label for="signin-email" class="control-label sr-only">Email</label>
                      <input type="email" class="form-control form-control <?= form_error('email')?'is-invalid':'' ?>" id="signin-email" name="email" value="" placeholder="Username">
                      <div class="invalid-feedback"><?= form_error('email') ?></div>
                  </div>
                  <div class="form-group">
                      <label for="signin-password" class="control-label sr-only">Password</label>
                      <input type="password" name="password" class="form-control form-control <?= form_error('password')?'is-invalid':'' ?>" id="signin-password" value="thisisthepassword" placeholder="Password">
                      <div class="invalid-feedback"><?= form_error('password') ?></div>
                  </div>
                 
                  <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                
              </form>
          </div>
      </div>
  </div>
</body>
</html>