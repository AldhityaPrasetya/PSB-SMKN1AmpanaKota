<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	require_once"koneksi.php";
	$mnu=$_GET["mnu"];	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>SMK Negeri 1 Ampana Kota</title>
<link href="images/favicon.ico" rel="shortcut icon" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" /> 
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.defaultvalue.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.scrollTo-min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $("#fullname, #validemail, #message").defaultvalue("Full Name", "Email Address", "Message");
    $('#shout a').click(function () {
        var to = $(this).attr('href');
        $.scrollTo(to, 1200);
        return false;
    });
    $('a.topOfPage').click(function () {
        $.scrollTo(0, 1200);
        return false;
    });
    $("#tabcontainer").tabs({
        event: "click"
    });
    $("a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'dark_rounded'
    });
});
</script>
<link rel="stylesheet" href="styles/prettyPhoto.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-prettyPhoto.js"></script>	</head>
<body id="top">
<div id="header">
  <div class="wrapper">
    <div class="fl_right"> <a href='images/logosmea.jpg' class='link' title="Logo SMK Negeri 1 Ampana Kota" rel="prettyPhoto[gallery1]"><img src="images/logosmea.jpg" alt="" width="60" height="60" /></a> </div>
    <div class="fl_left">
      <h1><a href="index.php">SMK NEGERI 1 AMPANA KOTA</a></h1>
      <p>Jl. Tanjung Api, No. 26, Desa Labuan, Kec. Ratolindo Ampana, Kab. Tojo Una-una 94683.</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="topbar">
  <div class="wrapper">
    <div id="topnav">
      <ul>
        <li><a href="index.php">Beranda</a></li>	<!--  class="active" -->
<?php 
if($_SESSION["ULOGIN"]){
	echo"
        <li><a href='?mnu=listinfo'>Informasi</a></li>
        <li><a href='?mnu=listkegiatan'>Kegiatan</a></li>
		<li><a href='?mnu=listnews'>Berita</a></li>
        <li><a href='?mnu=listprofile'>Tentang</a></li>
      </ul>
    </div>
	";
}
else{?>
        <li><a href="?mnu=fregistrasinew">Pendaftaran</a></li>
        <li><a href="?mnu=listinfo">Informasi</a></li>
        <li><a href="?mnu=listkegiatan">Kegiatan</a></li>
		<li><a href="?mnu=listnews">Berita</a></li>
        <li><a href="?mnu=listprofile">Tentang</a></li>
        <li><a href="login.php">Login Admin</a></li>
      </ul>
    </div>
<?php }?>  
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="breadcrumb">
  <div class="wrapper">
    <ul>
      <marquee>  
		<em>Selamat Datang <?php echo isset($_SESSION["CNAMA"]) ;?>, di Website Penerimaan Siswa Baru <b>SMK Negeri 1 Ampana Kota</b> Kabupaten Tojo Una-una</em>
	</marquee>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
	
	<!-- LOAD DATA-DATA CALON SISWA NYA -->
