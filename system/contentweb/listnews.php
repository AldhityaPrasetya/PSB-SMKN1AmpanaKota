
<?php

//DIBAWAH EDITAN BARU

$YPATHFILE="infoimages";

echo" 
      <div id='comments'>
        <h2>BERITA</h2>
        <ul class='commentlist'>
	";
		
$batas   = 5;
$halaman = $_GET['halaman'];
if(empty($halaman)){$posisi  = 0;$halaman = 1;}
else{$posisi = ($halaman-1) * $batas;}

$no = 0;
$dt=mysql_query("SELECT * FROM tbl_informasi where f_jenisinfo='NEWS' order by rand() limit 10");
while($d= mysql_fetch_array($dt)){
	$tanggal=$d["f_tglpost"];
	$judulinfo=$d["f_judulinfo"];
	$id=$d["f_kodeinfo"];
	$images=$d["f_images"];
	if ($images==''){
		$images="default.gif";
	}

	$infotext=$d["f_infotext"];
	if(strlen($infotext)>100){
		$infotext=substr($infotext,0,100)."...<p class='readmore'><a href='index.php?mnu=finformasidetail&id=$id'>Baca Selengkapnya &raquo;</a></p>";
	}
	
	
	if($no %2==1){
		echo"
				<li class='comment_odd'>
           		<div class='author'><img class='avatar' src='$YPATHFILE/$images' alt='$images' width='32' height='32' /><span class='name'><a href='?mnu=finformasidetail&id=$id'>$judulinfo</a></span> <span class='wrote'>..</span></div>
   	    		<div class='submitdate'>Hari ini : <a href='#'>$hari_ini, ".date('d/m/y')." - ".date('h:m:s')." WIB</a></div>
				$infotext	
    			</li> 				
				" ;	
	}
	else if($no %2==0){
		echo"
				<li class='comment_even'>
            	<div class='author'><img class='avatar' src='$YPATHFILE/$images' alt='$images' width='32' height='32' /><span class='name'><a href='?mnu=finformasidetail&id=$id'>$judulinfo</a></span> <span class='wrote'>..</span></div>
   	        	<div class='submitdate'>Hari ini : <a href='#'>$hari_ini, ".date('d/m/y')." - ".date('h:m:s')." WIB</a></div>
				$infotext	
    			</li> 
				" ;	
	}
	$no++;

}
echo"
        </ul>
      </div>
	  <center>
		";

$tampil2 = mysql_query("SELECT * FROM tbl_informasi where f_jenisinfo='NEWS' ");
$jmldata = mysql_num_rows($tampil2);
$jmlhal  = ceil($jmldata/$batas);

if($halaman > 1){
	$prev=$halaman-1;
	echo "
<table width='50' border=''>
  <tr>
    <td>
<a href='$_SERVER[PHP_SELF]?halaman=$prev&mnu=listnews'><img class='imgl' src='images/prev.png' alt='' /></a> ";
}
else{ 
	echo "<img class='imgl' src='images/prev.png' alt='' /> ";
}

for($i=1;$i<=$jmlhal;$i++)
if ($i != $halaman){
	echo " <a href='$_SERVER[PHP_SELF]?halaman=$i&mnu=listnews'>$i</a> ";
}
else{
	echo " $i ";
}

if($halaman < $jmlhal){
	$next=$halaman+1;echo "<a href='$_SERVER[PHP_SELF]?halaman=$next&mnu=listnews'><img class='imgr' src='images/next.png' alt='' /></a> ";
}
else{
	echo "<img class='imgr' src='images/next.png' alt='' /> 
	</td>
  </tr>
</table> 
</center>
";
}

echo "<br>
<center>
	Total: <b>$jmldata</b> Data
	</center>
";

//echo"</center>";


?>


