<?php
$YPATHFILE="infoimages";
$id=$_GET["id"];
$detail=mysql_query("select * from tbl_informasi where f_kodeinfo='$id'");
	$d = mysql_fetch_array($detail);
	$tanggal = $d["f_tglpost"];
	$judulinfo = $d["f_judulinfo"];
	$images = $d["f_images"];
	$infolengkap = $d["f_infolengkap"];	
	echo "<h1>$judulinfo</h1>";
	if ($images!=''){
		$infolengkap = nl2br($infolengkap);
		echo "<img class='imgr' src='$YPATHFILE/$images' alt='$images' width=270 height=200 /> $infolengkap ";
	}
?>