<?php	//	
	$kode=$_SESSION["KODELOG"];
	$sql="select * from  tbl_calonsiswa, tbl_psbsetup where f_nopendaftaran='$kode' ";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
		$nisn = $data["f_nisn"];
		$namalengkap=$data["f_namalengkap"];
		$namapanggilan = $data["f_namapanggilan"];
		$tempatlhrsiswa = $data["f_tempatlhrsiswa"];
		$tanggallhrsiswa=$data["f_tanggallhrsiswa"];
		$kelaminid=$data["f_kelamin"];
		$agamaid = $data["f_agama"];
		$kewarganegid = $data["f_kewarganeg"];
		$statusdiriid = $data["f_statusdiri"];
		$anakke = $data["f_anakke"];
		$saudarakandung = $data["f_saudarakandung"];
		$saudaratiri = $data["f_saudaratiri"];
		$saudaraangkat = $data["f_saudaraangkat"];
		$bahasaid = $data["f_bahasa"];
		$alamatsiswa = $data["f_alamatsiswa"];
		$kotakabupaten = $data["f_kotakabupaten"];
		$kecamatan = $data["f_kecamatan"];
		$kelurahan = $data["f_kelurahan"];
		$kodepos=$data["f_kodepos"];
		$notelpon = $data["f_notelpon"];
		$nohp = $data["f_nohp"];
		$tempattinggalid=$data["f_tempattinggal"];
		$jarakrumah=$data["f_jarakrumah"];
		$transportasiid = $data["f_transportasi"];
		$golongandarahid = $data["f_golongandarah"];
		$penyakitygdiderita = $data["f_penyakitygdiderita"];
		$kelainanjasmani = $data["f_kelainanjasmani"];
		$tinggibadan = $data["f_tinggibadan"];
		$beratbadan = $data["f_beratbadan"];
		$olahragaid = $data["f_olahraga"];
		$kesenianid = $data["f_kesenian"];
		$organisasiid = $data["f_organisasi"];
		$prestasiygdiraih = $data["f_prestasiygdiraih"];
		$prestasibidangakademis = $data["f_prestasibidangakademis"];
		
		$statusdaftar=$data["f_statusdaftar"];
		$kelas=$data["f_kelas"];
		$jurusanid=$data["f_jurusanid"];
	//	$tanggaldaftar=$data["f_tanggaldaftar"];
		$thnmasuk=$data["f_thnmasuk"];
	//	$password=$data["f_passwrod"];
	
		//DATA ORANG TUA KANDUNG DAN WALI CALON SISWA
		$namaayah = $data["f_namaayah"];
		$tempatlhrayah = $data["f_tempatlhrayah"];
		$tanggallhrayah=$data["f_tanggallhrayah"];
		$agamaidayah = $data["f_agamaidayah"];
		$kewarganegidayah = $data["f_kewarganegidayah"];
		$alamatayah=$data["f_alamatayah"];
		$kotaayah=$data["f_kotaayah"];
		$kecamatanayah = $data["f_kecamatanayah"];
		$kelurahanayah = $data["f_kelurahanayah"];
		$kodeposayah = $data["f_kodeposayah"];
		$notelponayah = $data["f_notelponayah"];
		$pendidikanidayah = $data["f_pendidikanidayah"];
		$pekerjaanidayah = $data["f_pekerjaanidayah"];
		$tingkatjabatanidayah = $data["f_tingkatjabatanidayah"];
		$penghasilanidayah = $data["f_penghasilanidayah"];
		$keadaanortuidayah = $data["f_keadaanortuidayah"];
		$tanggalmeninggalayah = $data["f_tanggalmeninggalayah"];
		
		$namaibu = $data["f_namaibu"];
		$tempatlhribu = $data["f_tempatlhribu"];
		$tanggallhribu=$data["f_tanggallhribu"];
		$agamaidibu = $data["f_agamaidibu"];
		$kewarganegidibu = $data["f_kewarganegidibu"];
		$alamatibu=$data["f_alamatibu"];
		$kotaibu=$data["f_kotaibu"];
		$kecamatanibu = $data["f_kecamatanibu"];
		$kelurahanibu = $data["f_kelurahanibu"];
		$kodeposibu = $data["f_kodeposibu"];
		$notelponibu = $data["f_notelponibu"];
		$pendidikanidibu = $data["f_pendidikanidibu"];
		$pekerjaanidibu = $data["f_pekerjaanidibu"];
		$tingkatjabatanidibu = $data["f_tingkatjabatanidibu"];
		$penghasilanidibu = $data["f_penghasilanidibu"];
		$keadaanortuidibu = $data["f_keadaanortuidibu"];
		$tanggalmeninggalibu = $data["f_tanggalmeninggalibu"];
		
		$namawali = $data["f_namawali"];
		$tempatlhrwali = $data["f_tempatlhrwali"];
		$tanggallhrwali=$data["f_tanggallhrwali"];
		$agamaidwali = $data["f_agamaidwali"];
		$kewarganegidwali = $data["f_kewarganegidwali"];
		$alamatwali=$data["f_alamatwali"];
		$kotawali=$data["f_kotawali"];
		$kecamatanwali = $data["f_kecamatanwali"];
		$kelurahanwali = $data["f_kelurahanwali"];
		$kodeposwali = $data["f_kodeposwali"];
		$notelponwali = $data["f_notelponwali"];
		$pendidikanidwali = $data["f_pendidikanidwali"];
		$pekerjaanidwali = $data["f_pekerjaanidwali"];
		$tingkatjabatanidwali = $data["f_tingkatjabatanidwali"];
		$penghasilanidwali = $data["f_penghasilanidwali"];
		
		//DATA SEKOLAH ASAL
		$tahunlulus = $data["f_tahunlulus"];
		$lulusansekolah = $data["f_lulusansekolah"];
		$alamatsekolah=$data["f_alamatsekolah"];
		$tanggalsttb = $data["f_tanggalsttb"];
		$nosttb = $data["f_nosttb"];
		$nilaiijazah=$data["f_nilaiijazah"];
		$pelijazah=$data["f_pelijazah"];
		$nilaiuan = $data["f_nilaiuan"];
		$jumlahpelajaran = $data["f_jumlahpelajaran"];
		$lamabelajar = $data["f_lamabelajar"];
		$asalsekolah = $data["f_asalsekolah"];
		$alasanpindah = $data["f_alasanpindah"];
		
		//UNTUK YANG PENTING YEEEEE
		$telppsb = $data["f_telppsb"];
		//$stsfoto = $data["f_lamabelajar"];
		//$asalsekolah = $data["f_asalsekolah"];
		//$alasanpindah = $data["f_alasanpindah"];
