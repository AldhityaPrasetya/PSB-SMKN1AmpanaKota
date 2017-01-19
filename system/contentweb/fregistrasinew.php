<!-- 
<?php
$PATHJAVASCRIPT="scripts";
?>

<link type="text/css" href="<?php echo "$PATHJAVASCRIPT/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATHJAVASCRIPT/";?>ui/i18n/ui.datepicker-id.js"></script>    
	<script type="text/javascript">
$(document).ready(function() {
		 $("#tanggallhrsiswa").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
})
</script>
-->
<!-- form validation -->
<script type="text/javascript" src="scripts/validation/jquery-1.2.3.pack.js"></script>
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#ftbl_calonsiswa").validate({
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
.style3 {font-size: 12px}
-->
</style>

<style type="text/css">
<!--
.style4 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>


<?php 
	//LOAD DATA PMB SETUP
	$sql212="select * from  tbl_psbsetup ";
	$hasil212=mysql_query($sql212);
	$data212=mysql_fetch_array($hasil212);
		$angkatanpsb = $data212["f_angkatanpsb"];
		$semester = $data212["f_semester"];
		$ketuapanitia=$data212["f_ketuapanitia"];
		$hargaformulir = $data212["f_hargaformulir"];

	//PEMBERSIHAN DATA DARI INPUTAN
	$nopendaftaran ="";
	$nisn ="";
	$namalengkap="";
	$namapanggilan ="";
	$tempatlhrsiswa ="";
	$tanggallhrsiswa="";
	$kelaminid="";
	$agamaid ="";
	$kewarganegid ="";
	$statusdiriid ="";
	$anakke ="";
	$saudarakandung ="";
	$saudaratiri ="";
	$saudaraangkat ="";
	$bahasaid ="";
	$alamatsiswa ="";
	$kotakabupaten ="";
	$kecamatan ="";
	$kelurahan ="";
	$kodepos="";
	$notelpon ="";
	$nohp ="";
	$tempattinggalid="";
	$jarakrumah="";
	$transportasiid ="";
	$golongandarahid ="";
	$penyakitygdiderita ="";
	$kelainanjasmani ="";
	$tinggibadan ="";
	$beratbadan ="";
	$olahragaid ="";
	$kesenianid ="";
	$organisasiid ="";
	$prestasiygdiraih ="";
	$prestasibidangakademis ="";
	
	$statusdaftar="";
	$kelas="";
	$jurusanid="";
//	$tanggaldaftar=$_POST["tanggaldaftar"];
//	$thnmasuk="";
//	$password=$_POST["passwrod"];

//NGETES AJAH

?>

<h2>Formulir Isian Pendaftaran Calon Siswa Baru</h2>
 <form action="" method="post" enctype="multipart/form-data" name="ftbl_calonsiswa" id="ftbl_calonsiswa" >
  <table width="494">
    <tr>
      <td height="17" colspan="2"><span class="style3"><strong>PILIHAN KELAS ATAU JURUSAN </strong></span></td>
    </tr>
    <tr>
      <td width="186" height="23"><div align="right"><span class="style3">Status Pendaftaran: </span></div></td>
      <td width="296">        
        <select name="statusdaftar" class="required" title="harus diisi">
          <option value="">- Pilih Status Daftar -</option>
          <option value="BARU">Daftar Baru</option>
          <option value="PINDAHAN">Daftar Pindahan</option>
        </select>        
      </td>
    </tr>
    <tr>
