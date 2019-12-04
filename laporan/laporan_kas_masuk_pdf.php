<?php
error_reporting(0);
$koneksi = new mysqli  ("localhost","root","","kas");
$content ='

<style type="text/css">
	
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
	.tabel td{padding: 8px 5px;     }
</style>


';
    $content .= '
<page>
    <h2 style="text-align:center;">Laporan Kas Masuk Bem Ilkom</h2>
    <br>
    <table border="1px" class="tabel" align="center">
    	
    		<tr>
    			<th>No</th>
    			<th>Kode</th>
    			<th>Tanggal</th>
    			<th>Keterangan</th>
    			<th>Jumlah</th>
    		</tr>';

    		

    			$tgl4 = date("d-m-Y");

    			if (isset($_POST['cetak'])) {

				
				$tgl1 = $_POST['tgl1'];
				$tgl2 = $_POST['tgl2'];

				$no = 1;
				

				$sql = $koneksi->query("select * from kas where tgl between '$tgl1' and '$tgl2' and jenis = 'Masuk' ");
				while ($data=$sql->fetch_assoc()) {
					$content .='
					<tr>
		    			<td>'.$no++.' </td>
		    			<td> '.$data['kode'].' </td>
		    			<td> '.date('d F Y', strtotime( $data['tgl'])).' </td>
		    			<td> '.$data['keterangan'].' </td>
		    			<td align="right"> '.number_format( $data['jumlah']).",-".' </td>
		    		</tr>
		    		';
		    		$total=$total+$data['jumlah'];

				}

						
				}else{	
    			

    		
        		$no = 1;
        		$sql = $koneksi->query("select * from kas where jenis = 'masuk'");
        		while ($data=$sql->fetch_assoc()) {
        	
    	
    		$content .='

    		<tr>
    			<td>'.$no++.' </td>
    			<td> '.$data['kode'].' </td>
    			<td> '.date('d F Y', strtotime( $data['tgl'])).' </td>
    			<td> '.$data['keterangan'].' </td>
    			<td align="right"> '.number_format( $data['jumlah']).",-".' </td>
    		</tr>

    		';	
    		$total=$total+$data['jumlah'];
    		}
    		}
    		$content .='

    			<tr>
                    <th style="text-align: center; font-size: 17px;" colspan="4">Total Kas Masuk</th>
                    <td style="font-size: 17px;"><b>Rp.'.number_format($total).',-</b></td>
                </tr>

    		';	


$content .=' 	
    </table>
    <br>
    <a style="text-decoration: none; color: black; margin-left: 500px;">Jember, '.$tgl4.'</a><br>
    <a style="text-decoration: none; color: black; margin-left: 500px;">Ketua</a><br><br><br><br><br><br>
    <a style="text-decoration: none; color: black; margin-left: 500px;">Mas Ranggi</a>
    
</page>';

    require_once('../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('exemple.pdf');
?>