?>

	<!-- MENU CONTENT NYA -->
<?php 
	$mnu=$_GET["mnu"]; 
	if($mnu=="forangtuaedit"){include"system/calonsiswa/forangtuaedit.php";}
	else if($mnu=="fasalsekolahedit"){include"system/calonsiswa/fasalsekolahedit.php";}
	else if($mnu=="fcalonsiswaedit"){include "system/calonsiswa/fcalonsiswaedit.php";}
	else if($mnu=="ffoto"){include"system/calonsiswa/ffoto.php";}
	else if($mnu=="fuploadfoto"){include "system/calonsiswa/fuploadfoto.php";}
	else if($mnu=="formulir"){include "system/calonsiswa/formulir.php";}
	else if($mnu=="fformulir"){include "system/calonsiswa/fformulir.php";}
	// CONTENT WEBSITE
	else if($mnu=="fregistrasinew"){include"system/contentweb/fregistrasinew.php";}
	else if($mnu=="flupapassword"){include"system/contentweb/flupapassword.php";}
	else if($mnu=="finformasidetail"){include"system/contentweb/finformasidetail.php";}
	else if($mnu=="listkegiatan"){include"system/contentweb/listkegiatan.php";}
	else if($mnu=="listnews"){include"system/contentweb/listnews.php";}
	else if($mnu=="listinfo"){include"system/contentweb/listinfo.php";}
	else if($mnu=="listprofile"){include"system/contentweb/listprofile.php";}

