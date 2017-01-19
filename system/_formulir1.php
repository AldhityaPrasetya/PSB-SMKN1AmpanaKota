<?php
#mengambil data sangking database
	mysql_connect("localhost","root","");
	mysql_select_db("db_psbnew");	
	session_start();
	$kode=$_SESSION["KODELOG"]; // KODELOG
	#$kode="N1207001";
	$sql="select * from  tbl_calonsiswa, tbl_jurusan, tbl_kelas where f_nopendaftaran='".$kode."' and tbl_calonsiswa.f_jurusanid = tbl_jurusan.f_jurusanid and tbl_calonsiswa.f_kelas = tbl_kelas.f_kelas ";
	$hasil=mysql_query($sql);
	$data=mysql_fetch_array($hasil);
		$nopendaftaran=$data["f_nopendaftaran"];
		$nisn=$data["f_nisn"];
		$namalengkap=$data["f_namalengkap"];
		$tempatlhrsiswa=$data["f_tempatlhrsiswa"];
		$tanggallhrsiswa=$data["f_tanggallhrsiswa"];
		$kelaminid=$data["f_kelamin"];
		$agamaid=$data["f_agama"];
		$anakke=$data["f_anakke"];
		$saudarakandung=$data["f_saudarakandung"];
		$alamatsiswa=$data["f_alamatsiswa"];
		$kotakabupaten=$data["f_kotakabupaten"];
		$kecamatan=$data["f_kecamatan"];
		$kelurahan=$data["f_kelurahan"];
		$kodepos=$data["f_kodepos"];
		$notelpon=$data["f_notelpon"];
		$nohp=$data["f_nohp"];
		$statusdaftar=$data["f_statusdaftar"];
		$kelas=$data["f_kelas"];
		$kelasnama1=$data["f_key"];
		$jurusanid=$data["f_jurusanid"];
		$jurusan=$data["f_jurusan"];
		$tanggaldaftar=$data["f_tanggaldaftar"];
		$thnmasuk=$data["f_thnmasuk"];
		$namaayah=$data["f_namaayah"];
		$alamatayah=$data["f_alamatayah"];
		$kotaayah=$data["f_kotaayah"];
		$kecamatanayah=$data["f_kecamatanayah"];
		$kelurahanayah=$data["f_kelurahanayah"];
		$kodeposayah=$data["f_kodeposayah"];
		$notelponayah=$data["f_notelponayah"];
		$pekerjaanidayah=$data["f_pekerjaanidayah"];
		$penghasilanidayah=$data["f_penghasilanidayah"];
		$namaibu=$data["f_namaibu"];
		$alamatibu=$data["f_alamatibu"];
		$kotaibu=$data["f_kotaibu"];
		$kecamatanibu=$data["f_kecamatanibu"];
		$kelurahanibu=$data["f_kelurahanibu"];
		$kodeposibu=$data["f_kodeposibu"];
		$notelponibu=$data["f_notelponibu"];
		$pekerjaanidibu=$data["f_pekerjaanidibu"];
		$penghasilanidibu=$data["f_penghasilanidibu"];
		$namawali=$data["f_namawali"];
		$alamatwali=$data["f_alamatwali"];
		$kotawali=$data["f_kotawali"];
		$kecamatanwali=$data["f_kecamatanwali"];
		$kelurahanwali=$data["f_kelurahanwali"];
		$kodeposwali=$data["f_kodeposwali"];
		$notelponwali=$data["f_notelponwali"];
		$pekerjaanidwali=$data["f_pekerjaanidwali"];
		$penghasilanidwali=$data["f_penghasilanidwali"];
		//kegemaran
		$olahragaid=$data["f_olahraga"];
		$kesenianid=$data["f_kesenian"];
		$organisasiid=$data["f_organisasi"];
		//DATA SEKOLAH ASAL
		$tahunlulus=$data["f_tahunlulus"];
		$lulusansekolah=$data["f_lulusansekolah"];
		$alamatsekolah=$data["f_alamatsekolah"];
		$nilaiijazah=$data["f_nilaiijazah"];
		$pelijazah=$data["f_pelijazah"];
		$nilaiuan=$data["f_nilaiuan"];
		$jumlahpelajaran=$data["f_jumlahpelajaran"];
		$lamabelajar=$data["f_lamabelajar"];
		$asalsekolah=$data["f_asalsekolah"];
		$alasanpindah=$data["f_alasanpindah"];		
		//UNTUK YANG PENTING YEEEEE
		$foto=$data["f_foto"]; 
		
		#mengupdate status cetak 
		$changetrue="update tbl_calonsiswa set f_stscetak=1 where f_nopendaftaran='".$kode."' ";
		mysql_query($changetrue);

