<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>


<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <a href="<?= site_url('user/tambah') ?>" class="btn btn-primary" title="Tambah">Tambah</a>  
        <h2 class="pull-right">Daftar User</h2>

      </div>
      <div class="body">
       <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>E mail</th>
                      <th>Hak Akses</th>
                      <th>Penanggung Jawab</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1 ?>
                  <?php foreach ($user as $row): ?>
                      <tr>
                          <td><?= $no ?></td>
                          <td><?= $row->email ?></td>
                          <td><?= $row->hak_akses ?></td>
                          <td><?= getColumn('penanggung_jawab',['id'=>$row->penanggung_jawab_id])->nama ?></td>
                          <td>
                              <a href="<?= site_url('user/edit/'.$row->id) ?>" class="btn btn-warning" title="Edit">Edit</a>
                              <a onclick=" return confirm('Apakah Anda yakin akan Hapus?') " href="<?= site_url('user/delete/'.$row->id) ?>" class="btn btn-danger">Hapus</a>
                          </td>
                      </tr>
                      <?php $no++ ?>
                  <?php endforeach ?>
              </tbody>
          </table>
       </div>
      </div>
    </div>
    
  </div>
</div>




