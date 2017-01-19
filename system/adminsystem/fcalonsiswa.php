<?php 
	$pro="simpan";
	$YPATH="infoimages";
	$gambar0="default.jpg";
	if(!$_SESSION["1CLEVEL"]==""){

?>

<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<meta http-equiv="refresh" content="10">
<h2>DATA PEMBAYARAN FORMULIR </h2>

<form action="" method="post">
Cari data berdasarkan:
  <select name="cariberdasarkan" id="cariberdasarkan">
    <option value="">- Pilih Pencarian -</option>
    <option value="f_namalengkap">Nama Calon Siswa</option>
    <option value="f_nopendaftaran">No.Pendaftaran</option>
    <option value="f_jurusan">Jurusan</option>
  </select>  :
	 
  <input name="txtcari" type="text" id="txtcari" />
  <input name="cari" type="submit" id="cari" value="cari" />
</form>
	<br />
	
<table width="96%" border="1">
  <tr bgcolor="#60D6FA">
    <th width="2%" bgcolor="#333333"><span class="style2">
      No.</span></th>
    <th width="9%" bgcolor="#333333"><span class="style2">Pendaftaran</span></th>
    <th width="29%" bgcolor="#333333"><span class="style2">
      Nama Siswa</span></th>
    <th width="18%" bgcolor="#333333"><span class="style2">Tanggal Daftar</span></th>
    <th width="18%" bgcolor="#333333"><span class="style2">
      Jurusan</span></th>
    <th width="5%" bgcolor="#333333"><span class="style2">
      Biaya</span></th>
    <th width="19%" bgcolor="#333333"><span class="style2">
      Tanggal Bayar</span></th>
  </tr>

<?php 
if(isset($_POST["cari"])){
	$item=$_POST["txtcari"];
	if($_POST["cariberdasarkan"]=="f_namalengkap"){$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid and f_namalengkap like '%$item%'  order by f_nopendaftaran asc ";}
	else if($_POST["cariberdasarkan"]=="f_nopendaftaran"){$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid and f_nopendaftaran like '%$item%'  order by f_nopendaftaran asc ";}
	else if($_POST["cariberdasarkan"]=="f_jurusan"){$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid and f_jurusan like '%$item%'  order by f_nopendaftaran asc ";}
	else{$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid order by f_nopendaftaran asc ";}
}
else{$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa,tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid order by f_nopendaftaran asc ";}
$lihat=mysql_query($perintah);
if (! $lihat){die("Maaf perintah sql Anda salah...: $perintah");}
$jumlah =mysql_num_rows($lihat);
$dataPerhal = 999;
 
// apabila $_GET['hal'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.
 
if(isset($_GET['hal2'])){
    $nohal = $_GET['hal2'];
} 
else $nohal = 1;
 
// perhitungan offset
 
$offset = ($nohal - 1) * $dataPerhal;
 
	 
	$sql = $perintah."  LIMIT $offset, $dataPerhal";		   
	$lihat2 = mysql_query($sql);
	$no= $awal_record;

while ($data=mysql_fetch_array($lihat2)){
	$no=$no+1;
	$nopendaftaran=$data["f_nopendaftaran"];
	$namalengkap=$data["f_namalengkap"];
	$tanggaldaftar=$data["f_tanggaldaftar"];
	$jurusan=$data["f_jurusan"];
	$biayaform=$data["f_biayaform"];
	$tglbayarform=$data["f_tglbayarform"];

	
//--------------------------------------------------------------------------------------------									
	
						
if($no %2==1){
echo"<tr bgcolor='#99FF33'>
				<td>$no</td>
				<td>$nopendaftaran</td>
				<td>$namalengkap</td>
				<td>$tanggaldaftar</td>
				<td>$jurusan</td>
				<td>$biayaform</td>
				<td><a href='?mnu=fupdatetglbayarformulir&pro=awal&id=$nopendaftaran'><img class='imgl' src='images/bbetul.png' />$tglbayarform</a></td>
				</tr>";
				}//no==1
if($no %2==0){
echo"<tr bgcolor='#FFFF99'>
				<td>$no</td>
				<td>$nopendaftaran</td>
				<td>$namalengkap</td>
				<td>$tanggaldaftar</td>
				<td>$jurusan</td>
				<td>$biayaform</td>
				<td><a href='?mnu=fupdatetglbayarformulir&pro=awal&id=$nopendaftaran'><img class='imgl' src='images/bbetul.png' />$tglbayarform</a></td>
				</tr>";
				}
			//$no++;
			}//while
?>
</table>

<?php }?>
