
<?php	//	LOAD DATA CALON SISWA

	$kode=$_SESSION["KODELOG"];
	$sql="select * from  tbl_calonsiswa, tbl_jurusan where f_nopendaftaran='$kode' and tbl_calonsiswa.f_jurusanid = tbl_jurusan.f_jurusanid ";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
		$nisn = $data["f_nisn"];
		$namalengkap=$data["f_namalengkap"];
		$alamat = $data["f_alamat"];
		$jurusanid = $data["f_jurusanid"];
		#######
		$namaayah = $data["f_namaayah"];		
		$namaibu = $data["f_namaibu"];
		#######
		$lulusansekolah=$data["f_lulusansekolah"];
		$tanggalsttb=$data["f_tanggalsttb"];
		$nosttb = $data["f_nosttb"];
		$nilaiijazah = $data["f_nilaiijazah"];
		$nilaiuan = $data["f_nilaiuan"];
		#########
		$nilaitest=$data["f_nilaitest"];
		$tglbayarform=$data["f_tglbayarform"];
		$stsfoto = $data["f_stsfoto"];
?>
<style type="text/css">
<!--
.style1{
	color:#FF0000;
}		
.style2 {
	font-size: 16px;
	color: #00FF00;
}
-->
</style>


<div id="comments">
	<h2>Cetak Bukti Pendaftaran Siswa Baru Online</h2>
	<ul class="commentlist">
		<li class="comment_odd">Anda diwajibkan untuk mencetak bukti pendaftaran online sebagai salah satu syarat yang harus dibawa saat mendaftar ulang</li>
		<li class="comment_odd">Halaman ini hanya bisa dicetak apabila semua syarat pendaftaran telah terisi dengan lengkap dan sudah diverifikasi oleh panitia</li>
	  <li class="comment_odd">Setelah halaman ini dicetak, secara otomatis data pendaftaran anda akan kami <strong>KUNCI</strong>, sehingga tidak bisa diubah kembali</li>
		<li class="comment_even">
			<div class='author'><img class='avatar' src='images/peringatan.png' alt='' width='32' height='32' /></div>
 <?php 
			  if($nisn ==NULL || $namalengkap==NULL || $jurusanid==0 ||$namaayah ==NULL || $namaibu==NULL){ 
				  echo "<em  class='style1'><b>!</b> Maaf, Anda Belum Melengkapi Biodata Calon Siswa... </em><br>";
			  }
			  if($nilaiuan ==0 || $nilaiijazah==0 || $nosttb==NULL || $tanggalsttb==NULL || $lulusansekolah==NULL){ 
				  echo "<em  class='style1'><b>!</b> Maaf, Anda Belum Melengkapi Data Sekolah Asal... </em><br>";
			  }
			  if ($tglbayarform ==NULL){
				  echo "<em  class='style1'><b>!</b> Maaf, Anda Belum Membayar Biaya Formulir... </em><br>";
			  }
			  if ($nilaitest ==0){
				  echo "<em  class='style1'><b>!</b> Maaf, Anda Belum Mengikuti Tes Masuk... </em><br>";
			  }
			  if ($stsfoto == NULL){
				 echo "<em  class='style1'><b>!</b> Maaf, Anda Belum Upload Pas Foto... </em><br>";
			  }
			  if ($stsfoto=='T'){
				 echo "<em  class='style1'><b>!</b> Maaf, foto Anda Belum disetujui Panitia... </em><br>";
			  }
			  if ($nilaitest ==0 || $tglbayarform ==NULL || $nilaitest ==0 || $stsfoto == NULL || $stsfoto=='T' ){
				 // echo "<em  class='style1'><b>!</b> Maaf, Anda Belum Mengikuti Tes Masuk... </em><br>";
			  }

			 // if($nisn !=NULL || $namalengkap ==NULL || $jurusanid !=0 ||$namaayah !=NULL || $namaibu !=NULL || $nilaiuan !=0 || $nilaiijazah !=0 || $nosttb !=NULL || $tanggalsttb !=NULL || $lulusansekolah !=NULL || $stsfoto =='Y' || $tglbayarform !=NULL || $nilaitest !=0){
			  else{
			  	echo"<h1><a href='fotocalonsiswa/_formulir1.php?$kode='$kode>Silahkan Cetak Formulir...</a></h1>";
				//echo"<h1><a href='fcetak.php?mnu=formulir'>Silahkan Cetak Formulir...</a></h1>";				
			  }
		?>
		</li>
	</ul>
</div>