require('../system/report/fpdf.php');
class PDF extends FPDF{
	function Header(){
		$this->Image('../system/report/logosmea.jpg',5,5,-650);
		$this->SetFont('Arial','B',20);
		$this->text(25,13,'SMK NEGERI 1 AMPANA KOTA');
		$this->setFont('Arial','',9);
		$this->text(25,20,'Jl. Tanjung Api, No. 26, Desa Labuan, Kec. Ratolindo Ampana, Kab. Tojo Una-una 94683.');
		$this->text(5,25,'============================================================================================================');
	}
	function Footer(){
		#Position at 1.5 cm from bottom
		$q=mysql_query('select * from tbl_psbsetup ');
		$d=mysql_fetch_array($q);
		$this->SetY(-15);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,10,'Panitia Penerimaan Siswa/siswi Baru SMK negeri 1 Ampana Kota',0,0,'C');
	}
}

$tgl = date('d M Y');
$pdf = new PDF();
$pdf->Open();
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$pdf->setFont('Arial','',14);
$pdf->text(32,30,'FORMULIR PENDAFTARAN ONLINE SISWA BARU TAHUN '.$thnmasuk);
$pdf->setFont('arial','',10);
#
$pdf->text(10,40,'Nomor Pendaftaran');
$pdf->text(10,45,'NISN');
$pdf->text(10,50,'Nama Lengkap');
$pdf->text(10,55,'Tempat, Tanggal Lahir');
$pdf->text(10,60,'Jenis Kelamin');
$pdf->text(10,65,'Agama');
$pdf->text(10,70,'Alamat');
$pdf->text(10,75,'Kodepos');
$pdf->text(10,80,'Nomor Telepon');
$pdf->text(10,85,'Nomor Handphone');
$pdf->text(10,95,'Asal Sekolah');
$pdf->text(10,100,'Tahun Lulus');
$pdf->text(10,105,'Nilai Ijazah');
$pdf->text(10,110,'Nilai UAN');
$pdf->text(10,120,'Status Masuk');
$pdf->text(10,125,'Masuk Di Kelas');
$pdf->text(10,130,'Jurusan');
$pdf->text(10,140,'Nama Ayah');
$pdf->text(10,145,'Nama Ibu');
$pdf->text(10,150,'Pekerjaan Orangtua');
$pdf->text(10,155,'Penghasilan Orangtua');
$pdf->text(10,160,'Saudara Kandung');
$pdf->text(10,165,'Nomor Telepon');
$pdf->text(10,170,'Alamat Orangtua');
$pdf->text(10,180,'Olahraga yang disuka');
$pdf->text(10,185,'Kesenian yang disuka');
$pdf->text(10,190,'Organisasi yang dipilih');

#from table in database
$pdf->text(60,40,': '.$nopendaftaran);
$pdf->text(60,45,': '.$nisn);
$pdf->text(60,50,': '.$namalengkap);
$pdf->text(60,55,': '.$tempatlhrsiswa.', '.$tanggallhrsiswa);
$pdf->text(60,60,': '.$kelaminid);
$pdf->text(60,65,': '.$agamaid);
$pdf->text(60,70,': '.$alamatsiswa.', '.$kelurahan.', '.$kecamatan.', '.$kotakabupaten);
$pdf->text(60,75,': '.$kodepos);
$pdf->text(60,80,': '.$notelpon);
$pdf->text(60,85,': '.$nohp);

$pdf->text(60,95,': '.$lulusansekolah.''.$asalsekolah);
$pdf->text(60,100,': '.$tahunlulus);
$pdf->text(60,105,': Matpel='.$pelijazah.', Nilai='.$nilaiijazah);
$pdf->text(60,110,': Matpel='.$jumlahpelajaran.', Nilai='.$nilaiuan);

$pdf->text(60,120,': '.$statusdaftar);
$pdf->text(60,125,': '.$kelas.' ('.$kelasnama1.')');
$pdf->text(60,130,': '.$jurusan);

$pdf->text(60,140,': '.$namaayah);
$pdf->text(60,145,': '.$namaibu);
$pdf->text(60,150,': '.$pekerjaanidayah.' dan '.$pekerjaanidibu);
$pdf->text(60,155,': '.$penghasilanidayah.' dan '.$penghasilanidibu);
$pdf->text(60,160,': '.$saudarakandung.' orang');
$pdf->text(60,165,': '.$notelponayah.' / '.$notelponibu);
$pdf->text(60,170,': '.$alamatayah.', '.$kelurahanayah.', '.$kecamatanayah.', '.$kotaayah);

$pdf->text(60,180,': '.$olahragaid);
$pdf->text(60,185,': '.$kesenianid);
$pdf->text(60,190,': '.$organisasiid);

$pdf->text(10,210,'Dengan ini saya menyatakan bahwasannya data di atas adalah benar, dan apabila terjadi perbedaan dengan bukti asli','C');
$pdf->text(10,215,'maka saya siap menerima konsekuensi dari panitia tanpa sanggahan');

#foto siswa
$pdf->Image($foto,90,224,30,31); //93,227,-500

//$ketua = $data[f_ketuapanitia];
$pdf->text(130,230,"Ampana Kota , ".$tgl);
$pdf->text(130,250,$namalengkap);

#menutup session
//session_destroy();

$pdf->output();

?>