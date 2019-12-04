<?php 



$sql = $koneksi->query("SELECT * FROM kas");
while($data=$sql->fetch_assoc()){
  $jml = $data['jumlah'];
  $total = $total+$jml;

  $kas_keluar = $data['keluar'];
  $total_keluar = $total_keluar+$kas_keluar;

  $saldo=$total-$total_keluar;
  
}
?>

<marquee>Website pengolahan kas BEM fakultas ilmu komputer</marquee>


<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
         <h2>Halaman Utama</h2>   
         <h5>Kas Badan Eksekutif Mahasiswa Fakultas Ilmu Komputer</h5>
     </div>
 </div>              
 <!-- /. ROW  -->
 <hr />
 <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-6">           
       <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-green set-icon">
            <i class="glyphicon glyphicon-floppy-save"></i>
        </span>
        <div class="text-box" >
            <p class="main-text">Rp.<?php echo number_format($total); ?>,-</p>
            <p class="text-muted">Total Kas Masuk</p>
        </div>
    </div>
</div>

<div class="col-md-4 col-sm-6 col-xs-6">           
   <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-red set-icon">
        <i class="glyphicon glyphicon-floppy-open"></i>
    </span>
    <div class="text-box" >
        <p class="main-text">Rp.<?php echo number_format($total_keluar); ?>,-</p>
        <p class="text-muted">Total Kas Keluar</p>
    </div>
</div>
</div>

<div class="col-md-4 col-sm-6 col-xs-6">           
   <div class="panel panel-back noti-box">
    <span class="icon-box bg-color-brown set-icon">
        <i class="glyphicon glyphicon-floppy-disk"></i>
    </span>
    <div class="text-box" >
        <p class="main-text">Rp.<?php echo number_format($saldo); ?>,-</p>
        <p class="text-muted">Total Saldo Akhir</p>
    </div>
</div>
</div>
</div>
</div>		     
