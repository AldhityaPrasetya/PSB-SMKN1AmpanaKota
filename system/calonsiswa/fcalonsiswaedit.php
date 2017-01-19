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
        $("#tanggallhrsiswa").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
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

<div id='comments'>
<h2>Biodata Calon Siswa Baru</h2>
	<ul class='commentlist'>
		<li class='comment_odd'>
			&diams; Lengkapilah Data dibawah ini sesuai dengan data asli <br />
			&diams; Perhatikan seluruh inputan yang anda masukan disini <br />
<!--			&diams; Sistem tidak bisa menyimpan apabila ada masukan yang belum dientri <br /> -->
		</li>
				
</ul></div>

 <form action="" method="post" enctype="multipart/form-data" name="ftbl_calonsiswa" id="ftbl_calonsiswa">
  <table width="494">
    <tr>
      <td height="17" colspan="2"><span class="style3"><strong>PILIHAN KELAS ATAU JURUSAN </strong></span></td>
    </tr>
    <tr>
      <td width="186" height="23"><div align="right"><span class="style3">Status Pendaftaran: </span></div></td>
      <td width="296"><span class="style3">
        <label>
        <input name="statusdaftar" value="<?php echo $statusdaftar; ?>" size="10" readonly="true">
        </label>
      </span></td>
    </tr>
    <tr>
      <td height="23"><div align="right"><span class="style3">Kelas Masuk: </span></div></td>
      <td><span class="style3">
        <label>
			<input name='kelas' value="<?php echo $kelas; ?>" size="10" readonly="true">
        </label>
      </span></td>
    </tr>
    <tr>
      <td height="23"><div align="right"><span class="style3">Jurusan:</span></div></td>
      <td><span class="style3">
        <label>
       	<input name="jurusan" value="<?php 
			$sql="select * from  tbl_jurusan where f_jurusanid='$jurusanid'";
			$hasil=mysql_query($sql);
			$data=mysql_fetch_array($hasil);
			$jurusan=$data["f_jurusan"];
			echo $jurusan; 
			?>" size="40" readonly="true">
        </label>
      </span></td>
    </tr>
    <tr>
      <td height="23"><div align="right" class="style3">
        <div align="right">Tahun Masuk: </div>
      </div></td>
      <td><input name="thnmasuk" type="text" id="thnmasuk" size="10" value="<?php echo $thnmasuk; ?>" readonly="treu" /></td>
    </tr>
    <tr>
      <td colspan="2" class="style3"><strong>KETERANGAN TENTANG DIRI CALON
        
        SISWA </strong></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">NISN: </div></td>
      <td><input name="nisn" type="text" id="nisn" size="15" value="<?php echo $nisn; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nama Lengkap:</div></td>
      <td><input name="namalengkap" type="text" id="namalengkap" size="40" value="<?php echo $namalengkap; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nama Panggilan:</div></td>
      <td><input name="namapanggilan" type="text" id="namapanggilan" size="40" value="<?php echo $namapanggilan; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tempat Tanggal Lahir:</div></td>
      <td class="style3"><input name="tempatlhrsiswa" type="text" id="tempatlhrsiswa" value="<?php echo $tempatlhrsiswa; ?>" />
          <input name="tanggallhrsiswa" type="text" id="tanggallhrsiswa" size="10" value="<?php echo $tanggallhrsiswa; ?>" />
        dd/MM/yyyy</td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kelamin:</div></td>
      <td class="style3"><span class="style3">
        <select name="kelaminid" id="kelaminid">
          <option value='<?php echo $kelaminid; ?>'><?php echo $kelaminid; ?></option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>         
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Agama:</div></td>
      <td class="style3"><span class="style3">
        <select name="agamaid" id="agamaid">
          <option value="<?php echo $agamaid; ?>"><?php echo $agamaid; ?></option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Kong Hu Chu">Kong Hu Chu</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kewarganegaran:</div></td>
      <td class="style3"><span class="style3">
        <select name="kewarganegid" id="kewarganegid">
          <option value="<?php echo $kewarganegid; ?>"><?php echo $kewarganegid; ?></option>
          <option value="Warga Negeri Indonesia">Warga Negeri Indonesia</option>
          <option value="Warga Negeri Asing">Warga Negeri Asing</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Status Diri:</div></td>
      <td class="style3"><span class="style3">
        <select name="statusdiriid" id="statusdiriid">
          <option value="<?php echo $statusdiriid; ?>"><?php echo $statusdiriid; ?></option>
          <option value="Lengkap">Lengkap</option>
          <option value="Yatim">Yatim</option>
          <option value="Piatu">Piatu</option>
          <option value="Yatim Piatu">Yatim Piatu</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Anak Ke:</div></td>
      <td class="style3"><input name="anakke" type="text" id="anakke" size="2" value="<?php echo $anakke; ?>" />
        dari
        <input name="saudarakandung" type="text" id="saudarakandung" size="2" value="<?php echo $saudarakandung; ?>" />
        Bersaudara </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Jumlah Saudara Tiri:</div></td>
      <td><input name="saudaratiri" type="text" id="saudaratiri" size="2" value="<?php echo $saudaratiri; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Jumlah Saudara Angkat:</div></td>
      <td><input name="saudaraangkat" type="text" id="saudaraangkat" size="2" value="<?php echo $saudaraangkat; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Bahasa Sehari-hari:</div></td>
      <td class="style3"><span class="style3">
        <select name="bahasaid" id="bahasaid">
          <option value="<?php echo $bahasaid; ?>"><?php echo $bahasaid; ?></option>
          <option value="Indonesia">Indonesia</option>
          <option value="Daerah">Daerah</option>
          <option value="Asing">Asing</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td colspan="2" class="style3"><strong>KETERANGAN TEMPAT TINGGAL CALON SISWA</strong></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Alamat:</div></td>
      <td class="style3"><span class="style3">
        <textarea name="alamatsiswa" cols="40" id="alamatsiswa"><?php echo $alamatsiswa; ?></textarea>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kota / Kabupaten: </div></td>
      <td><input name="kotakabupaten" type="text" id="kotakabupaten" size="40" value="<?php echo $kotakabupaten; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kecamatan: </div></td>
      <td><input name="kecamatan" type="text" id="kecamatan" size="40" value="<?php echo $kecamatan; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kelurahan: </div></td>
      <td><input name="kelurahan" type="text" id="kelurahan" size="40" value="<?php echo $kelurahan; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kode Pos: </div></td>
      <td><input name="kodepos" type="text" id="kodepos" size="5" value="<?php echo $kodepos; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nomor Telepon: </div></td>
      <td><input name="notelpon" type="text" id="notelpon" size="15" value="<?php echo $notelpon; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Nomor Handphone: </div></td>
      <td class="style3"><input name="nohp" type="text" id="nohp" size="15" value="<?php echo $nohp; ?>" />
        Kami akan mengirim informasi via sms, <span class="style4">isi nomor Hp yang aktif</span> jika ingin menggunakan fasilitas ini. </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Bertempat Tinggal di: </div></td>
      <td class="style3"><span class="style3">
        <select name="tempattinggalid" id="tempattinggalid">
          <option value="<?php echo $tempattinggalid; ?>"><?php echo $tempattinggalid; ?></option>
          <option value="Rumah Orang Tua">Rumah Orang Tua</option>
          <option value="Rumah Saudara">Rumah Saudara</option>
          <option value="Rumah Wali">Rumah Wali</option>
          <option value="Asrama">Asrama</option>
          <option value="Kost">Kost</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Jarak Rumah ke Sekolah: </div></td>
      <td><span class="style3">
        <input name="jarakrumah" type="text" id="jarakrumah" size="2" value="<?php echo $jarakrumah; ?>" />
          Km</span></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Transportasi:</div></td>
      <td class="style3"><span class="style3">
        <select name="transportasiid" id="transportasiid">
          <option value="<?php echo $transportasiid; ?>"><?php echo $transportasiid; ?></option>
          <option value="Jalan Kaki">Jalan Kaki</option>
          <option value="Kendaraan Umum">Kendaraan Umum</option>
          <option value="Kendaraan Pribadi">Kendaraan Pribadi</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td colspan="2" class="style3"><strong>KETERANGAN KESEHATAN CALON SISWA </strong></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Golongan Darah: </div></td>
      <td class="style3"><span class="style3">
        <select name="golongandarahid" id="golongandarahid">
          <option value="<?php echo $golongandarahid; ?>"><?php echo $golongandarahid; ?></option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="AB">AB</option>
          <option value="O">O</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Penyakit yang  diderita: </div></td>
      <td><input name="penyakitygdiderita" type="text" id="penyakitygdiderita" size="40" value="<?php echo $penyakitygdiderita; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kelainan Jasmani: </div></td>
      <td><input name="kelainanjasmani" type="text" id="kelainanjasmani" size="40" value="<?php echo $kelainanjasmani; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tinggi dan Berat Badan: </div></td>
      <td class="style3"><input name="tinggibadan" type="text" id="tinggibadan" size="2" value="<?php echo $tinggibadan; ?>" />
        cm.
        <input name="beratbadan" type="text" id="beratbadan" size="2" value="<?php echo $beratbadan; ?>" />
        kg.</td>
    </tr>
    <tr>
      <td colspan="2"><span class="style3"><strong>KETERANGAN KEGEMARAN CALON SISWA </strong></span></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Olah Raga: </div></td>
      <td class="style3"><span class="style3">
        <select name="olahragaid" id="olahragaid">
          <option value="<?php echo $olahragaid; ?>"><?php echo $olahragaid; ?></option>
          <option value="Football">Football</option>
          <option value="Volley Ball">Volley Ball</option>
          <option value="Basket Ball">Basket Ball</option>
          <option value="Badminton">Badminton</option>
          <option value="Lainnya">Lainnya</option>
       </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Kesenian:</div></td>
      <td class="style3"><span class="style3">
        <select name="kesenianid" id="kesenianid">
          <option value="<?php echo $kesenianid; ?>"><?php echo $kesenianid; ?></option>
          <option value="Seni Musik">Seni Musik</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Seni Teater">Seni Teater</option>
          <option value="Seni Suara">Seni Suara</option>
          <option value="Seni Tari">Seni Tari</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Organisasi</div></td>
      <td class="style3"><span class="style3">
        <select name="organisasiid" id="organisasiid">
          <option value="<?php echo $organisasiid; ?>"><?php echo $organisasiid; ?></option>
          <option value="OSIS">OSIS</option>
          <option value="Org. Ekstra Sekolah">Org. Ekstra Sekolah</option>
          <option value="Koprasi">Koprasi</option>
          <option value="PMR">PMR</option>
          <option value="Paskibra">Paskibra</option>
          <option value="Pramuka">Pramuka</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </span> </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Prestasi yang Diraih: </div></td>
      <td class="style3"><input name="prestasiygdiraih" type="text" id="prestasiygdiraih" size="40" value="<?php echo $prestasiygdiraih; ?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Prestasi Akademik: </div></td>
      <td class="style3"><input name="prestasibidangakademis" type="text" id="prestasibidangakademis" size="40" value="<?php echo $prestasibidangakademis; ?>" /></td>
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


	<!-- UPDATE DATA -->
