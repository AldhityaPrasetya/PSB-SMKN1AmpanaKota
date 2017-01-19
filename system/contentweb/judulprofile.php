<?php
	$dt=mysql_query("select * from tbl_informasi where f_jenisinfo='PROFILE' order by f_judulinfo asc ");
	while($d= mysql_fetch_array($dt)){
		$id=$d["f_kodeinfo"];	
		$judulinfo=$d["f_judulinfo"];
		echo "<li><a href='index.php?mnu=finformasidetail&id=$id'>$judulinfo</a></li> " ;	
	}
?>
