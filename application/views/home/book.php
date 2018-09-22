
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card  card-box">
            <div class="card-head">
                <header>Manual Book <?= $dir ?></header>
                <div class="tools">
                    <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                    <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                    <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                </div>
            </div>
            <div class="card-body ">
              <div class="table-wrap">

                    <?php 
                      
                      // mengambil data gambar
                      $map = directory_map('./gambar/'.$dir,0);
                      //mengubah urutan gambar
                      $gambar = array_reverse($map);
                      for ($i = 0; $i < count($map) ; $i++) {?>
                            
                            <h1>
                                <?=$i+1?>.
                                <!-- membuang karakter .png -->
                                <?= $dir=='login'?'Login':ucfirst(rtrim($gambar[$i],'.png')) ?>
                                  
                            </h1>                        
                            <img src="<?= base_url() ?>gambar/<?= $dir.'/'.$map[$i] ?>" class="img-fluid" alt="Responsive image">
                            <br>
                       
                      <?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>
