<?php
	session_start();
	include "koneksi.php";
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
<script type="text/javascript" src="scripts/jquery-prettyPhoto.js"></script>	
</head>
<body id="top">
<div id="header">
  <div class="wrapper">
    <div class="fl_right"> <a href='images/logosmea.jpg' class='link' title="Logo SMK Negeri 1 Ampana Kota" rel="prettyPhoto[gallery1]"><img src="images/logosmea.jpg" alt="" width="60" height="60" /></a> </div>
    <div class="fl_left">
      <h1><a href="#">SMK NEGERI 1 AMPANA KOTA</a></h1>
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
 	<?php if($_SESSION["1CLEVEL"]=="admin"){?> 
        <li><a href="#">Master Data</a>
			<ul>
			<li><a href="?mnu=ffotocalonsiswa">Data Foto Calon Siswa</a></li>
			<li><a href="?mnu=fjurusan">Data Jurusan</a></li>
			<li><a href="?mnu=finformasi">Data Informasi dan Berita</a></li>
			<li><a href="?mnu=fcalonsiswa">Data Pemb. Formulir</a></li>
          </ul>	
        <li><a href="?mnu=fnilaicalonsiswa">Hasil Test</a></li>
        <li><a href="#">Pesan</a>
          <ul>
            <li><a href="?mnu=inbox">Pesan Masuk</a></li>
            <li><a href="?mnu=outbox">Pesan Terkirim</a></li>
            <li><a href="?mnu=pesantext">Kirim Pesan</a></li>
			<li><a href="?mnu=autoreply">Aktifkan Smsg</a></li>
          </ul>
        </li>
		<li><a href="#">Laporan</a>
          <ul>
            <li><a href="system/report/calonsiswa.php">Seluruh Pendaftaran</a></li>
            <li><a href="system/report/calonsiswaterima.php">Pendaftaran Diterima</a></li>
            <li><a href="system/report/calonsiswatolak.php">Pendaftaran Ditolak</a></li>
            <li><a href="system/report/pembayaranform.php">Pembayaran Formulir</a></li>
          </ul>
        </li>
		<li><a href="#">Admin</a>
			<ul>
			<li><a href="?mnu=userpassword">Perbarui Akun</a></li>
			<li><a href="?mnu=fpsbsetup">Panitia PSB</a></li>
			<li><a href="?mnu=user">Data Pengguna</a></li>
			<li><a href="?mnu=keluar" onclick="return confirm('Anda Yakin Ingin Keluar')">Keluar</a></li>
          </ul>
		  </li>
	    <?php } else if($_SESSION["1CLEVEL"]=="user"){?>
	    <li><a href="#">Master Data</a>
			<ul>
			<li><a href="?mnu=ffotocalonsiswa">Data Foto Calon Siswa</a></li>
			<li><a href="?mnu=fjurusan">Data Jurusan</a></li>
			<li><a href="?mnu=finformasi">Data Informasi dan Berita</a></li>
			<li><a href="?mnu=fcalonsiswa">Data Pemb. Formulir</a></li>
          </ul>
        <li><a href="?mnu=fnilaicalonsiswa">Hasil Test</a></li>
        <li><a href="#">Pesan</a>
          <ul>
            <li><a href="?mnu=inbox">Pesan Masuk</a></li>
            <li><a href="?mnu=outbox">Pesan Terkirim</a></li>
            <li><a href="?mnu=pesantext">Kirim Pesan</a></li>
			<li><a href="?mnu=autoreply">Aktifkan Smsg</a></li>
          </ul>
        </li>		
		<li><a href="#">Laporan</a>
          <ul>
            <li><a href="system/report/calonsiswa.php">Seluruh Pendaftaran</a></li>
            <li><a href="system/report/calonsiswaterima.php">Pendaftaran Diterima</a></li>
            <li><a href="system/report/calonsiswatolak.php">Pendaftaran Ditolak</a></li>
            <li><a href="system/report/pembayaranform.php">Pembayaran Formulir</a></li>
          </ul>
        </li>				
        <li><a href="#">User</a>
			<ul>
			<li><a href="?mnu=userpassword">Perbarui Akun</a></li>
			<li><a href="?mnu=keluar" onclick="return confirm('Anda Yakin Ingin Keluar')">Keluar</a></li>
          </ul>
	   <?php }
		//	else if($_SESSION["1CLEVEL"]<>"user" || $_SESSION["1CLEVEL"]<>"admin"){}	
	?>
      </ul>
    </div>
   
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="breadcrumb">
  <div class="wrapper">
    <ul>
	<marquee>  
		<em>Selamat Datang <? echo $_SESSION["1CNAMA"] ;?>, di Administrator Website Penerimaan Siswa Baru <b>SMK Negeri 1 Ampana Kota </b>Kabupaten Tojo Una-una</em>
	</marquee>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="container">
  <div class="wrapper">

   <?php $mnu=$_GET["mnu"]; 
		if ($mnu=="finformasi"){ include"system/adminsystem/finformasi.php";}
		else if($mnu=="fpsbsetup"){include"system/adminsystem/fpsbsetup.php";}
		else if($mnu=="fjurusan"){include"system/adminsystem/fjurusan.php";}
		else if($mnu=="fcalonsiswa"){include "system/adminsystem/fcalonsiswa.php";}
		else if($mnu=="ffotocalonsiswa"){include "system/adminsystem/ffotocalonsiswa.php";}
		else if($mnu=="fupdatetglbayarformulir"){include"system/adminsystem/fupdatetglbayarformulir.php";}
		else if($mnu=="fnilaicalonsiswa"){include"system/adminsystem/fnilaicalonsiswa.php";}
		else if($mnu=="fupdatenilaitest"){include"system/adminsystem/fupdatenilaitest.php";}
		else if($mnu=="inbox"){include"system/sms/inbox.php";}
		else if($mnu=="outbox"){include"system/sms/outbox.php";}
		else if($mnu=="pesantext"){include"system/sms/pesantext.php";}
		else if($mnu=="autoreply"){include"system/sms/autoreply.php";}
		else if($mnu=="user"){include"system/adminsystem/user.php";}
		else if($mnu=="userpassword"){include"system/adminsystem/userpassword.php";}
		else{	?>
		<!-- DAPAT DIISI DENGAN CONTENT APA SAJA -->
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

	<?php } ?>
	
	
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div id="copyright">
  <div class="wrapper">
    <p class="fl_left">Copyright &copy; 2017 - <a href="www.facebook.com/aldhi.tya.5">Aldhitya Prasetya</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>


<?php	//	LOGOUT
	if($mnu=="keluar"){
		session_destroy();
		echo "<script>alert('Terima Kasih');document.location.href='index.php';</script>";
	}
?>

