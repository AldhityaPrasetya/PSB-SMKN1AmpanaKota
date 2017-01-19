<?php
$PATHJAVASCRIPT="scripts";
?>

<link type="text/css" href="<?php echo "$PATHJAVASCRIPT/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/i18n/ui.datepicker-id.js"></script>    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggalsttb").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>  
	
<style type="text/css">
<!--
.style3 {font-size: 12px}
.style4 {color: #FF0000}
-->
</style>

<div id='comments'>
<h2>Data Pendidikan Sebelumnya</h2>
	<ul class='commentlist'>
		<li class='comment_odd'>
			&diams; Isilah Data Asal Sekolah dibawah ini sesuai dengan data asli <br />
			&diams; Perhatikan seluruh inputan yang anda masukan disini <br />
<!--			&diams; Sistem tidak bisa menyimpan apabila ada masukan yang belum dientri <br /> -->
		</li>
				
</ul></div>
 
<form action="" method="post" enctype="multipart/form-data" name="ftbl_calonsiswa" id="ftbl_calonsiswa">
  <table width="494">
    <tr>
      <td colspan="2"><span class="style3"><strong>PENDIDIKAN SEBELUMNYA </strong></span></td>
    </tr>
    <tr>
      <td width="186"><div align="right" class="style3">
          <div align="right">Tahun Lulus: </div>
      </div></td>
      <td width="296"><input name="tahunlulus" type="text" id="tahunlulus" size="10" value="<?php echo $tahunlulus; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Nama Sekolah: </div>
      </div></td>
      <td class="style3"><input name="lulusansekolah" type="text" id="lulusansekolah" size="40" value="<?php echo $lulusansekolah; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Alamat Sekolah: </div>
      </div></td>
      <td class="style3"><span class="style3">
        <textarea name="alamatsekolah" cols="40" id="alamatsekolah"><?php echo $alamatsekolah; ?></textarea>
      </span></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Tanggal STTB: </div>
      </div></td>
      <td class="style3"><input name="tanggalsttb" type="text" id="tanggalsttb" size="10" value="<?php echo $tanggalsttb; ?>" />
      dd/MM/yyy</td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Nomor STTB: </div>
      </div></td>
      <td class="style3"><input name="nosttb" type="text" id="nosttb" value="<?php echo $nosttb; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Lama Belajar: </div>
      </div></td>
      <td><label>
        <select name="lamabelajar">
		<option value="<?php echo $lamabelajar;?>"	><?php echo $lamabelajar;?></option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td colspan="2"><span class="style3"><strong>Nilai Ijazah Pendidikan Sebelumnya </strong></span></td>
    </tr>
    <tr>
      <td><div align="right"><span class="style3">Nilai Ijazah: </span></div></td>
      <td class="style3">
        <input name="nilaiijazah" type="text" id="nilaiijazah" size="2" value="<?php echo $nilaiijazah;?>" />
      contoh:<span class="style4"> 20.3 </span></td>
    </tr>
    <tr>
      <td><div align="right"><span class="style3">Jumlah Pelajaran: </span></div></td>
      <td class="style3">
        <input name="pelijazah" type="text" id="pelijazah" size="2" value="<?php echo $pelijazah;?>" />
      contoh:<span class="style4"> 6 atau 7 </span> </td>
    </tr>
    <tr>
      <td colspan="2"><span class="style3"><strong>Nilai UAN Pendidikan Sebelumnya </strong></span></td>
    </tr>
    <tr>
      <td><div align="right"><span class="style3">Nilai UAN: </span></div></td>
      <td class="style3">
        <input name="nilaiuan" type="text" id="nilaiuan" size="2" value="<?php echo $nilaiuan;?>" />
        contoh:<span class="style4"> 20.3</span></td>
    </tr>
    <tr>
      <td><div align="right"><span class="style3">Jumlah Pelajaran: </span></div></td>
      <td class="style3">
        <input name="jumlahpelajaran" type="text" id="jumlahpelajaran" size="2" value="<?php echo $jumlahpelajaran;?>" />
        contoh:<span class="style4"> 3 atau 4</span> </td>
    </tr>
    <tr>
      <td colspan="2"><span class="style3"><strong>BILA CALON SISWA PINDAHAN</strong></span></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Asal Sekolah: </div>
      </div></td>
      <td><input name="asalsekolah" type="text" id="asalsekolah" size="40" value="<?php echo $asalsekolah;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Alasan Pindah: </div>
      </div></td>
      <td><span class="style3">
        <textarea name="alasanpindah" cols="40" id="alasanpindah"><?php echo $alasanpindah;?></textarea>
      </span></td>
    </tr>
    <tr>
      <td height="26">&nbsp;</td>
      <td><span class="style3">
        <input type="submit" name="Ubah" onclick="return confirm('Update Data ?')" value="Update" />
        <input type="reset" name="Reset" value="Reset" />
      </span></td>
    </tr>
  </table>

</form>

	<!-- MENGUPDATE DATA  -->
<?php 
	$nopendaftaran=$_SESSION["KODELOG"];
	if(isset($_POST["Ubah"])){	
		$tahunlulus = $_POST["tahunlulus"];
		$lulusansekolah = $_POST["lulusansekolah"];
		$alamatsekolah=$_POST["alamatsekolah"];
		$tanggalsttb = $_POST["tanggalsttb"];
		$nosttb = $_POST["nosttb"];
		$nilaiijazah=$_POST["nilaiijazah"];
		$pelijazah=$_POST["pelijazah"];
		$nilaiuan = $_POST["nilaiuan"];
		$jumlahpelajaran = $_POST["jumlahpelajaran"];
		$lamabelajar = $_POST["lamabelajar"];
		$asalsekolah = $_POST["asalsekolah"];
		$alasanpindah = $_POST["alasanpindah"];

		$sql="update tbl_calonsiswa set f_tahunlulus='$tahunlulus', f_lulusansekolah='$lulusansekolah', f_alamatsekolah='$alamatsekolah', f_tanggalsttb='$tanggalsttb', f_nosttb='$nosttb', f_nilaiijazah='$nilaiijazah', f_pelijazah='$pelijazah', f_nilaiuan='$nilaiuan', f_jumlahpelajaran='$jumlahpelajaran', f_lamabelajar='$lamabelajar', f_asalsekolah='$asalsekolah', f_alasanpindah='$alasanpindah' where f_nopendaftaran='$nopendaftaran' ";

		$hasil=mysql_query($sql);
		if($hasil){
		/*	//MENCARI NOMOR HP
			$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$nopendaftaran' ";
			$hasil=mysql_query($sql);
			$data=mysql_fetch_array($hasil);
			$namalengkap=$data["f_namapanggilan"];
			$nohp=$data["f_nohp"];
			//MENGIRIM KONFIRMASI
			$kirimkonfirmasi="insert into outbox(DestinationNumber, TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namalengkap. Data Sekolah Asal Anda berhasil diperbaharui. Terimakasih','SPSB')";
			mysql_query($kirimkonfirmasi);
			*/
			echo"<script>alert('PERUBAHAN DATA BERHASIL');document.location.href='?mnu=fasalsekolahedit';</script>";
		}
		else{
			echo"<script>alert('PERUBAHAN DATA GAGAL');document.location.href='?mnu=fasalsekolahedit';</script>";
		}
	}
?>


