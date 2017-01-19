<?php 
	$FTSWA="fotocalonsiswa";
	
	$kode=$_SESSION["KODELOG"];
	$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$kode' ";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
		$stsfoto=$data["f_stsfoto"];
		$foto=$data["f_foto"];
?>
<style type="text/css">
<!--
.stylebelumupload {color:#FF0000}
.stylesudahdisetujui {color:#33CC00}
-->
</style>

<h2>UPLOAD FOTO CALON SISWA</h2>

  <table width="494">
     <tr>
      <td width="486" height="56" colspan="2" align="center" valign="top">
		  <?php 
			  if ($stsfoto == NULL){
				 echo "<em><b>!</b> Maaf, Anda Belum Upload Pas Foto... <a href='?mnu=fuploadfoto'>Klik disini untuk Upload Foto...</a></em>";
			  }
		  ?>
	  <br />
	  	<?php 
			  if ($stsfoto =='T'){
				  echo "<img src='$FTSWA/$foto' width='300' height='325' border='1' />";
			  }
			  else if($stsfoto =='Y'){
				  echo "<img src='$FTSWA/$foto' width='300' height='325' border='1' />";
			  }
		?>
		<br />
      <b>
		  <?php 
			  if($stsfoto =='T'){
				echo "<span class='stylebelumupload'>FOTO BELUM MENDAPAT PERSETUJUAN PANITIA</span>";
			  }
			  else if($stsfoto =='Y'){
				echo "<span class='stylesudahdisetujui'>FOTO TELAH DISETUJUI OLEH PANITIA</span>";
			  }
		  ?>
	  </b>
	  </td>
    </tr>
</table>
  
