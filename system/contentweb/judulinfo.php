<? 
	mysql_connect("localhost","root","");
	mysql_select_db("db_psbnew");

	$dt=mysql_query("select * from tbl_informasi where f_jenisinfo='INFO' order by f_judulinfo asc ");
	while($d= mysql_fetch_array($dt)){
		$id=$d["f_kodeinfo"];	
		$judulinfo=$d["f_judulinfo"];

		echo "<li><a href='index.php?mnu=finformasidetail&id=$id'>$judulinfo</a></li> " ;	
	}
?>
