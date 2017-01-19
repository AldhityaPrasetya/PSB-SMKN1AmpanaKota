
<?php

//DIBAWAH EDITAN BARU

$YPATHFILE="infoimages";

echo" 
      <div id='comments'>
        <h2>TENTANG SEKOLAH</h2>
        <ul class='commentlist'>
	";
		
$batas   = 5;
$halaman = $_GET['halaman'];
if(empty($halaman)){$posisi  = 0;$halaman = 1;}
else{$posisi = ($halaman-1) * $batas;}

$no = 0;
$dt=mysql_query("SELECT * FROM tbl_informasi where f_jenisinfo='PROFILE' order by f_judulinfo asc");
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
				<p>$infotext	</p>
    			</li> 				
				" ;	
	}
	else if($no %2==0){
		echo"
				<li class='comment_even'>
            	<div class='author'><img class='avatar' src='$YPATHFILE/$images' alt='$images' width='32' height='32' /><span class='name'><a href='?mnu=finformasidetail&id=$id'>$judulinfo</a></span> <span class='wrote'>..</span></div>
   	        	<div class='submitdate'>Hari ini : <a href='#'>$hari_ini, ".date('d/m/y')." - ".date('h:m:s')." WIB</a></div>
				<p>$infotext	</p>
    			</li> 
				" ;	
	}
	$no++;

}
echo"
        </ul>
      </div>
		";
		
?>