<?php  		
	if(isset($_POST["Ubah"])){
		$nopendaftaran=$_SESSION["KODELOG"];
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
	//	$tanggaldaftar=$_POST["tanggaldaftar"];
		$thnmasuk=$_POST["thnmasuk"];
	//	$password=$_POST["passwrod"];
		
		$sql="update tbl_calonsiswa set f_nisn='$nisn', f_namalengkap='$namalengkap', f_namapanggilan='$namapanggilan', f_tempatlhrsiswa='$tempatlhrsiswa', f_tanggallhrsiswa='$tanggallhrsiswa', f_kelamin='$kelaminid', f_agama='$agamaid', f_kewarganeg='$kewarganegid', f_statusdiri='$statusdiriid', f_anakke='$anakke', f_saudarakandung='$saudarakandung', f_saudaratiri='$saudaratiri', f_saudaraangkat='$saudaraangkat', f_bahasa='$bahasaid', f_alamatsiswa='$alamatsiswa', f_kotakabupaten='$kotakabupaten', f_kecamatan='$kecamatan', f_kelurahan='$kelurahan', f_kodepos='$kodepos', f_notelpon='$notelpon', f_nohp='$nohp', f_tempattinggal='$tempattinggalid', f_jarakrumah='$jarakrumah', f_transportasi='$transportasiid', f_golongandarah='$golongandarahid', f_penyakitygdiderita='$penyakitygdiderita', f_kelainanjasmani='$kelainanjasmani', f_tinggibadan='$tinggibadan', f_beratbadan='$beratbadan', f_olahraga='$olahragaid', f_kesenian='$kesenianid', f_organisasi='$organisasiid', f_prestasiygdiraih='$prestasiygdiraih', f_prestasibidangakademis='$prestasibidangakademis' where f_nopendaftaran='$nopendaftaran' ";
	
		$hasil=mysql_query($sql);
		if($hasil){
			/*/MENGIRIM KONFIRMASI
			$kirimkonfirmasi="insert into outbox(DestinationNumber, TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namapanggilan. Biodata Anda berhasil diperbaharui. Terimakasih','SPSB')";
			mysql_query($kirimkonfirmasi);	
				*/
			echo"<script>alert('PERUBAHAN DATA BERHASIL');document.location.href='?mnu=fcalonsiswaedit';</script>";
		}
		else{
			echo"<script>alert('PERUBAHAN DATA GAGAL');document.location.href='?mnu=fcalonsiswaedit';</script>";
		}
	}
?>