else{?>

	<?php	#load nomor telpon sistem
		$dt=mysql_query("select * from tbl_psbsetup ");
		while($d= mysql_fetch_array($dt)){
			$telppsb=$d["f_telppsb"];
		}	
	?>

<h2>SMK Negeri 1 Ampana Kota</h2>
<p class="Default"><strong><div align="center">Motto</div></strong></p>
<p><div align="center">GEMILANG</div>
<p><div align="center">&ldquo;Gerak Menuju Insan Cemerlang&rdquo;</div></p>
<p class="Default"><strong><div align="center">Visi</div></strong></p>
<p><div align="center">&ldquo;Menjadi lembaga diklat yang mempu membimbing, mendidik, melatih dan mengembangkan siswa agar mampu menjadi manusia yang berakhlak mulia, berpengetahuan, berketerampilan produktif dan mandiri serta menghasilkan tamatan yang mampu bersaing dan berjiwa entrepreneurship sesuai dengan kebutuhan dunia usaha/industri&rdquo;&nbsp;</div></p>
<p class="Default"><strong><div align="center">Misi</div></strong></p>
<ul>
<li>Menyiapkan lulusan yang memiliki pengetahuan, keahlian yang mampu berkempetisi dipasar kerja nasional dan global.</li>
<li>Menyiapkan lulusan yang mampu memiliki karir, dapat mengembangkan sikap professional.</li>
<li>Menyiapkan siswa untuk memasuki dunia usaha/industry, bahkan mampu menciptakan lapangan kerja, serta mengembangkan sikap profesionalisme.</li>
<li>Mengembangkan iklim belajar yang berwawasan global, berakar pada norma dan nilai budaya.</li>
<li>Menyiapkan siswa menjadi tenaga kerja tingkat menengah untuk mengisi kebutuhan dunia usaha/industry dan pemerintah pada saat inimaupun mendatang.</li>
<li>Menjalin kerjasama dengan dunia usaha/industry dalam mengoptimalkan pelaksanaan pendidikan kejuruan.</li>
<li>Mengembangkan sikap disiplin dan wawasan lingkungan sehat.</li>
<li>Memberi bekal kepada siswa agar menjadi masyarakat dan warga Negara yang produktif, kreatif, inisiatif dan motifatif.</li>
</ul>
<br />
<!-- petunjuk pengaksesan informasi -->
	 <h2>CARA MENGAKSES INFORMASI VIA SMS</h2>
	  <div id='comments'>
        <ul class='commentlist'>
          <li class='comment_odd'>
            <div class='author'><img class='avatar' src='images/peringatan.png' width='50' height='50' alt='' /></div>
			<?php
			echo "
			<span class='name'><a href='#'>&raquo; Untuk info Status calon siswa, ketik:</a></span>
            <p><b>STATUS &lt;SPASI&gt; &lt;No.Pendaftaran&gt;</b> <em>Kirim ke  $telppsb</em></p>
			<span class='name'><a href='#'>&raquo; Untuk info Status foto, ketik:</a></span>
            <p><b>FOTO &lt;SPASI&gt; &lt;No.Pendaftaran&gt;</b> <em>Kirim ke $telppsb</em></p>
			<span class='name'><a href='#'>&raquo; Untuk info Status pembayaran Formulir, ketik:</a></span>
            <p><b>FORMULIR &lt;SPASI&gt; &lt;No.Pendaftaran&gt;</b> <em>Kirim ke $telppsb</em></p>
			<span class='name'><a href='#'>&raquo; Untuk Request Password Anda, ketik:</a></span>
            <p><b>PASSWORD &lt;SPASI&gt; &lt;No.Pendaftaran&gt;</b> <em>Kirim ke $telppsb</em></p>
			";
			?>

			<?php 	# cari cara mengakses info			
				$dt=mysql_query("select * from tbl_informasi, tbl_psbsetup where f_jenisinfo='INFO' ");
				while($d= mysql_fetch_array($dt)){
					$jenisinfo=$d["f_jenisinfo"];
					$judulinfo=$d["f_judulinfo"];
					$keyinfo=$d["f_keyinfo"];
					$telppsb=$d["f_telppsb"];		
					echo "
						<span class='name'><a href='#'>&raquo; Untuk info $judulinfo, ketik:</a></span>
						<p><b>INFO &lt;SPASI&gt; $keyinfo</b> <em>Kirim ke $telppsb</em></p>
					" ;	
				}
			?>
          </li>
		 </ul>
		</div>

<?php } ?>
	
	
    </div>
    <div id="column">
      <div class="subnav">
