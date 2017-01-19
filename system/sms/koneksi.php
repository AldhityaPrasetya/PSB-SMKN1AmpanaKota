
<?php
	date_default_timezone_set("Asia/Jakarta");
	
	$server="localhost";
	$pmkai="root";
	$passwd="";
	$db="db_psbnew";  
	
	$id_mysql=mysql_connect($server,$pmkai,$passwd);
	if (! $id_mysql){
		die("Tak dapat melakukan koneksi ke server MySQL");
	}
	
	$db_master=mysql_select_db($db,$id_mysql);
	if (! $db_master){
		die("Tak dapat mengakses database $db");
	}	
	//	echo"<h2>Database Berhasil Terkoneksi</h2>";

	//	memdefinisakn waktu, tanggal hari dsb
	$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	$hari = date("w");
	$hari_ini = $seminggu[$hari];
	
	$wmysql = date("Y-m-d");
	$tgl_sekarang = date("d");
	$bln_sekarang = date("m");
	$thn_sekarang = date("Y");
	$kid=date("y").date("m");
	$tanggal_sekarang=$thn_sekarang."-".$bln_sekarang."-".$tgl_sekarang;
	$jam_sekarang = date("H:i:s");
	
	$nama_bulan=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
	$nama_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
	$windo=$tgl_sekarang." ".$nama_bulan[(int)$bln_sekarang]." ".$tahun;
	
	$TG = substr($sekarang,8,2);
	$BL = substr($sekarang,5,2);
	$TH = substr($sekarang,0,4);
	
	$css="amazon.css";//amazon/flickr/gradient/standar/greenblack
		//echo"<link href='mycss/$css' rel='stylesheet' type='text/css' />";
?>