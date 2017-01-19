<?php
	mysql_connect("localhost","root","");
	mysql_select_db("db_psbnew");
	
	$query = "select * from inbox where Processed='false' ";	
	$result = mysql_query($query) or die ("Koneksi ke Tabel Gagal...!".mysql_error());
	if(mysql_num_rows($result)>0){
		while($data = mysql_fetch_array($result)){
			$id=$data["ID"];
			$sms_content=strtoupper($data["TextDecoded"]);
			$pengirim=$data["SenderNumber"];
			$array=explode(' ',$sms_content);
			
			#REQUEST INFORMASI MENGENAI PENERIMAAN SISWA BARU
			if($array[0]=='INFO'){
				$keyinfo=$array[1];
				$s="select * from tbl_informasi where f_jenisinfo='INFO' and f_keyinfo='$keyinfo' ";
				$q=mysql_query($s);
				if(mysql_num_rows($q)>0){
					while($d=mysql_fetch_array($q)){
						$jenisinfo=$d["f_jenisinfo"];
						$keyinfo=$d["f_keyinfo"];
						$judulinfo=$d["f_judulinfo"];
						$infosingkat=$d["f_infosingkat"];
					}
					$pesan="SMK Negeri 1 Ampana Kota:(".$jenisinfo." ".$judulinfo.") ".$infosingkat."";
				}
				else{
					$pesan="SMK Negeri 1 Ampana Kota: Maaf, data tak tersedia atau kesalah pada key info. Terimakasih";
				}
				$kirim_pesan= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$pengirim','$pesan','SPSB') ";
				mysql_query($kirim_pesan);
								
				//update processed dari false ke true, untuk sms yg tlah mendapat balasan
				$changetrue= "delete from inbox WHERE ID='$id'";
				mysql_query($changetrue);
			}
			
			## KHUSUS CALON SISWA YANG TELAH MENDAFTAR
			## REQUEST STATUS DITERIMA ATAU TIDAK
			else if($array[0]=='STATUS'){
				$nopend=$array[1];
				$s="select f_statusterima, f_namalengkap, f_namapanggilan, f_jurusan from tbl_calonsiswa, tbl_jurusan where tbl_calonsiswa.f_jurusanid = tbl_jurusan.f_jurusanid and f_nopendaftaran = '$nopend' ";
				$q=mysql_query($s);
				if(mysql_num_rows($q)>0){
					while($d=mysql_fetch_array($q)){
						$namalengkap=$d["f_namalengkap"];
						$namapanggilan=$d["f_namapanggilan"];
						$jurusan=$d["f_jurusan"];
						$statusterima=$d["f_statusterima"];
					}
					if($statusterima =='TERIMA'){
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Selamat Anda telah DI".$statusterima." masuk SMK Negeri 1 Ampana Kota jurusan ".$jurusan."";
					}
					else if($statusterima=='TOLAK'){
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Maaf Anda telah DI".$statusterima." masuk SMK Negeri 1 Ampana Kota jurusan ".$jurusan."";
					}
					else{
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Anda masih dalam proses penyeleksian masuk SMK Negeri 1 Ampana Kota. Terimakasih";
					}
				}
				else{
					$pesan="SMK Negeri 1 Ampana Kota: Maaf, data tidak tersedia atau kesalahan pada No.pendaftaran. Terimakasih";
				}
				$kirim_pesan= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$pengirim','$pesan','SPSB') ";
				mysql_query($kirim_pesan);
								
				//update processed dari false ke true, untuk sms yg tlah mendapat balasan
				$changetrue= "delete from inbox WHERE ID='$id'";
				mysql_query($changetrue);
			}
			
			## REQUEST STATUS FOTO YANG DIUPLOAD 
			else if($array[0]=='FOTO'){
				$nopend=$array[1];
				$s="select f_stsfoto, f_namalengkap, f_namapanggilan from tbl_calonsiswa where f_nopendaftaran = '$nopend' ";
				$q=mysql_query($s);
				if(mysql_num_rows($q)>0){
					while($d=mysql_fetch_array($q)){
						$namalengkap=$d["f_namalengkap"];
						$namapanggilan=$d["f_namapanggilan"];
						$stsfoto=$d["f_stsfoto"];
					}
					if($stsfoto =='Y'){
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Foto yg Anda Upload Telah mendapat persetujuan panitia. Terimakasih";
					}
					else if($stsfoto=='T'){
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Foto yg Anda Upload Belum mendapat persetujuan panitia. Terimakasih";
					}
					else{
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Anda harus mengupload foto yg sesuai dengan ketentuan. Terimakasih";
					}
				}
				else{
					$pesan="SMK Negeri 1 Ampana Kota: Maaf, data tidak tersedia atau kesalahan pada No.pendaftaran. Terimakasih";
				}
				$kirim_pesan= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$pengirim','$pesan','SPSB') ";
				mysql_query($kirim_pesan);
								
				//update processed dari false ke true, untuk sms yg tlah mendapat balasan
				$changetrue= "delete from inbox WHERE ID='$id'";
				mysql_query($changetrue);
			}
			
			## REQUEST STATUS PEMBAYARAN FORMULIR PENDAFTARAN 
			else if($array[0]=='FORMULIR'){
				$nopend=$array[1];
				$s="select f_tglbayarform, f_namalengkap, f_namapanggilan from tbl_calonsiswa where f_nopendaftaran = '$nopend' ";
				$q=mysql_query($s);
				if(mysql_num_rows($q)>0){
					while($d=mysql_fetch_array($q)){
						$namalengkap=$d["f_namalengkap"];
						$namapanggilan=$d["f_namapanggilan"];
						$tglbayarform=$d["f_tglbayarform"];
					}
					if($tglbayarform ==NULL){
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Anda belum melakukan pembayaran formulir, segera lakukan pembayaran. Terimakasih";
					}
					else{
						$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". Pembayaran formulir Telah diterima tgl ".$tglbayarform.". Terimakasih";
					}
				}
				else{
					$pesan="SMK Negeri 1 Ampana Kota: Maaf, data tak tersedia atau kesalahan pada No.pendaftaran. Terimakasih";
				}
				$kirim_pesan= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$pengirim','$pesan','SPSB') ";
				mysql_query($kirim_pesan);
								
				//update processed dari false ke true, untuk sms yg tlah mendapat balasan
				$changetrue= "delete from inbox WHERE ID='$id'";
				mysql_query($changetrue);
			}
			
			#REQUEST PASSWORD SISWA BARU
			if($array[0]=='PASSWORD'){
				$nopend=$array[1];
				$s="select f_password, f_nohp, f_namalengkap from tbl_calonsiswa where f_nopendaftaran = '$nopend' ";
				$q=mysql_query($s);
				if(mysql_num_rows($q)>0){
					while($d=mysql_fetch_array($q)){
						$namalengkap=$d["f_namalengkap"];
						$password=$d["f_password"];
						$nohp=$d["f_nohp"];
					}
					$pesan="SMK Negeri 1 Ampana Kota: Sdr.".$namalengkap.". No.Pendaftaran: ".$nopend.", Password: ".$password.". Terimakasih";					
					$kirim_pesan= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$nohp','$pesan','SPSB') ";
					mysql_query($kirim_pesan);
					//pengirim
					$pesantukpengirim="Password Telah dikirim ke Handphone Calon siswa dngan no.pendaftaran ".$nopend.". Terimakasih";
					$kirim_pesan1= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$pengirim','$pesantukpengirim','SPSB') ";
					mysql_query($kirim_pesan1);
				}
				else{
					$pesan="SMK Negeri 1 Ampana Kota: Maaf, data tak tersedia atau kesalahan pada No.pendaftaran. Terimakasih";
					$kirim_pesan= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$pengirim','$pesan','SPSB') ";
					mysql_query($kirim_pesan);
				}												
				//update processed dari false ke true, untuk sms yg tlah mendapat balasan
				$changetrue= "delete from inbox WHERE ID='$id'";
				mysql_query($changetrue);
			}
			else{
				//	GAK USAH DIKASIH APA2 KARNA SUDAH DI HANDLE DIATAS.... KEH GITU, TAPI SEKARANG LAIN BRAYY
				$pesansalah="SMK Negeri 1 Ampana Kota: Maaf, Format Salah. yg Benar: PASSWORD Nopend, FORMULIR Nopend, FOTO Nopend, STATUS Nopend, INFO KEY";
					$kirim_pesansalah= "insert into outbox(DestinationNumber,TextDecoded,CreatorID) values('$pengirim','$pesansalah','SPSB') ";
					mysql_query($kirim_pesansalah);
				//update processed dari false ke true, untuk sms yg tlah mendapat balasan
				$changetrue1= "update inbox set Processed='true', kirim='false' WHERE ID='$id'";
				mysql_query($changetrue1);
			}
		}
	}
?>

<html>
	<head>
		<meta http-equiv="refresh" content="5">	<!-- refresh page otomatis -->
		<title>SMS Gateway</title>
	</head>
	<body>
		<h2>SMS GATEWAY AKTIF</h2>
		By. Ramadhianto Handiprimastono S RS
		<img src="images/redhat.png">
		<img src="images/suse.png">
	</body>
</html>