<?php 
	if($_SESSION["ULOGIN"]){
		echo "
			<h2>Calon Siswa</h2>
<table width='200' border='0'>
  <tr>
    <td width='17%' valign='top'>No</td>
    <td width='4%' valign='top'>:</td>
    <td width='79%' valign='top'><b>".$_SESSION['ULOGIN']."</b></td>
  </tr>
  <tr>
    <td valign='top'>Nama</td>
    <td valign='top'>:</td>
    <td valign='top'>".$_SESSION['CNAMA']."</td>
  </tr>
</table>
<brr>
        <h2>Menu Calon Siswa</h2>
        <ul>
          <li><a href='?mnu=fcalonsiswaedit'>Data Calon Siswa</a></li>
          <li><a href='?mnu=forangtuaedit'>Orangtua dan Wali</a>
          <li><a href='?mnu=fasalsekolahedit'>Asal Sekolah dan Nilai</a></li>
          <li><a href='?mnu=ffoto'>Foto Calon Siswa</a></li>
          <li><a href='?mnu=fformulir'>Cetak Formulir</a></li>
		  <li><a href='?mnu=keluar' onclick=\"return confirm('Anda Yakin akan Keluar')\"><b><span class='stylelogout'>Keluar</span></b></a></li>
        </ul>
		<br>
		<h2>Menu Utama</h2>
        <ul>	
		";
	}
	else{?>
<h2>Masuk Calon Siswa</h2>	
<div align="center">Login Untuk Melengkapi Pendaftaran</div>  
	  <form action="" method="post">
<table width="200" bordercolor="#FFCC33">
  <tr>
    <td width="47%">No. Pendaftaran: </td>
    <td width="53%">
      <input name="txtuser" type="text" size="13" />
    </td>
  </tr>
  <tr>
    <td>Kata Sandi:</td>
    <td>
      <input name="txtpass" type="password" size="13" />
    </td>
  </tr>
  <tr>
  <td>
      <a href="?mnu=flupapassword" title="Lupa Kata Sandi">LupaKataSandi</a>
    </td>
    <td>
      <div align="right">
        <input type="submit" name="Login" value="Masuk" />
        </div></td>
  </tr>
</table>
</form>
		<br />
        <h2>Menu Utama</h2>
        <ul>			
          <li><a href='?mnu=fregistrasinew'><b>Pendaftaran Siswa</b></a></li>
<?php }?>
          <li><a href="?mnu=listinfo">Informasi Penerimaan Siswa</a></li>
          <li><a href="?mnu=listkegiatan">Kegiatan Sekolah</a>
          <li><a href="?mnu=listnews">Berita Terbaru </a></li>
          <li><a href="?mnu=listprofile">Tentang Sekolah</a></li>
        </ul>
		<br />
		<h2>Maps</h2>
		<center>
			<script id="_wau55k">var _wau = _wau || [];
			_wau.push(["map", "ffzqa8nv1605", "55k", "250", "150", "neosat", "spinner-red"]);
			(function() {var s=document.createElement("script"); s.async=true;
			s.src="http://widgets.amung.us/map.js";
			document.getElementsByTagName("head")[0].appendChild(s);
			})();</script>
		</center>
      </div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<!--foter-->
<!-- ####################################################################################################### -->
<div id="copyright">
  <div class="wrapper">
    <p class="fl_left">&copy; 2017 - <a href="www.facebook.com/aldhi.tya.5">Aldhitya Prasetya</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>


<!-- LOGIN SYSTEM -->

<?php	//LOGIN SYSTEM
	if(isset($_POST["Login"])){
		$username=$_POST["txtuser"];
		$password=$_POST["txtpass"];  //mun pake encrypt standart php 	$password=md5($_POST[txtpass]);
		$sql="select * from tbl_calonsiswa where f_nopendaftaran='$username' and f_password='$password' and f_stscetak=0 ";
		$hasil=mysql_query($sql);
		$ada=mysql_num_rows($hasil);
		$data=mysql_fetch_array($hasil);
		$username=$data["f_nopendaftaran"];
		$ckode=$data["f_nopendaftaran"];
		$nm=$data["f_namalengkap"];
		$status=$d["f_statusterima"];
		if($ada >0){
			$_SESSION["KODELOG"]=$ckode;
			$_SESSION["CNAMA"]=$nm;
			$_SESSION["CLEVEL"]=$status;
			$_SESSION["ULOGIN"]=$username;

			echo "<script>alert('HY $nm, LOGIN SUKSES');document.location.href='index.php';</script>";
		}
		else{
			session_destroy();
			echo "<script>alert('MAAF, NO.PENDAFTARAN DAN PASSWORD HARUS BENAR');document.location.href='index.php';</script>";
		}
	}

	//	WAKTU TANGGAL BULAN & TAHUN
	function WKT($sekarang){
		$tanggal = substr($sekarang,8,2)+0;
		$bulan = substr($sekarang,5,2);
		$tahun = substr($sekarang,0,4);
	
		$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "Nopember", "Desember");
		$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
		return $wk;
	}

	//	LOGOUT DARI SYSTEM
	if($mnu=="keluar"){
		session_destroy();
		echo "<script>alert('Terima Kasih');document.location.href='index.php';</script>";
	}
?>

<!--tambahan brooow-->
<script id="_waud52">var _wau = _wau || [];
_wau.push(["tab", "ffzqa8nv1605", "d52", "right-middle"]);
(function() {var s=document.createElement("script"); s.async=true;
s.src="http://widgets.amung.us/tab.js";
document.getElementsByTagName("head")[0].appendChild(s);
})();</script>

