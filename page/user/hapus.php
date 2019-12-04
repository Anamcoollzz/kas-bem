<?php

	$ambil = $koneksi->query("select * from tb_user where id='$_GET[id]'");

	$data = $ambil->fetch_assoc();

	$foto_produk=$data['foto'];

	if (file_exists("images/$foto_produk")) {
		unlink("images/$foto_produk");
	}

	$koneksi->query("delete from tb_user where id='$_GET[id]'");






    ?>
      <script type="text/javascript">

        alert ("Data Berhasil dihapus");
        window.location.href="?page=user";

      </script>
    <?php


?>