<!-- 	<?php 	$statusdaftar1=$_POST[statusdaftar]; ?><input name="stsdaftar" type="text" value="<?php echo $statusdaftar1;?>" /> -->
      <td height="23"><div align="right"><span class="style3">Kelas Masuk: </span></div></td>
      <td>        
        <select name="kelas" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
		 <?php
		$perintah="select * from tbl_kelas ";//where f_key %like% '$statusdaftar1' ";
		$lihat=mysql_query($perintah);
		while ($data=mysql_fetch_array($lihat)){
			$kelas=$data["f_kelas"];
			echo" <option value='$kelas'>$kelas</option>";
		}
		?>
		</select>        
      </td>
    </tr>
    <tr>
      <td height="23"><div align="right"><span class="style3">Jurusan:</span></div></td>
      <td>        
        <select name="jurusanid" class="required" title="harus diisi">
          <option value="">- Pilih Jurusan -</option>
          <?php
		$perintah="select * from tbl_jurusan ";
		$lihat=mysql_query($perintah);
		while ($data=mysql_fetch_array($lihat)){
			$jurusanid=$data["f_jurusanid"];
			$jurusan=$data["f_jurusan"];
			echo" <option value='$jurusanid'>$jurusan</option>";}
		?>
        </select>        
      </td>
    </tr>
    <tr>
      <td height="23"><div align="right" class="style3">
        <div align="right">Tahun Masuk: </div>
      </div></td>
      <td><input name="thnmasuk" type="text" id="thnmasuk" size="10" value="<?php echo $angkatanpsb;?>" readonly="true" /></td>
    </tr>
    <tr>
      <td colspan="2" class="style3"><strong>KETERANGAN TENTANG DIRI CALON
        
        SISWA </strong></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">NISN: </div></td>
      <td><input name="nisn" type="text" id="nisn" size="15" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nama Lengkap:</div></td>
      <td><input name="namalengkap" type="text" id="namalengkap" size="40" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nama Panggilan:</div></td>
      <td><input name="namapanggilan" type="text" id="namapanggilan" size="40" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tempat Tanggal Lahir:</div></td>
      <td class="style3"><input name="tempatlhrsiswa" type="text" id="tempatlhrsiswa" class="required" title="harus diisi" />
          <input name="tanggallhrsiswa" type="text" id="tanggallhrsiswa" size="10" class="required" title=" "  />
        dd/MM/yyyy</td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kelamin:</div></td>
      <td class="style3">
        <select name="kelaminid" id="kelaminid" class="required" title="harus diisi">
          <option value=''>- Pilih -</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>         
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Agama:</div></td>
      <td class="style3">
        <select name="agamaid" id="agamaid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="Islam">Islam</option>
          <option value="Katholik">Katholik</option>
          <option value="Hindu">Hindu</option>
          <option value="Protestan">Protestan</option>
          <option value="Budha">Budha</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kewarga Negaran:</div></td>
      <td class="style3">
        <select name="kewarganegid" id="kewarganegid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="WNI">WNI</option>
          <option value="WNA">WNA</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Status Diri:</div></td>
      <td class="style3">
        <select name="statusdiriid" id="statusdiriid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="Lengkap">Lengkap</option>
          <option value="Yatim">Yatim</option>
          <option value="Piatu">Piatu</option>
          <option value="Yatim Piatu">Yatim Piatu</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Anak Ke:</div></td>
      <td class="style3"><input name="anakke" type="text" id="anakke" size="2" class="required" title="harus diisi" />
        dari
        <input name="saudarakandung" type="text" id="saudarakandung" size="2" class="required" title=" " />
        Bersaudara </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Jumlah Saudara Tiri:</div></td>
      <td><input name="saudaratiri" type="text" id="saudaratiri" size="2" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Jumlah Saudara Angkat:</div></td>
      <td><input name="saudaraangkat" type="text" id="saudaraangkat" size="2" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Bahasa Sehari-hari:</div></td>
      <td class="style3"> 
        <select name="bahasaid" id="bahasaid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="Indonesia">Indonesia</option>
          <option value="Daerah">Daerah</option>
          <option value="Asing">Asing</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="style3"><strong>KETERANGAN TEMPAT TINGGAL CALON SISWA</strong></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Alamat:</div></td>
      <td class="style3">
        <textarea name="alamatsiswa" cols="40" id="alamatsiswa" class="required" title="harus diisi"></textarea>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kota / Kabupaten: </div></td>
      <td><input name="kotakabupaten" type="text" id="kotakabupaten" size="40" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kecamatan: </div></td>
      <td><input name="kecamatan" type="text" id="kecamatan" size="40" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kelurahan: </div></td>
      <td><input name="kelurahan" type="text" id="kelurahan" size="40" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kode Pos: </div></td>
      <td><input name="kodepos" type="text" id="kodepos" size="5" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nomor Telepon: </div></td>
      <td><input name="notelpon" type="text" id="notelpon" size="15" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nomor Handphone: </div></td>
      <td class="style3"><input name="nohp" type="text" id="nohp" size="15" class="required" title="harus diisi" />
        Kami akan mengirim informasi via sms, <span class="style4">isi nomor Hp</span> jika ingin menggunakan fasilitas ini. </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Bertempat Tinggal di: </div></td>
      <td class="style3">
        <select name="tempattinggalid" id="tempattinggalid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="Rumah Orang Tua">Rumah Orang Tua</option>
          <option value="Rumah Saudara">Rumah Saudara</option>
          <option value="Rumah Wali">Rumah Wali</option>
          <option value="Asrama">Asrama</option>
          <option value="Kost">Kost</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Jarak Rumah ke Sekolah: </div></td>
      <td><span class="style3">
        <input name="jarakrumah" type="text" id="jarakrumah" size="2" class="required" title="harus diisi" />
          Km</span></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Transportasi:</div></td>
      <td class="style3">
        <select name="transportasiid" id="transportasiid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="Jalan Kaki">Jalan Kaki</option>
          <option value="Kendaraan Umum">Kendaraan Umum</option>
          <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
        </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="style3"><strong>KETERANGAN KESEHATAN CALON SISWA </strong></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Golongan Darah: </div></td>
      <td class="style3">
        <select name="golongandarahid" id="golongandarahid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="AB">AB</option>
          <option value="O">O</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Penyakit yang  diderita: </div></td>
      <td><input name="penyakitygdiderita" type="text" id="penyakitygdiderita" size="40" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kelainan Jasmani: </div></td>
      <td><input name="kelainanjasmani" type="text" id="kelainanjasmani" size="40"/></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tinggi dan Berat Badan: </div></td>
      <td class="style3"><input name="tinggibadan" type="text" id="tinggibadan" size="2" class="required" title="harus diisi" />
        cm.
        <input name="beratbadan" type="text" id="beratbadan" size="2" class="required" title=" " />
        kg.</td>
    </tr>
    <tr>
      <td colspan="2"><span class="style3"><strong>KETERANGAN KEGEMARAN CALON SISWA </strong></span></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Olah Raga: </div></td>
      <td class="style3">
        <select name="olahragaid" id="olahragaid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="Permainan">Permainan</option>
          <option value="Pikiran">Pikiran</option>
          <option value="Footsal">Footsal</option>
          <option value="Volley Ball">Volley Ball</option>
          <option value="Basket Ball">Basket Ball</option>
          <option value="Bulu Tangkis">Bulu Tangkis</option>
          <option value="Bela Diri">Bela Diri</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kesenian:</div></td>
      <td class="style3">
        <select name="kesenianid" id="kesenianid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="Seni Musik">Seni Musik</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Seni Teater">Seni Teater</option>
          <option value="Seni Suara">Seni Suara</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Seni Qiraat">Seni Qiraat</option>
          <option value="Marawis">Marawis</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Organisasi</div></td>
      <td class="style3">
        <select name="organisasiid" id="organisasiid" class="required" title="harus diisi">
          <option value="">- Pilih -</option>
          <option value="OSIS">OSIS</option>
          <option value="Org. Ekstra Sekolah">Org. Ekstra Sekolah</option>
          <option value="Koprasi">Koprasi</option>
          <option value="KIR">KIR</option>
          <option value="PMR">PMR</option>
          <option value="Paskibra">Paskibra</option>
          <option value="ROHIS">ROHIS</option>
          <option value="Pramuka">Pramuka</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Prestasi yang Diraih: </div></td>
      <td class="style3"><input name="prestasiygdiraih" type="text" id="prestasiygdiraih" size="40"  /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Prestasi Akademik: </div></td>
      <td class="style3"><input name="prestasibidangakademis" type="text" id="prestasibidangakademis" size="40" /></td>
    </tr>
    <tr>
      <td height="26">&nbsp;</td>
      <td>
        <input type="submit" name="Simpan" value="Proses Pendaftaran" />
        <input type="reset" name="Reset" value="Reset" />
      </td>
    </tr>
  </table>
