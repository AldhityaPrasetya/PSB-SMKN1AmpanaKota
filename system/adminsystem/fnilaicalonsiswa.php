<?php 
	$pro="simpan";
	$YPATH="infoimages";
	$gambar0="default.jpg";
?>

<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<meta http-equiv="refresh" content="10">
<h2>NILAI CALON SISWA </h2>

<form action="" method="post">
Cari data berdasarkan:
  <select name="cariberdasarkan" id="cariberdasarkan">
    <option value="">- Pilih Pencarian -</option>
    <option value="f_namalengkap">Nama Calon Siswa</option>
    <option value="f_nopendaftaran">No.Pendaftaran</option>
	<option value="f_statusterima">Status Calon Siswa</option>
  </select>
  :
	 
  <input name="txtcari" type="text" id="txtcari" />
  <input name="cari" type="submit" id="cari" value="cari" />
</form>
	<br />
	
<table width="76%" border="1">
  <tr bgcolor="#60D6FA">
    <th width="3%" bgcolor="#333333"><span class="style2">No.</span></th>
    <th width="9%" bgcolor="#333333"><span class="style2">Pendaftaran</span></th>
    <th width="61%" bgcolor="#333333"><span class="style2">Nama Siswa</span></th>
    <th width="5%" bgcolor="#333333"><span class="style2">Ijazah</span></th>
    <th width="4%" bgcolor="#333333"><span class="style2">UAN</span></th>
    <th width="5%" bgcolor="#333333"><span class="style2">Status</span></th>
    <th width="13%" bgcolor="#333333"><span class="style2">Nilai Test</span></th>
  </tr>

<?php 
	if(isset($_POST["cari"])){
		$item=$_POST["txtcari"];
		if($_POST["cariberdasarkan"]=="f_namalengkap"){$perintah="select f_nopendaftaran,f_namalengkap,f_nilaiijazah,f_nilaiuan,f_statusterima,f_nilaitest,f_nohp from tbl_calonsiswa where f_namalengkap like '%$item%'  order by f_nopendaftaran asc ";}
		else if($_POST["cariberdasarkan"]=="f_nopendaftaran"){$perintah="select f_nopendaftaran,f_namalengkap,f_nilaiijazah,f_nilaiuan,f_statusterima,f_nilaitest,f_nohp from tbl_calonsiswa where f_nopendaftaran like '%$item%'  order by f_nopendaftaran asc ";}
		else if($_POST["cariberdasarkan"]=="f_statusterima"){$perintah="select f_nopendaftaran,f_namalengkap,f_nilaiijazah,f_nilaiuan,f_statusterima,f_nilaitest,f_nohp from tbl_calonsiswa where f_statusterima like '%$item%'  order by f_nopendaftaran asc ";}
		else{$perintah="select * from tbl_calonsiswa order by f_nopendaftaran asc";}
}


else{$perintah="select f_nopendaftaran,f_namalengkap,f_nilaiijazah,f_nilaiuan,f_statusterima,f_nilaitest,f_nohp from tbl_calonsiswa order by f_nopendaftaran asc ";}
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
	$nilaiijazah=$data["f_nilaiijazah"];
	$nilaiuan=$data["f_nilaiuan"];
	$statusterima=$data["f_statusterima"];
	$nilaitest=$data["f_nilaitest"];

	
//--------------------------------------------------------------------------------------------									
	
						
if($no %2==1){
echo"<tr bgcolor='#99FF33'>
				<td>$no</td>
				<td>$nopendaftaran</td>
				<td>$namalengkap</td>
				<center><td>$nilaiijazah</td>
				<td>$nilaiuan</td>
				<td>$statusterima</td></center>
				<td><a href='?mnu=fupdatenilaitest&pro=awal&id=$nopendaftaran'><img class='imgl' src='images/bbetul.png' />$nilaitest</a></td>
				</tr>";
				}//no==1
if($no %2==0){
echo"<tr bgcolor='#FFFF99'>
				<td>$no</td>
				<td>$nopendaftaran</td>
				<td>$namalengkap</td>
				<center><td>$nilaiijazah</td>
				<td>$nilaiuan</td>
				<td>$statusterima</td></center>
				<td><a href='?mnu=fupdatenilaitest&pro=awal&id=$nopendaftaran'><img class='imgl' src='images/bbetul.png' />$nilaitest</a></td>
				</tr>";
				}
			//$no++;
			}//while
?>
</table>

