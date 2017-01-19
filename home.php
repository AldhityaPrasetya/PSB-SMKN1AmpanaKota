<?php
	include "koneksi.php";
	$mnu=$_GET["mnu"];
	$YPATH="infoimages";
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>SMK Negeri 1 Ampana Kota</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="scripts/jquery.hoverIntent.js"></script>
<script type="text/javascript" src="scripts/jquery.hslides.1.0.js"></script>
<script type="text/javascript" src="scripts/jquery.hslides.setup.js"></script>
</head>
<body id="top">
<div id="header">
  <div class="wrapper">
    <div class="fl_right"> <a href="#"><img src="images/logo SMKYaspia.jpg" alt="" width="60" height="60" /></a> </div>
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
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="content.php">Content</a></li>
        <li><a href="#">Profile</a>
		  <ul>
            <? include"system/contentweb/judulprofile.php";?>
          </ul>
		</li>
        <li><a href="#">Informasi</a>
          <ul>
            <? include"system/contentweb/judulinfo.php";?>
          </ul>
        </li>
        <li class="last"><a href="#">Kegiatan</a>
		  <ul>
            <? include"system/contentweb/judulkegiatan.php";?>
          </ul>
		</li>
		<div id="search">
		  <form action="#" method="post">
			<fieldset>
			  <legend>Site Search</legend>
			  <input type="text" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
			  <input type="submit" name="go" id="go" value="Search" />
			</fieldset>
		  </form>
		</div>	
      </ul>	  
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="featured_slide">
  <div class="wrapper">
    <div class="featured_content">
      <ul id="accordion">
<? 
	$dt=mysql_query("select * from tbl_informasi where f_jenisinfo='PROFILE' or f_jenisinfo='KEGIATAN' order by rand() limit 5");
	while($d= mysql_fetch_array($dt)){
		$tglpost=$d["f_tglpost"];
		$jenisinfo=$d["f_jenisinfo"];
		$judulinfo=$d["f_judulinfo"];
		$kodeinfo=$d["f_kodeinfo"];
		$gambar=$d["f_images"];
		if ($gambar==''){
			$gambar="default.jpg";
		}
		$infotext=$d["f_infotext"];
		if(strlen($infotext)>300){
			$infotext=substr($infotext,0,300)."...<p class='readmore'><a href='content.php?mnu=finformasidetail&id=$kodeinfo'>Continue Reading &raquo;</a></p>";
		}
		echo "
			<li class='current'>
			  <div class='featured_box'>
				<h2>$judulinfo</h2>
				<p>$infotext</p>
			  </div>
			  <div class='featured_tab'> <img src='$YPATH/$gambar' alt='$gambar' />
				<p>$jenisinfo</p>
			  </div>
			</li>
		" ;	
	}
?>	
      </ul>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="homecontent">
  <div class="wrapper">
    <ul>	
<? //include "contentweb/newsindex.php";?>
<? 
	$dt=mysql_query("select * from tbl_informasi where f_jenisinfo='KEGIATAN' order by rand() limit 3");
	while($d= mysql_fetch_array($dt)){
		$tglpost=$d["f_tglpost"];
		$judulinfo=$d["f_judulinfo"];
		$kodeinfo=$d["f_kodeinfo"];
		$gambar=$d["f_images"];
		if ($gambar==''){
			$gambar="default.jpg";
		}
		$infotext=$d["f_infotext"];
		if(strlen($infotext)>300){
			$infotext=substr($infotext,0,300)."...<p class='readmore'><a href='content.php?mnu=finformasidetail&id=$kodeinfo'>Continue Reading &raquo;</a></p>";
		}
		echo "
			<li>
				<h2 class='title'><img src='$YPATH/$gambar' alt='$gambar' width='60' height='60' />$judulinfo</h2>
				<p>$infotext</p>
			</li> 
		" ;	
	}
?>
    </ul>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="container">
  <div class="wrapper">
    <div id="content">
		 <h2>Cara Mengakses Informasi Via SMS</h2>
<? 
	$dt=mysql_query("select * from tbl_informasi, tbl_psbsetup where f_jenisinfo='INFO' "); //
	while($d= mysql_fetch_array($dt)){
		$jenisinfo=$d["f_jenisinfo"];
		$judulinfo=$d["f_judulinfo"];
		$keyinfo=$d["f_keyinfo"];
		$telppsb=$d["f_telppsb"];		
		echo "
			<p><li>Untuk info $judulinfo, ketik:</li>
			<b>INFO &lt;SPASI&gt; $keyinfo</b> <em>Kirim ke $telppsb</em> </p>
		" ;	
	}
?>
    </div>
    <div id="column">
      <div class="holder">
        <h2>Baca Informasi</h2>
        <ul id="latestnews">
<? 
	$dt=mysql_query("select * from tbl_informasi where f_jenisinfo='INFO' order by rand() limit 2");
	while($d= mysql_fetch_array($dt)){
		$tglpost=$d["f_tglpost"];
		$judulinfo=$d["f_judulinfo"];
		$kodeinfo=$d["f_kodeinfo"];
		$gambar=$d["f_images"];
		if ($gambar==''){
			$gambar="default.jpg";
		}
		$infotext=$d["f_infotext"];
		if(strlen($infotext)>100){
			$infotext=substr($infotext,0,100).".";
		}
		echo "
			<li>
				<img class='imgl' src='$YPATH/$gambar' alt='$gambar' width='100' height='75' />
				<p><strong><a href='content.php?mnu=finformasidetail&id=$kodeinfo'>$judulinfo</a></strong></p>
				<p>$infotext</p>
			</li> 
		" ;	
	}
?>
        </ul>
      </div>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div id="footer">	<!--
  <div class="wrapper">	
   <!-- <br class="clear" /> 
  </div>		-->
</div>
<!-- ####################################################################################################### -->
<div id="copyright">
  <div class="wrapper">
    <p class="fl_left">Copyright &copy; 2012 - <a href="#">Ramadhianto Handiprimastono S.RS</a></p>
    <p class="fl_right">
		<?php if($_SESSION["CLEVEL"]=="admin" || $_SESSION["CLEVEL"]=="user"){?> 
		<a href="?mnu=keluar" title="Log Out"><?php echo $_SESSION["CNAMA"] ; ?></a>
		<?php }	
		else{echo "Login <a href='login.php' title='Login Administrator'>Administrator</a>";}
		?>		
	</p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
