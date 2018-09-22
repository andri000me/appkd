<div class="container-fluid">                    
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
         <div class="header">
             <h2>Peminjaman Ruang</h2>                            
         </div>
         <div class="body">
             <div class="table-responsive">
                 <table class="table">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>No Surat</th>
                          <th>Tanggal Peminjaman</th>
                          <th >Ruang</th>
                          <th>Jumlah Peserta</th>
                          <th>Penyelenggara</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1?>
                      <?php foreach ($ruang as $row): ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->no_surat ?></td>
                              <td><?= tanggal_indo($row->tanggal_peminjaman) ?></td>
                              <td><?= getColumn('ruang',['id'=>$row->ruang_id])->nama_ruang ?></td>
                              <td><?= $row->jumlah_peserta ?></td>
                              <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->nama_peminjam ?></td>
                              <td><?= $row->status ?></td>
                              <td><?= $row->keterangan ?></td>
                          </tr>
                          <?php $no++?>
                      <?php endforeach?>
                  </tbody>
                 </table>
             </div>
         </div>
      </div>
      </div>
  </div>
  <div class="row clearfix">
    <div class="col-lg-12">
      <div class="card">
         <div class="header">
             <h2>Peminjaman Mobil</h2>                            
         </div>
         <div class="body">
             <div class="table-responsive">
                 <table class="table">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>No Surat</th>
                          <th>Tanggal Peminjaman</th>
                          <th >Mobil</th>
                          <th >Tujuan</th>
                          <th>Jumlah Peserta</th>
                          <th>Penyelenggara</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1?>
                      <?php foreach ($mobil as $row): ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->no_surat ?></td>
                              <td><?= tanggal_indo($row->tanggal_peminjaman )?></td>
                              <td><?= getColumn('mobil',['id'=>$row->mobil_id])->merk ?></td>
                              <td><?= $row->tempat ?></td>
                              <td><?= $row->jumlah_peserta ?></td>
                              <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->nama_peminjam ?></td>
                              <td><?= $row->status ?></td>
                              <td><?= $row->keterangan ?></td>
                          </tr>
                          <?php $no++?>
                      <?php endforeach?>
                  </tbody>
                 </table>
             </div>
         </div>
      </div>
      </div>
  </div>
</div>
