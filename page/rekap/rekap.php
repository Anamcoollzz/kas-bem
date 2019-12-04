<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-info ">
            <div class="panel-heading">
               Rekapitulasi Kas
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
                            <th>Jenis</th>
                            <th>Masuk</th>
                            <th>Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       $no = 1;
                       $sql = $koneksi->query("select * from kas");
                       while ($data=$sql->fetch_assoc()) {
                         
                          
                           ?>
                           
                           <tr class="odd gradeX">
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['kode']; ?></td>
                            <td><?php echo date('d F Y', strtotime( $data['tgl'])); ?></td>
                            <td><?php echo $data['keterangan']; ?></td>
                            <td><?php echo $data['jenis']; ?></td>
                            <td align="right"><?php echo number_format( $data['jumlah']).",-"; ?></td>
                            <td  align="right"><?php echo number_format( $data['keluar']).",-"; ?></td>
                            
                        </tr>


                        
                        <?php 
                        $total_masuk=$total_masuk+$data['jumlah'];
                        $total_keluar=$total_keluar+$data['keluar'];
                        $total_saldo=$total_masuk-$total_keluar;
                    } 

                    ?>
                </tbody>
                <tr>
                   <th style="text-align: center; font-size: 17px;" colspan="5">Total Kas Masuk</th>
                   <td  align="right"  style="font-size: 17px;"><b>Rp.<?php echo number_format($total_masuk) ; ?>,-</b></td>
               </tr>

               <tr>
                   <th style="text-align: center; font-size: 17px;" colspan="5">Total Kas Keluar</th>
                   <td  align="right" style="font-size: 17px;"><b>Rp.&nbsp&nbsp&nbsp<?php echo number_format($total_keluar) ; ?>,-</b></td>
               </tr>

               <tr>
                   <th style="text-align: center; font-size: 17px;" colspan="5">Saldo Akhir</th>
                   <td colspan="6" style="font-size: 17px;"><b>Rp.<?php echo number_format($total_saldo) ; ?>,-</b></td>
               </tr>
           </table>
       </div>
       <a id="lap_masuk" data-toggle="modal" data-target="#lap" style="margin-top: 8px; margin-left: 5px;" class="btn btn-default"><i class="fa fa-print"></i> Cetak PDF</a>

       <div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Laporan Kas Masuk</h4>
                </div>

                <div class="modal-body">
                 <form role="form" method="POST" action="laporan/rekap_laporan.php" target="blank" >

                   
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
                    
                    <a href="./laporan/rekap_laporan.php" class="btn btn-default" target="blank" style="margin-top: 8px; margin-left: 5px;"><i class="fa fa-print"></i> Cetak Semua</a>

                    

                    
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