</form>


<!-- SIMPAN DATA PENDAFTARAN  -->
<?php  		
if(isset($_POST["Simpan"])){	
	//KODE NOPENDAFTARAN
	$sql1="select * from tbl_calonsiswa order by f_nopendaftaran desc";
	$q=mysql_query($sql1);
	$jum=mysql_num_rows($q);
	$kd="N".date("y").date("m");
		if($jum > 0){
			$d=mysql_fetch_array($q);
			$nopendaftaran=$d["f_nopendaftaran"];
			$urut=substr($nopendaftaran,5,4)+1;
			if($urut<10){$nopendaftaran="$kd"."00".$urut;}
			else if($urut<100){$nopendaftaran="$kd"."0".$urut;}
			else{$nopendaftaran="$kd".$urut;}
		}
		else{
			$nopendaftaran="$kd"."001";
		}		
	//PASSWORD
	$password = substr(md5(uniqid('')),-5,5);
	$_SESSION['captcha_session'] = $password;
	
	$nisn = $_POST["nisn"];
	$namalengkap=$_POST["namalengkap"];
	$namapanggilan = $_POST["namapanggilan"];
	$tempatlhrsiswa = $_POST["tempatlhrsiswa"];
	$tanggallhrsiswa=$_POST["tanggallhrsiswa"];
	$kelaminid=$_POST["kelaminid"];
	$agamaid = $_POST["agamaid"];
	$kewarganegid = $_POST["kewarganegid"];
	$statusdiriid = $_POST["statusdiriid"];
	$anakke = $_POST["anakke"];
	$saudarakandung = $_POST["saudarakandung"];
	$saudaratiri = $_POST["saudaratiri"];
	$saudaraangkat = $_POST["saudaraangkat"];
	$bahasaid = $_POST["bahasaid"];
	$alamatsiswa = $_POST["alamatsiswa"];
	$kotakabupaten = $_POST["kotakabupaten"];
	$kecamatan = $_POST["kecamatan"];
	$kelurahan = $_POST["kelurahan"];
	$kodepos=$_POST["kodepos"];
	$notelpon = $_POST["notelpon"];
	$nohp = $_POST["nohp"];
	$tempattinggalid=$_POST["tempattinggalid"];
	$jarakrumah=$_POST["jarakrumah"];
	$transportasiid = $_POST["transportasiid"];
	$golongandarahid = $_POST["golongandarahid"];
	$penyakitygdiderita = $_POST["penyakitygdiderita"];
	$kelainanjasmani = $_POST["kelainanjasmani"];
	$tinggibadan = $_POST["tinggibadan"];
	$beratbadan = $_POST["beratbadan"];
	$olahragaid = $_POST["olahragaid"];
	$kesenianid = $_POST["kesenianid"];
	$organisasiid = $_POST["organisasiid"];
	$prestasiygdiraih = $_POST["prestasiygdiraih"];
	$prestasibidangakademis = $_POST["prestasibidangakademis"];	
	$statusdaftar=$_POST["statusdaftar"];
	$kelas=$_POST["kelas"];
	$jurusanid=$_POST["jurusanid"];
	$thnmasuk=$_POST["thnmasuk"];	
	$sql="insert into tbl_calonsiswa(f_nopendaftaran, f_nisn, f_namalengkap, f_namapanggilan, f_tempatlhrsiswa, f_tanggallhrsiswa, f_kelamin, f_agama, f_kewarganeg, f_statusdiri, f_anakke, f_saudarakandung, f_saudaratiri, f_saudaraangkat, f_bahasa, f_alamatsiswa, f_kotakabupaten, f_kecamatan, f_kelurahan, f_kodepos, f_notelpon, f_nohp, f_tempattinggal, f_jarakrumah, f_transportasi, f_golongandarah, f_penyakitygdiderita, f_kelainanjasmani, f_tinggibadan, f_beratbadan, f_olahraga, f_kesenian, f_organisasi, f_prestasiygdiraih, f_prestasibidangakademis,  f_statusdaftar,f_kelas,f_jurusanid,f_tanggaldaftar,f_thnmasuk,f_password,f_biayaform,f_tglbeliform) 
	values('$nopendaftaran', '$nisn', '$namalengkap', '$namapanggilan', '$tempatlhrsiswa', '$tanggallhrsiswa', '$kelaminid', '$agamaid', '$kewarganegid', '$statusdiriid', '$anakke', '$saudarakandung', '$saudaratiri', '$saudaraangkat', '$bahasaid', '$alamatsiswa', '$kotakabupaten', '$kecamatan', '$kelurahan', '$kodepos', '$notelpon', '$nohp', '$tempattinggalid', '$jarakrumah', '$transportasiid', '$golongandarahid', '$penyakitygdiderita', '$kelainanjasmani', '$tinggibadan', '$beratbadan', '$olahragaid', '$kesenianid', '$organisasiid', '$prestasiygdiraih', '$prestasibidangakademis',  '$statusdaftar','$kelas','$jurusanid',sysdate(),'$thnmasuk','$password','$hargaformulir',sysdate()) ";
		$hasil=mysql_query($sql);
	if($hasil){
		//MENGIRIM SMS KONFIRMASI
		$kirimkonfirmasi="insert into outbox(DestinationNumber, TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namapanggilan. Data Anda telah disimpan, silahkan login sistem dengan No.Pendaftaran: $nopendaftaran, Password: $password','SPSB')";
		mysql_query($kirimkonfirmasi);		
		echo"<script>alert('Data pendaftaran Anda telah tersimpan, silahkan tunggu sms pemberitahuan dari Sistem Kami untuk melanjutkan proses berikutnya.');document.location.href='index.php';</script>";
	}
	else{
		echo"<script>alert('Proses pendaftaran gagal, silahkan coba lagi');document.location.href='index.php';</script>";
	}
}  
?>
