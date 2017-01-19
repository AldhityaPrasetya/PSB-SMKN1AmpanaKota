<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#updatenilaitest").validate({
		messages: {
		
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
<style type="text/css">
<!--
.style1 {font-size: 12px}
.style2 {color: #FF0000}
.style5 {color: #009900}
-->
  </style>

<?php
	if($_GET["pro"]=="awal"){
		$nopendaftaran=$_GET["id"];
		$s="select f_nopendaftaran,f_namalengkap,f_nilaiijazah,f_nilaiuan,f_statusterima,f_nilaitest from tbl_calonsiswa where f_nopendaftaran='$nopendaftaran' ";
		$q=mysql_query($s);
			$d=mysql_fetch_array($q);
				$nopendaftaran=$d["f_nopendaftaran"];
				$nama=$d["f_namalengkap"];
				$ijazah=$d["f_nilaiijazah"];
				$uan=$d["f_nilaiuan"];
				$statusterima=$d["f_statusterima"];
				$nilaitest=$d["f_nilaitest"];
				$pro="awal";		
	}
?>

  <h2>DATA NILAI CALON SISWA</h2>
  <form id="updatenilaitest" action="" method="post" enctype="multipart/form-data" name="ftbl_calonsiswa" >
  <table width="494">
  <tr>
    <td width="182"><div align="right" class="style1">No.Pendaftaran:</div></td>
    <td width="300"><input name="nopendaftaran" type="text" id="nopendaftaran" size="10" readonly="true" value="<?php echo $nopendaftaran;?>" /></td>
  </tr> 
  <tr>
    <td><div align="right" class="style1">Nama Calon Siswa: </div></td>
    <td><input name="nama" type="text" id="nama" size="50" readonly="true" value="<?php echo $nama;?>" class="required" title="data harus sesuai" /></td>
  </tr>
  <tr>
    <td><div align="right" class="style1">Nilai Ijazah: </div></td>
    <td><input name="ijazah" type="text" id="ijazah" size="5" readonly="true" value="<?php echo $ijazah;?>" /></td>
  </tr>
  <tr>
    <td><div align="right" class="style1">Nilai UAN:  </div></td>
    <td><input name="uan" type="text" id="uan" size="5" readonly="true" value="<?php echo $uan;?>" /></td>
  </tr>
  <tr>
    <td><div align="right" class="style1">Nilai Test Masuk: </div></td>
    <td><input name="nilaitest" type="text" id="nilaitest" size="5" value="<?php echo $nilaitest;?>" class="required" title="harus diisi" />
    contoh: <span class="style2">60.5 atau 79</span> </td>
  </tr>
  <tr>
    <td><div align="right" class="style1">Status Terima: </div></td>
    <td>
      <select name="statusterima" class="required" title="harus diisi">
        <option value="<?php echo $statusterima;?>" ><?php echo $statusterima;?></option>
        <option value="TERIMA">TERIMA</option>
        <option value="TOLAK">TOLAK</option>
      </select>
      <strong><span class="style5">TERIMA</span> atau <span class="style2">TOLAK</span></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="simpandata" type="submit" value="Simpan Data" />
	<a href="?mnu=fnilaicalonsiswa"><input name="Batal" type="button" value="Batal" /></a>
	</td>
  </tr>
</table>
</form>


<?php	//	SIMPAN NILAI TEST MASUK
	if(isset($_POST["simpandata"])){
		$nopendaftaran=$_POST["nopendaftaran"];
		$uan=$_POST["uan"];
		$statusterima=$_POST["statusterima"];
		$nilaitest=$_POST["nilaitest"];
		$s="update tbl_calonsiswa set f_statusterima='$statusterima', f_nilaitest=$nilaitest where f_nopendaftaran='$nopendaftaran' ";
		$update=mysql_query($s);
		if($update){
			//MENCARI NOMOR HP
			$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$nopendaftaran' ";
			$hasil=mysql_query($sql);
			$data=mysql_fetch_array($hasil);
			$namalengkap=$data["f_namapanggilan"];
			$nohp=$data["f_nohp"];
			$statusterima=$data["f_statusterima"];
			//MENGIRIM KONFIRMASI
			if($statusterima =='TERIMA'){
				$kirimkonfirmasi1="insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namalengkap. Selamat Anda Di$statusterima bersekolah di SMK SMK Negeri 1 Ampana Kota. Terimakasih','SPSB')";
				mysql_query($kirimkonfirmasi1);
			}
			else if($statusterima=='TOLAK'){
				$kirimkonfirmasi2="insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namalengkap. Maaf Anda Di$statusterima bersekolah di SMK SMK Negeri 1 Ampana Kota. Terimakasih','SPSB')";
				mysql_query($kirimkonfirmasi2);
			}
			
			echo"<script>alert('NILAI TEST MASUK BERHASIL DISIMPAN');document.location.href='?mnu=fnilaicalonsiswa';</script>";
		}
		else{
			echo"<script>alert('NILAI TEST MASUK GAGAL DISIMPAN');document.location.href='?mnu=fnilaicalonsiswa';</script>";
		}
	}
?>
