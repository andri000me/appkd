<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>
<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <a href="<?= site_url('peminjam/tambah') ?>" class="btn btn-primary" title="Tambah">Tambah</a>
        <h2 class="pull-right">Daftar Peminjam</h2>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table class="display table table-bordered" class="full-width">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>No Surat</th>
                      <th>Nama Peminjam</th>
                      <th>No Hp</th>
                      <th>Alamat</th>
                      <th>Keperluan</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $no=1 ?>
                  <?php foreach ($peminjam as $row): ?>
                      <tr>
                          <td><?= $no ?></td>
                          <td><?= $row->no_surat ?></td>
                          <td><?= $row->nama_peminjam ?></td>
                          <td><?= $row->no_hp ?></td>
                          <td><?= $row->alamat ?></td>
                          <td><?= $row->keperluan ?></td>
                          <td>
                              <a href="<?= site_url('peminjam/edit/'.$row->id) ?>" class="btn btn-warning" title="Edit">Edit</a>
                              <a onclick=" return confirm('Apakah Anda yakin akan Hapus?') " href="<?= site_url('peminjam/delete/'.$row->id) ?>" class="btn btn-danger">Hapus</a>
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


