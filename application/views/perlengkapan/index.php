<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>
<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
      <a href="<?= site_url('perlengkapan/tambah') ?>" class="btn btn-primary" title="Tambah">Tambah</a>
        <h2 class="pull-right">Daftar Perlengkapan</h2>
      </div>
      <div class="body">
        <div class="table-responsive">
        <table class="display table table-bordered" class="full-width">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perlengkapan</th>
                    <th>Jumlah</th>
                    <th>Penanggung Jawab</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                <?php foreach ($perlengkapan as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->nama_perlengkapan ?></td>
                        <td><?= $row->jumlah ?></td>
                        <td><?= getColumn('penanggung_jawab',['id'=>$row->penanggung_jawab_id])->nama ?></td>
                        <td>
                            <a href="<?= site_url('perlengkapan/edit/'.$row->id) ?>" class="btn btn-warning" title="Edit">Edit</a>
                            <a onclick="return confirm('Apakah anda yakin akan hapus?')" href="<?= site_url('perlengkapan/delete/'.$row->id) ?>" class="btn btn-danger" title="Hapus">Hapus</a>
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


