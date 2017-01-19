 
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
        $("#tanggallhrayah").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
	  $(document).ready(function(){
        $("#tanggallhribu").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
	  $(document).ready(function(){
        $("#tanggallhrwali").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
	  $(document).ready(function(){
        $("#tanggalmeninggalayah").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
	  $(document).ready(function(){
        $("#tanggalmeninggalibu").datepicker({
					dateFormat  : "dd/MM/yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script> 

<!--	
<script type="text/javascript" src="scripts/validation/jquery.validate.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#ftbl_calonsiswa2").validate({
		messages: {
		},
		errorPlacement: function(error, element) {
			error.appendTo(element.parent("td"));
		}
	});
})
</script>
-->

<style type="text/css">
<!--
.style3 {font-size: 12px}
.style5 {font-size: 12px; font-weight: bold; }
-->
</style>

<div id='comments'>
<h2>Data Orangtua dan Wali Calon Siswa</h2>
	<ul class='commentlist'>
		<li class='comment_odd'>
			&diams; Isilah Data Orangtua atau Wali dibawah ini sesuai dengan data asli <br />
			&diams; Jika Anda tidak memiliki seorang wali, maka Data mengenai wali tidak perlu diisi <br />
			&diams; Perhatikan seluruh inputan yang anda masukan disini <br />
<!--			&diams; Sistem tidak bisa menyimpan apabila ada masukan yang belum dientri <br /> -->
		</li>
				
</ul></div>

 <form action="" method="post" enctype="multipart/form-data" name="ftbl_calonsiswa" id="ftbl_calonsiswa2">

  <table width="494">
    <tr>
      <td colspan="2" class="style3"><strong>KETERANGAN TENTANG AYAH KANDUNG </strong></td>
    </tr>
    <tr>
      <td width="186"><div align="right" class="style3">
          <div align="right">Nama Ayah: </div>
      </div></td>
      <td width="296"><input name="namaayah" type="text" id="namaayah" size="40" value="<?php echo $namaayah;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Tempat Tanggal Lahir: </div>
      </div></td>
      <td class="style3"><input name="tempatlhrayah" type="text" id="tempatlhrayah" value="<?php echo $tempatlhrayah;?>" class="required" title="harus diisi" />
          <input name="tanggallhrayah" type="text" id="tanggallhrayah" size="10" value="<?php echo $tanggallhrayah;?>" class="required" title="harus diisi" />
        dd/MM/yyyy</td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Agama:</div>
      </div></td>
      <td class="style3">
        <select name="agamaidayah" id="agamaidayah" class="required" title="harus diisi">
          <option value="<?php echo $agamaidayah;?>"><?php echo $agamaidayah;?></option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Kong Hu Chu">Kong Hu Chu</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kewarganegaraan Ayah:</div>
      </div></td>
      <td class="style3">
        <select name="kewarganegidayah" id="kewarganegidayah" class="required" title="harus diisi">
          <option value="<?php echo $kewarganegidayah;?>"><?php echo $kewarganegidayah;?></option>
          <option value="Warga Negeri Indonesia">Warga Negeri Indonesia</option>
          <option value="Warga Negeri Asing">Warga Negeri Asing</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Alamat:</div>
      </div></td>
      <td class="style3">
        <textarea name="alamatayah" cols="40" id="alamatayah" class="required" title="harus diisi"><?php echo $alamatayah;?></textarea>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kota / Kabupaten: </div>
      </div></td>
      <td><input name="kotaayah" type="text" id="kotaayah" size="40" value="<?php echo $kotaayah;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kecamatan: </div>
      </div></td>
      <td><input name="kecamatanayah" type="text" id="kecamatanayah" size="40" value="<?php echo $kecamatanayah;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kelurahan: </div>
      </div></td>
      <td><input name="kelurahanayah" type="text" id="kelurahanayah" size="40" value="<?php echo $kelurahanayah;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kode Pos: </div>
      </div></td>
      <td><input name="kodeposayah" type="text" id="kodeposayah" size="5" value="<?php echo $kodeposayah;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Nomor Telepon Ayah: </div>
      </div></td>
      <td><input name="notelponayah" type="text" id="notelponayah" size="15" value="<?php echo $notelponayah;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Pendidikan Ayah: </div>
      </div></td>
      <td class="style3">
        <select name="pendidikanidayah" id="pendidikanidayah" class="required" title="harus diisi">
          <option value="<?php echo $pendidikanidayah;?>"><?php echo $pendidikanidayah;?></option>
		  <option value="SD/MI/Sederajat"> SD/MI/Sederajat </option>
		  <option value="SMP/MTs/Sederajat"> SMP/MTs/Sederajat </option>
		  <option value="SMA/MA/Sederajat"> SMA/MA/Sederajat </option>
		  <option value="D3/Sederajat"> D3/Sederajat </option>
          <option value="S1/Sederajat">S1/Sederajat</option>
          <option value="S2/Sederajat">S2/Sederajat</option>
          <option value="S3/Sederajat">S3/Sederajat</option>
          <option value="Tidak Sekolah"> Tidak Sekolah </option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Pekerjaan Ayah: </div>
      </div></td>
      <td class="style3">
        <select name="pekerjaanidayah" id="pekerjaanidayah" class="required" title="harus diisi">
          <option value="<?php echo $pekerjaanidayah;?>"><?php echo $pekerjaanidayah;?></option>
          <option value="PNS">PNS</option>
          <option value="Karyawan Swasta">Karyawan Swasta</option>
          <option value="Wiraswasta">Wiraswasta</option>
          <option value="Profesional">Profesional</option>
          <option value="Pensiunan">Pensiunan</option>
          <option value="TNI/POLRI">TNI/POLRI</option>
          <option value="Nelayan">Nelayan</option>
          <option value="Petani">Petani</option>
          <option value="Buruh tidak Tetap">Buruh tidak Tetap</option>
          <option value="Sopir">Sopir</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tingkat Jabatan: </div></td>
      <td class="style3">
        <select name="tingkatjabatanidayah" id="tingkatjabatanidayah" class="required" title="harus diisi">
          <option value="<?php echo $tingkatjabatanidayah;?>"><?php echo $tingkatjabatanidayah;?></option>
          <option value="Buruh Staf">Buruh Staf</option>
          <option value="Supervisor">Supervisor</option>
          <option value="Middle Manager">Middle Manager</option>
          <option value="Top Manager">Top Manager</option>
          <option value="Pemilik Perusahaan">Pemilik Perusahaan</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Penghasilan Per Bulan: </div>
      </div></td>
      <td class="style3">
        <select name="penghasilanidayah" id="penghasilanidayah" class="required" title="harus diisi">
          <option value="<?php echo $penghasilanidayah;?>"><?php echo $penghasilanidayah;?></option>
          <option value="Dibawah Rp.500.000">Dibawah Rp.500.000</option>
          <option value="Rp.500.000 s.d Rp.1.000.000">Rp.500.000 s.d Rp.1.000.000</option>
          <option value="Rp.1.000.000 s.d Rp.2.000.000">Rp.1.000.000 s.d Rp.2.000.000</option>
          <option value="Diatas Rp.2.000.000">Diatas Rp.2.000.000</option>
          <option value="Tidak Tetap">Tidak Tetap</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Keadaan Ayah Kandung: </div></td>
      <td>
        <select name="keadaanortuidayah" id="keadaanortuidayah" class="required" title="harus diisi">
          <option value="<?php echo $keadaanortuidayah;?>"><?php echo $keadaanortuidayah;?></option>
          <option value="Masih Hidup">Masih Hidup</option>
          <option value="Sudah Meninggal">Sudah Meninggal</option>
        </select>
      </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tanggal Meninggal: </div></td>
      <td>
        <input name="tanggalmeninggalayah" type="text" id="tanggalmeninggalayah" size="10" value="<?php echo $tanggalmeninggalayah;?>" />
      </td>
    </tr>
    <tr>
      <td colspan="2"><span class="style5">KETERANGAN TENTANG IBU KANDUNG </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Nama Ibu: </div>
      </div></td>
      <td><input name="namaibu" type="text" id="namaibu" size="40" value="<?php echo $namaibu;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Tempat Tanggal Lahir: </div>
      </div></td>
      <td class="style3"><input name="tempatlhribu" type="text" id="tempatlhribu" value="<?php echo $tempatlhribu;?>" class="required" title="harus diisi" />
          <input name="tanggallhribu" type="text" id="tanggallhribu" size="10" value="<?php echo $tanggallhribu;?>" class="required" title="harus diisi" />
        dd/MM/yyyy</td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Agama:</div>
      </div></td>
      <td class="style3">
        <select name="agamaidibu" id="agamaidibu" class="required" title="harus diisi">
          <option value="<?php echo $agamaidibu;?>"><?php echo $agamaidibu;?></option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Kong Hu Chu">Kong Hu Chu</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kewarganegaraan Ibu: </div>
      </div></td>
      <td class="style3">
        <select name="kewarganegidibu" id="kewarganegidibu" class="required" title="harus diisi">
          <option value="<?php echo $kewarganegidibu;?>"><?php echo $kewarganegidibu;?></option>
          <option value="Warga Negeri Indonesia">Warga Negeri Indonesia</option>
          <option value="Warga Negeri Asing">Warga Negeri Asing</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Alamat:</div>
      </div></td>
      <td class="style3">
        <textarea name="alamatibu" cols="40" id="alamatibu" class="required" title="harus diisi"><?php echo $alamatibu;?></textarea>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kota / Kabupaten: </div>
      </div></td>
      <td><input name="kotaibu" type="text" id="kotaibu" size="40" value="<?php echo $kotaibu;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kecamatan: </div>
      </div></td>
      <td><input name="kecamatanibu" type="text" id="kecamatanibu" size="40" value="<?php echo $kecamatanibu;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kelurahan: </div>
      </div></td>
      <td><input name="kelurahanibu" type="text" id="kelurahanibu" size="40" value="<?php echo $kelurahanibu;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kode Pos: </div>
      </div></td>
      <td><input name="kodeposibu" type="text" id="kodeposibu" size="5" value="<?php echo $kodeposibu;?>" class="required" title="harus diisi" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Nomor Telepon Ibu: </div>
      </div></td>
      <td><input name="notelponibu" type="text" id="notelponibu" size="15" value="<?php echo $notelponibu;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Pendidikan Ibu: </div>
      </div></td>
      <td class="style3">
        <select name="pendidikanidibu" id="pendidikanidibu" class="required" title="harus diisi">
          <option value="<?php echo $pendidikanidibu;?>"><?php echo $pendidikanidibu;?></option>
          <option value="SD/MI/Sederajat"> SD/MI/Sederajat </option>
		  <option value="SMP/MTs/Sederajat"> SMP/MTs/Sederajat </option>
		  <option value="SMA/MA/Sederajat"> SMA/MA/Sederajat </option>
		  <option value="D3/Sederajat"> D3/Sederajat </option>
          <option value="S1/Sederajat">S1/Sederajat</option>
          <option value="S2/Sederajat">S2/Sederajat</option>
          <option value="S3/Sederajat">S3/Sederajat</option>
          <option value="Tidak Sekolah"> Tidak Sekolah </option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Pekerjaan Ibu: </div>
      </div></td>
      <td class="style3">
        <select name="pekerjaanidibu" id="pekerjaanidibu" class="required" title="harus diisi">
          <option value="<?php echo $pekerjaanidibu;?>"><?php echo $pekerjaanidibu;?></option>
          <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
          <option value="PNS">PNS</option>
          <option value="Karyawan Swasta">Karyawan Swasta</option>
          <option value="Wiraswasta">Wiraswasta</option>
          <option value="Profesional">Profesional</option>
          <option value="Pensiunan">Pensiunan</option>
          <option value="TNI/POLRI">TNI/POLRI</option>
          <option value="Nelayan">Nelayan</option>
          <option value="Petani">Petani</option>
          <option value="Buruh tidak Tetap">Buruh tidak Tetap</option>
          <option value="Sopir">Sopir</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tingkat Jabatan: </div></td>
      <td class="style3">
        <select name="tingkatjabatanidibu" id="tingkatjabatanidibu" class="required" title="harus diisi">
          <option value="<?php echo $tingkatjabatanidibu;?>"><?php echo $tingkatjabatanidibu;?></option>
          <option value="Istri">Istri</option>
          <option value="Buruh Staf">Buruh Staf</option>
          <option value="Supervisor">Supervisor</option>
          <option value="Middle Manager">Middle Manager</option>
          <option value="Top Manager">Top Manager</option>
          <option value="Pemilik Perusahaan">Pemilik Perusahaan</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Penghasilan Per Bulan: </div>
      </div></td>
      <td class="style3">
        <select name="penghasilanidibu" id="penghasilanidibu" class="required" title="harus diisi">
          <option value="<?php echo $penghasilanidibu;?>"><?php echo $penghasilanidibu;?></option>
          <option value="Dibawah Rp.500.000">Dibawah Rp.500.000</option>
          <option value="Rp.500.000 s.d Rp.1.000.000">Rp.500.000 s.d Rp.1.000.000</option>
          <option value="Rp.1.000.000 s.d Rp.2.000.000">Rp.1.000.000 s.d Rp.2.000.000</option>
          <option value="Diatas Rp.2.000.000">Diatas Rp.2.000.000</option>
          <option value="Tidak Tetap">Tidak Tetap</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Keadaan Ibu: </div></td>
      <td class="style3">
        <select name="keadaanortuidibu" id="keadaanortuidibu" class="required" title="harus diisi">
          <option value="<?php echo $keadaanortuidibu;?>"><?php echo $keadaanortuidibu;?></option>
          <option value="Masih Hidup">Masih Hidup</option>
          <option value="Sudah Meninggal">Sudah Meninggal</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tanggal Meninggal: </div></td>
      <td class="style3"><input name="tanggalmeninggalibu" type="text" id="tanggalmeninggalibu" size="10" value="<?php echo $tanggalmeninggalibu;?>" /></td>
    </tr>
    <tr>
      <td colspan="2" class="style5">KETERANGAN TENTANG WALI CALON SISWA </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Nama Wali: </div>
      </div></td>
      <td><input name="namawali" type="text" id="namawali" size="40" value="<?php echo $namawali;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Tempat Tanggal Lahir: </div>
      </div></td>
      <td class="style3"><input name="tempatlhrwali" type="text" id="tempatlhrwali" value="<?php echo $tempatlhrwali;?>" />
          <input name="tanggallhrwali" type="text" id="tanggallhrwali" size="10" value="<?php echo $tanggallhrwali;?>" />
        dd/MM/yyyy</td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Agama:</div>
      </div></td>
      <td class="style3">
        <select name="agamaidwali" id="agamaidwali">
          <option value="<?php echo $agamaidwali;?>"><?php echo $agamaidwali;?></option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Hindu">Hindu</option>
          <option value="Budha">Budha</option>
          <option value="Kong Hu Chu">Kong Hu Chu</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kewarganegaraan Wali:</div>
      </div></td>
      <td class="style3">
        <select name="kewarganegidwali" id="kewarganegidwali">
          <option value="<?php echo $kewarganegidwali;?>"><?php echo $kewarganegidwali;?></option>
          <option value="Warga Negeri Indonesia">Warga Negeri Indonesia</option>
          <option value="Warga Negeri Asing">Warga Negeri Asing</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Alamat:</div>
      </div></td>
      <td class="style3">
        <textarea name="alamatwali" cols="40" id="alamatwali"><?php echo $alamatwali;?></textarea>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kota / Kabupaten: </div>
      </div></td>
      <td><input name="kotawali" type="text" id="kotawali" size="40" value="<?php echo $kotawali;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kecamatan: </div>
      </div></td>
      <td><input name="kecamatanwali" type="text" id="kecamatanwali" size="40" value="<?php echo $kecamatanwali;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kelurahan: </div>
      </div></td>
      <td><input name="kelurahanwali" type="text" id="kelurahanwali" size="40" value="<?php echo $kelurahanwali;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Kode Pos: </div>
      </div></td>
      <td><input name="kodeposwali" type="text" id="kodeposwali" size="5" value="<?php echo $kodeposwali;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Nomor Telepon Wali: </div>
      </div></td>
      <td><input name="notelponwali" type="text" id="notelponwali" size="15" value="<?php echo $notelponwali;?>" /></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Pendidikan Wali: </div>
      </div></td>
      <td class="style3">
        <select name="pendidikanidwali" id="pendidikanidwali">
          <option value="<?php echo $pendidikanidwali;?>"><?php echo $pendidikanidwali;?></option>
          <option value="SD/MI/Sederajat"> SD/MI/Sederajat </option>
		  <option value="SMP/MTs/Sederajat"> SMP/MTs/Sederajat </option>
		  <option value="SMA/MA/Sederajat"> SMA/MA/Sederajat </option>
		  <option value="D3/Sederajat"> D3/Sederajat </option>
          <option value="S1/Sederajat">S1/Sederajat</option>
          <option value="S2/Sederajat">S2/Sederajat</option>
          <option value="S3/Sederajat">S3/Sederajat</option>
          <option value="Tidak Sekolah"> Tidak Sekolah </option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Pekerjaan Wali: </div>
      </div></td>
      <td class="style3">
        <select name="pekerjaanidwali" id="pekerjaanidwali">
          <option value="<?php echo $pekerjaanidwali;?>"><?php echo $pekerjaanidwali;?></option>
          <option value="PNS">PNS</option>
          <option value="Karyawan Swasta">Karyawan Swasta</option>
          <option value="Wiraswasta">Wiraswasta</option>
          <option value="Profesional">Profesional</option>
          <option value="Pensiunan">Pensiunan</option>
          <option value="TNI/POLRI">TNI/POLRI</option>
          <option value="Nelayan">Nelayan</option>
          <option value="Petani">Petani</option>
          <option value="Buruh tidak Tetap">Buruh tidak Tetap</option>
          <option value="Sopir">Sopir</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Tingkat Jabatan: </div></td>
      <td class="style3">
        <select name="tingkatjabatanidwali" id="tingkatjabatanidwali">
          <option value="<?php echo $tingkatjabatanidwali;?>"><?php echo $tingkatjabatanidwali;?></option>
          <option value="Buruh Staf">Buruh Staf</option>
          <option value="Supervisor">Supervisor</option>
          <option value="Middle Manager">Middle Manager</option>
          <option value="Top Manager">Top Manager</option>
          <option value="Pemilik Perusahaan">Pemilik Perusahaan</option>
          <option value="Lainnya">Lainnya</option>
        </select>
       </td>
    </tr>
    <tr>
      <td><div align="right" class="style3">
          <div align="right">Penghasilan Wali: </div>
      </div></td>
      <td class="style3">
        <select name="penghasilanidwali" id="penghasilanidwali">
          <option value="<?php echo $penghasilanidwali;?>"><?php echo $penghasilanidwali;?></option>
          <option value="Dibawah Rp.500.000">Dibawah Rp.500.000</option>
          <option value="Rp.500.000 s.d Rp.1.000.000">Rp.500.000 s.d Rp.1.000.000</option>
          <option value="Rp.1.000.000 s.d Rp.2.000.000">Rp.1.000.000 s.d Rp.2.000.000</option>
          <option value="Diatas Rp.2.000.000">Diatas Rp.2.000.000</option>
          <option value="Tidak Tetap">Tidak Tetap</option>
        </select>
       </td>
    </tr>
    <tr>
      <td height="26">&nbsp;</td>
      <td>
        <input type="submit" name="Ubah" onclick="return confirm('Update Data ?')" value="Update" />
		<input type="reset" name="Reset" value="Reset" />
      </td>
    </tr>
  </table>

</form>


	<!-- PERUBAHAN DATA -->
<?php 
	$nopendaftaran=$_SESSION["KODELOG"];
	if(isset($_POST["Ubah"])){	
		$namaayah = $_POST["namaayah"];
		$tempatlhrayah = $_POST["tempatlhrayah"];
		$tanggallhrayah=$_POST["tanggallhrayah"];
		$agamaidayah = $_POST["agamaidayah"];
		$kewarganegidayah = $_POST["kewarganegidayah"];
		$alamatayah=$_POST["alamatayah"];
		$kotaayah=$_POST["kotaayah"];
		$kecamatanayah = $_POST["kecamatanayah"];
		$kelurahanayah = $_POST["kelurahanayah"];
		$kodeposayah = $_POST["kodeposayah"];
		$notelponayah = $_POST["notelponayah"];
		$pendidikanidayah = $_POST["pendidikanidayah"];
		$pekerjaanidayah = $_POST["pekerjaanidayah"];
		$tingkatjabatanidayah = $_POST["tingkatjabatanidayah"];
		$penghasilanidayah = $_POST["penghasilanidayah"];
		$keadaanortuidayah = $_POST["keadaanortuidayah"];
		$tanggalmeninggalayah = $_POST["tanggalmeninggalayah"];
	
		$namaibu = $_POST["namaibu"];
		$tempatlhribu = $_POST["tempatlhribu"];
		$tanggallhribu=$_POST["tanggallhribu"];
		$agamaidibu = $_POST["agamaidibu"];
		$kewarganegidibu = $_POST["kewarganegidibu"];
		$alamatibu=$_POST["alamatibu"];
		$kotaibu=$_POST["kotaibu"];
		$kecamatanibu = $_POST["kecamatanibu"];
		$kelurahanibu = $_POST["kelurahanibu"];
		$kodeposibu = $_POST["kodeposibu"];
		$notelponibu = $_POST["notelponibu"];
		$pendidikanidibu = $_POST["pendidikanidibu"];
		$pekerjaanidibu = $_POST["pekerjaanidibu"];
		$tingkatjabatanidibu = $_POST["tingkatjabatanidibu"];
		$penghasilanidibu = $_POST["penghasilanidibu"];
		$keadaanortuidibu = $_POST["keadaanortuidibu"];
		$tanggalmeninggalibu = $_POST["tanggalmeninggalibu"];
	
		$namawali = $_POST["namawali"];
		$tempatlhrwali = $_POST["tempatlhrwali"];
		$tanggallhrwali=$_POST["tanggallhrwali"];
		$agamaidwali = $_POST["agamaidwali"];
		$kewarganegidwali = $_POST["kewarganegidwali"];
		$alamatwali=$_POST["alamatwali"];
		$kotawali=$_POST["kotawali"];
		$kecamatanwali = $_POST["kecamatanwali"];
		$kelurahanwali = $_POST["kelurahanwali"];
		$kodeposwali = $_POST["kodeposwali"];
		$notelponwali = $_POST["notelponwali"];
		$pendidikanidwali = $_POST["pendidikanidwali"];
		$pekerjaanidwali = $_POST["pekerjaanidwali"];
		$tingkatjabatanidwali = $_POST["tingkatjabatanidwali"];
		$penghasilanidwali = $_POST["penghasilanidwali"];
	
		$sql="update tbl_calonsiswa set f_namaayah='$namaayah', f_tempatlhrayah='$tempatlhrayah', f_tanggallhrayah='$tanggallhrayah', f_agamaidayah='$agamaidayah', f_kewarganegidayah='$kewarganegidayah', f_alamatayah='$alamatayah', f_kotaayah='$kotaayah', f_kecamatanayah='$kecamatanayah', f_kelurahanayah='$kelurahanayah', f_kodeposayah='$kodeposayah', f_notelponayah='$notelponayah', f_pendidikanidayah='$pendidikanidayah', f_pekerjaanidayah='$pekerjaanidayah', f_tingkatjabatanidayah='$tingkatjabatanidayah', f_penghasilanidayah='$penghasilanidayah', f_keadaanortuidayah='$keadaanortuidayah', f_tanggalmeninggalayah='$tanggalmeninggalayah', f_namaibu='$namaibu', f_tempatlhribu='$tempatlhribu', f_tanggallhribu='$tanggallhribu', f_agamaidibu='$agamaidibu', f_kewarganegidibu='$kewarganegidibu', f_alamatibu='$alamatibu', f_kotaibu='$kotaibu', f_kecamatanibu='$kecamatanibu', f_kelurahanibu='$kelurahanibu', f_kodeposibu='$kodeposibu', f_notelponibu='$notelponibu', f_pendidikanidibu='$pendidikanidibu', f_pekerjaanidibu='$pekerjaanidibu', f_tingkatjabatanidibu='$tingkatjabatanidibu', f_penghasilanidibu='$penghasilanidibu', f_keadaanortuidibu='$keadaanortuidibu', f_tanggalmeninggalibu='$tanggalmeninggalibu', f_namawali='$namawali', f_tempatlhrwali='$tempatlhrwali', f_tanggallhrwali='$tanggallhrwali', f_agamaidwali='$agamaidwali', f_kewarganegidwali='$kewarganegidwali', f_alamatwali='$alamatwali', f_kotawali='$kotawali', f_kecamatanwali='$kecamatanwali', f_kelurahanwali='$kelurahanwali', f_kodeposwali='$kodeposwali', f_notelponwali='$notelponwali', f_pendidikanidwali='$pendidikanidwali', f_pekerjaanidwali='$pekerjaanidwali', f_tingkatjabatanidwali='$tingkatjabatanidwali', f_penghasilanidwali='$penghasilanidwali'
	where f_nopendaftaran='$nopendaftaran' ";
	
		$hasil=mysql_query($sql);
		if($hasil){
			/* /MENCARI NOMOR HP
			$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$nopendaftaran' ";
			$hasil=mysql_query($sql);
			$data=mysql_fetch_array($hasil);
			$namalengkap=$data["f_namapanggilan"];
			$nohp=$data["f_nohp"];
			//MENGIRIM KONFIRMASI
			$kirimkonfirmasi="insert into outbox(DestinationNumber, TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota: Sdr.$namalengkap. Data Orangtua atau Wali Anda berhasil diperbaharui. Terimakasih','SPSB')";
			mysql_query($kirimkonfirmasi);
			*/
			echo"<script>alert('PERUBAHAN DATA BERHASIL');document.location.href='?mnu=forangtuaedit';</script>";
		}
		else{
			echo"<script>alert('PERUBAHAN DATA GAGAL');document.location.href='?mnu=forangtuaedit';</script>";
		}
	}
?>



