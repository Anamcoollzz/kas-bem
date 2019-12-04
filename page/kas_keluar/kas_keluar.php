<!-- TAMPIL DATA -->
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-info ">
            <div class="panel-heading">
               Kas Kaluar
           </div>
           <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $no = 1;
                       $sql = $koneksi->query("select * from kas where jenis = 'keluar'");
                       while ($data=$sql->fetch_assoc()) {
                         
                          
                           ?>
                           
                           <tr class="odd gradeX">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['kode']; ?></td>
                            <td><?php echo date('d F Y', strtotime( $data['tgl'])); ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td align="right"><?php echo number_format( $data['keluar']).",-"; ?></td>
                            <td>
                               <a id="edit_masuk" data-toggle="modal" data-target="#edit" data-id="<?php echo $data['kode']; ?>" data-tgl="<?php echo  $data['tgl']; ?>"  data-ket="<?php echo $data['keterangan']; ?>"  data-jml="<?php echo    $data['keluar'];?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>

                               <a onclick="return confirm('Anda Yakin Akan Menghapus Data ini')" href="?page=masuk&aksi=hapus&id=<?php echo $data['kode']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                           </td>
                       </tr>


                       
                       <?php 
                       $total=$total+$data['keluar'];
                   } 

                   ?>
               </tbody>
               <tr>
                   <th style="text-align: center; font-size: 17px;" colspan="4">Total Kas Masuk</th>
                   <td align="right" style="font-size: 15px;"><b>Rp. <?php echo number_format($total) ; ?>,-</b></td>
               </tr>
           </table>
       </div>

       
       <!-- TAMBAH DATA -->

       <button class="btn btn-success " data-toggle="modal" data-target="#myModal" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah</button>

       

       <a id="lap_masuk" data-toggle="modal" data-target="#lap" style="margin-top: 8px; margin-left: 5px;" class="btn btn-default"><i class="fa fa-print"></i> Cetak PDF</a>

       <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                </div>

                <div class="modal-body">
                 <form role="form" method="POST">

                   <div class="form-group">
                       <label>Kode</label>
                       <input class="form-control" type="text" name="kode" /> 
                   </div>

                   <div class="form-group">
                       <label>Keterangan</label>
                       <textarea class="form-control" rows="3" name="keterangan" ></textarea>
                   </div>

                   <div class="form-group">
                       <label>Tanggal</label>
                       <input class="form-control" type="date" name="tanggal" /> 
                   </div>

                   <div class="form-group">
                       <label>Jumlah</label>
                       <input class="form-control" type="number" name="jumlah" /> 
                   </div>

                   <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    
                </div>
            </div>	
            
            
        </form> 

        <?php
        if (isset($_POST['simpan'])) {
          
          $kode = $_POST['kode'];
          $keterangan = $_POST['keterangan'];
          $tanggal = $_POST['tanggal'];
          $jumlah = $_POST['jumlah'];


          $sql = $koneksi->query("insert into kas (kode, keterangan, tgl, jumlah, jenis, keluar) values('$kode', '$keterangan', '$tanggal', 0 , 'Keluar', '$jumlah')");

          if ($sql) {
            ?>
            <script type="text/javascript">
              
              alert ("Data Berhasil Disimpan");
              window.location.href="?page=keluar";

          </script>
          <?php
      }
  }

  ?>   
  
</div>
</div>

</div>

<!-- EDIT DATA -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
            </div>

            <div class="modal-body" id="modal_edit">
             <form role="form" id="form" method="POST">

               <div class="form-group">
                   <label for="kode_kas">Kode</label>
                   <input class="form-control" type="text" name="kode_kas" id="kode_kas" readonly /> 
               </div>

               <div class="form-group">
                   <label for="ket">Keterangan</label>
                   <textarea class="form-control" rows="3" name="ket" id="ket" ></textarea>
               </div>

               <div class="form-group">
                   <label for="tgl">Tanggal</label>
                   <input class="form-control" type="date" name="tgl" id="tgl" /> 
               </div>

               <div class="form-group">
                   <label for="jml">Jumlah</label>
                   <input class="form-control" type="number" name="jml" id="jml" /> 
               </div>

               <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                
            </div>
        </div> 	
        
        
    </form> 


    <?php 

    if (isset($_POST['edit'])) {
    	
        
       $koneksi = new mysqli  ("localhost","root","","kas");
       $id = $_POST['kode_kas'];
       $ket = $_POST['ket'];
       $tgl = $_POST['tgl'];
       $jml = $_POST['jml'];



       $sql = $koneksi->query("update kas set keterangan='$ket', tgl='$tgl', keluar='$jml' where kode='$id'");

       if ($sql) {
        ?>
        <script type="text/javascript">
          
          alert ("Data Berhasil Diubah");
          window.location.href="?page=keluar";

      </script>
      <?php
  }

}		

?>


</div>
</div>

</div>

<script src="assets/js/jquery-1.10.2.js"></script>

<script type="text/javascript">
   
   $(document).on("click", "#edit_masuk", function(){
      var kode = $(this).data('id');
      var tgl = $(this).data('tgl');
      var ket = $(this).data('ket');
      var jml = $(this).data('jml');

      $("#modal_edit #kode_kas").val(kode);
      $("#modal_edit #tgl").val(tgl);
      $("#modal_edit #ket").val(ket);
      $("#modal_edit #jml").val(jml);
  })

   

</script>



<div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Laporan Kas Masuk</h4>
            </div>

            <div class="modal-body">
             <form role="form" method="POST" action="laporan/laporan_kas_keluar_pdf.php" target="blank" >

               
               <div class="form-group">
                   <label>Dari Tanggal</label>
                   <input class="form-control" type="date" name="tgl1" /> 
               </div>

               <div class="form-group">
                   <label> Sampai Tanggal</label>
                   <input class="form-control" type="date" name="tgl2" /> 
               </div>

               

               <div class="modal-footer">

                <button type="submit" name="cetak" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i> Cetak per Periode</button>
                
                <a href="./laporan/laporan_kas_keluar_pdf.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> Cetak Semua</a>

                

                
            </div>
        </div>	
        
        
    </form> 


    
</div>
</div>

</div>


</div>
</div>
</div>
</div>  


