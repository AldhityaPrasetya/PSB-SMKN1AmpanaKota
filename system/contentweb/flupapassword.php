<?php 
//session_start();
$pro="simpan";
//$PATH="ypathcss";
$YPATH="infoimages";
$gambar0="default.jpg";
?>

<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<h2>CARI KATA SANDI ANDA</h2>

<form action="" method="post">
  Cari Kata Sandi Berdasarkan:
	<select name="cariberdasarkan" id="cariberdasarkan">
		  <option value="">- Pilih Pencarian -</option>
		  <option value="f_namalengkap">Nama Calon Siswa</option>
		  <option value="f_nopendaftaran">No.Pendaftaran</option>
	</select>:
	 
	<input name="txtcari" type="text" id="txtcari" />
	<input name="cari" type="submit" id="cari" value="cari" />
</form>
	<br />
	
<table width="100%" border="1">
  <tr bgcolor="#60D6FA">
    <th width="5%" height="23" bgcolor="#333333"><span class="style2">No.Pend</span></th>
    <th width="42%" bgcolor="#333333"><span class="style2">Nama Siswa</span></th>
    <th width="27%" bgcolor="#333333"><span class="style2">Jurusan</span></th>
    <th width="18%" bgcolor="#333333"><span class="style2">Nomor HP</span></th>
    <th width="8%" bgcolor="#333333"><span class="style2">Aksi</span></th>
  </tr>

<?php 
if(isset($_POST["cari"])){
$item=$_POST["txtcari"];
	if($_POST["cariberdasarkan"]=="f_namalengkap"){$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid and f_namalengkap like '%$item%'  order by f_namalengkap desc";}
	else if($_POST["cariberdasarkan"]=="f_nopendaftaran"){$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid and f_nopendaftaran like '%$item%'  order by f_namalengkap desc";}
	//else{$perintah="select * from tbl_calonsiswa order by f_namalengkap desc";}
}


else{$perintah="select f_nopendaftaran,f_namalengkap,f_tanggaldaftar,f_jurusan,f_biayaform,f_tglbayarform,f_nohp from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid=tbl_jurusan.f_jurusanid and f_nopendaftaran != NULL order by f_namalengkap desc";}
$lihat=mysql_query($perintah);
	if (! $lihat){die("Maaf perintah sql Anda salah...: $perintah");}
$jumlah =mysql_num_rows($lihat);

$dataPerhal = 5;
 
// apabila $_GET['hal'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.
 
if(isset($_GET['hal2']))
{
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
	$jurusan=$data["f_jurusan"];
	$nohp=$data["f_nohp"];	
	$nohphide=$data["f_nohp"];
	if(strlen($nohphide)>8){
		$nohphide=substr($nohphide,0,8)."XXX";
	}
//--------------------------------------------------------------------------------------------									
if($no %2==1){
echo"<tr bgcolor='#99FF33'>
				<td>$nopendaftaran</td>
				<td>$namalengkap</td>
				<td>$jurusan</td>
				<td>$nohphide</td>
				<td><a href='?mnu=flupapassword&pro=kirim&id=$nopendaftaran'>KirimKataSandi</a></td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#FFFF99'>
				<td>$nopendaftaran</td>
				<td>$namalengkap</td>
				<td>$jurusan</td>
				<td>$nohphide</td>
				<td><a href='?mnu=flupapassword&pro=kirim&id=$nopendaftaran'>KirimKataSandi</a></td>
				</tr>";
				}
			//$no++;
			}//while
?>
</table>


<?php	//	menghapus data
	if($_GET["pro"]=="kirim"){
		$kode=$_GET["id"];
		$sql="select * from  tbl_calonsiswa where f_nopendaftaran='$kode' ";
		$hasil=mysql_query($sql);
		$data=mysql_fetch_array($hasil);
		$nopendaftaran=$data["f_nopendaftaran"];
		$namalengkap=$data["f_namalengkap"];
		$nohp=$data["f_nohp"];
		$password=$data["f_password"];
		//kirim pasword ko hp
		$kirimkonfirmasi="insert into outbox(DestinationNumber, TextDecoded,CreatorID) values('$nohp','SMK Negeri 1 Ampana Kota:Sdr.$namalengkap. No.Pendaftaran Anda: $nopendaftaran , Password: $password','SPSB')";
		mysql_query($kirimkonfirmasi);					
		if($kirimkonfirmasi){
			echo "<script>alert('PASSWORD BERHASIL DIKIRIM');document.location.href='?mnu=flupapassword';</script>";
		}
		else{
			echo"<script>alert('PASSWORD GAGAL DIKIRIM');document.location.href='?mnu=flupapassword';</script>";
		}
	}
?>
