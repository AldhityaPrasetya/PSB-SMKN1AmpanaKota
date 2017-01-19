
<?php
$PATHJAVASCRIPT="scripts";
?>
<!-- form validation -->
<link type="text/css" href="<?php echo "$PATHJAVASCRIPT/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>validation/jquery.validate.pack.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/i18n/ui.datepicker-id.js"></script>    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tglbayarform").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
		
     });
    </script>  

	
  <style type="text/css">
<!--
.style1 {font-size: 12px}
-->
  </style>

<?php
	if($_GET["pro"]=="awal"){
		$nopendaftaran=$_GET["id"];
		$s="select f_nopendaftaran,f_namalengkap,f_jurusan,f_tglbayarform from tbl_calonsiswa,tbl_jurusan where f_nopendaftaran='$nopendaftaran' and tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid ";
		$q=mysql_query($s);
			$d=mysql_fetch_array($q);
				$nopendaftaran=$d["f_nopendaftaran"];
				$nama=$d["f_namalengkap"];
				$jurusan=$d["f_jurusan"];
				$tglbayarform=$d["f_tglbayarform"];
				$pro="awal";		
	}
?>

  <h2>DATA PEMBAYARAN FORMULIR </h2>
  <form id="updatetglbayarformulir" action="" method="post" enctype="multipart/form-data" name="ftbl_calonsiswa" >
<table width="495">
  <tr>
    <td width="186"><div align="right" class="style1">No.Pendaftaran:</div></td>
    <td width="297"><input name="nopendaftaran" type="text" id="nopendaftaran" size="10" readonly="true" value="<?php echo $nopendaftaran;?>" /></td>
  </tr> 
  <tr>
    <td><div align="right" class="style1">Nama Calon Siswa: </div></td>
    <td><input name="nama" type="text" id="nama" size="40" readonly="true" value="<?php echo $nama;?>" class="required" title="data tidak sesuai" /></td>
  </tr>
  <tr>
    <td><div align="right" class="style1">Jurusan yang Dipilih: </div></td>
    <td><input name="jurusan" type="text" id="jurusan" size="30" readonly="true" value="<?php echo $jurusan;?>" /></td>
  </tr>
  <tr>
    <td><div align="right" class="style1">Tanggal Bayar Formulir: </div></td>
    <td><input name="tglbayarform" type="text" id="tglbayarform" size="15" value="<?php echo $tglbayarform;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		<input name="simpandata" type="submit" onclick="return confirm('Simpan Data')" value="Simpan" />
		<a href="?mnu=fcalonsiswa"><input name="Batal" type="button" value="Batal" /></a>
	</td>
  </tr>
</table>
</form>


<?php	//	SIMPAN DATA PEMBAYARN FORMULIR
	if(isset($_POST["simpandata"])){
		$nopendaftaran=$_POST["nopendaftaran"];
		$tglbayarform=$_POST["tglbayarform"];
		$s="update tbl_calonsiswa set f_tglbayarform='$tglbayarform' where f_nopendaftaran='$nopendaftaran' ";
		$update=mysql_query($s);
		if($update){
			//MENCARI NOMOR HP
			$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$nopendaftaran' ";
			$hasil=mysql_query($sql);
			$data=mysql_fetch_array($hasil);
			$nopendaftaran=$data["f_nopendaftaran"];
			$namalengkap=$data["f_namapanggilan"];
			$nohp=$data["f_nohp"];
			$tgl=$data["f_tglbayarform"];
			//MENGIRIM KONFIRMASI
			$kirimkonfirmasi="insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namalengkap. Pembayaran Formulir Pendaftaran Anda sudah diterima pada tgl $tgl. Terimakasih','SPSB')";
			mysql_query($kirimkonfirmasi);
		
			echo "<script>alert('PEMBAYARAN BERHASIL DISIMPAN');document.location.href='?mnu=fcalonsiswa';</script>";
		}
		else{
			echo"<script>alert('PEMBAYARAN GAGAL DISIMPAN');document.location.href='?mnu=fcalonsiswa';</script>";
		}
	}
?>
