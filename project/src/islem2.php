<?php
//müşteri crud işlemleri
require_once 'baglan.php';

if (isset($_POST['insertislemi'])) {
	
	

	$kaydet=$db->prepare("INSERT into musteri SET
		ilceID=:ilceID,
		musteriAd=:musteriAd,
        musteriSoyAd=:musteriSoyAd,
        musteriTel=:musteriTel,
        musteriMail=:musteriMail"
        );

	$insert=$kaydet->execute(array(
		'ilceID' => $_POST['ilceID'],
		'musteriAd' => $_POST['musteriAd'],
        'musteriSoyAd' => $_POST['musteriSoyAd'],
        'musteriTel' => $_POST['musteriTel'],
        'musteriMail' => $_POST['musteriMail']
	));


    if ($insert) {
		
		//echo "kayıt başarılı";

		Header("Location:musteri.php?durum=ok");
		exit;

	} else {

		//echo "kayıt başarısız";
		Header("Location:musteri.php?durum=no");
		exit;
	}

}

	//kayıt düzenleme/müşteri
	if (isset($_POST['updateislemi'])) {
		
			$musteriID=$_POST['musteriID'];

	

			$kaydet=$db->prepare("UPDATE musteri SET
			ilceID=:ilceID,
			musteriAd=:musteriAd,
			musteriSoyAd=:musteriSoyAd,
			musteriTel=:musteriTel,
			musteriMail=:musteriMail
			WHERE musteriID={$_POST['musteriID']}"
			
			);
	
			$insert=$kaydet->execute(array(
			'ilceID' => $_POST['ilceID'],
			'musteriAd' => $_POST['musteriAd'],
			'musteriSoyAd' => $_POST['musteriSoyAd'],
			'musteriTel' => $_POST['musteriTel'],
			'musteriMail' => $_POST['musteriMail']
		));
	
	
		if ($insert) {
			
			//echo "kayıt başarılı";
	
			Header("Location:duzenle.php?durum=ok&musteriID=$musteriID");
			exit;
	
		} else {
	
			//echo "kayıt başarısız";
			Header("Location:duzenle.php?durumno&musteriID=$musteriID");
			exit;
		}

}	
		//veri silme/müşteri
	if ($_GET['bilgiSil']=="ok") {

			$sil=$db->prepare("DELETE from musteri where musteriID=:ID");
			$kontrol=$sil->execute(array(
				'ID' => $_GET['musteriID']
			));
		
			if ($kontrol) {
				
				//echo "kayıt başarılı";
		
				Header("Location:musteri.php?durum=ok");
				exit;
		
			} else {
		
				//echo "kayıt başarısız";
				Header("Location:musteri.php?durum=no");
				exit;
			}
		
		
	}

	//personel ekleme/insert2islemi
	if (isset($_POST['insertİslemi'])) {
	
	

		$kaydet=$db->prepare("INSERT into personel SET
			subeID=:subeID,
			personelTc=:personelTc,
			personelAd=:personelAd,
			personelSoyAd=:personelSoyAd,
			personelTel=:personelTel,
			personelMail=:personelMail,
			gorevID=:gorevID,
			dagitimHiz=:dagitimHiz,
			anlasmaSayisi=:anlasmaSayisi"
			);
	
		$insert=$kaydet->execute(array(
			'subeID' => $_POST['subeID'],
			'personelTc' => $_POST['personelTc'],
			'personelAd' => $_POST['personelAd'],
			'personelSoyAd' => $_POST['personelSoyAd'],
			'personelTel' => $_POST['personelTel'],
			'personelMail' => $_POST['personelMail'],
			'gorevID' => $_POST['gorevID'],
			'dagitimHiz' => $_POST['dagitimHiz'],
			'anlasmaSayisi' => $_POST['anlasmaSayisi']
		));
	
	
		if ($insert) {
			
			//echo "kayıt başarılı";
	
			Header("Location:personel.php?durum=ok");
			exit;
	
		} else {
	
			//echo "kayıt başarısız";
			Header("Location:personel.php?durum=no");
			exit;
		}
	
	}

	//kayıt düzenleme/personel
	if (isset($_POST['updateİslem'])) {
		
		$personelID=$_POST['personelID'];



		$kaydet=$db->prepare("UPDATE personel SET
		subeID=:subeID,
		personelTc=:personelTc,
		personelAd=:personelAd,
		personelSoyAd=:personelSoyAd,
		personelTel=:personelTel,
		personelMail=:personelMail,
		gorevID=:gorevID,
		dagitimHiz=:dagitimHiz,
		anlasmaSayisi=:anlasmaSayisi
		WHERE personelID={$_POST['personelID']}"
		
		);

		$insert=$kaydet->execute(array(
		'subeID' => $_POST['subeID'],
		'personelTc' => $_POST['personelTc'],
		'personelAd' => $_POST['personelAd'],
		'personelSoyAd' => $_POST['personelSoyAd'],
		'personelTel' => $_POST['personelTel'],
		'personelMail' => $_POST['personelMail'],
		'gorevID' => $_POST['gorevID'],
		'dagitimHiz' => $_POST['dagitimHiz'],
		'anlasmaSayisi' => $_POST['anlasmaSayisi']
		));


	if ($insert) {
		
		//echo "kayıt başarılı";

		Header("Location:duzenle2.php?durum=ok&personelID=$personelID");
		exit;

	} else {

		//echo "kayıt başarısız";
		Header("Location:duzenle2.php?durumno&personelID=$personelID");
		exit;
	}

}	

		//veri silme/personel
		if ($_GET['bilgiSiL']=="ok") {

			$sil=$db->prepare("DELETE from personel where personelID=:ID");
			$kontrol=$sil->execute(array(
				'ID' => $_GET['personelID']
			));
		
			if ($kontrol) {
				
				//echo "kayıt başarılı";
		
				Header("Location:personel.php?durum=ok");
				exit;
		
			} else {
		
				//echo "kayıt başarısız";
				Header("Location:personel.php?durum=no");
				exit;
			}

		
		
	}

	//şube ekleme
	if (isset($_POST['subeEkle'])) {
	
	

		$kaydet=$db->prepare("INSERT into sube SET
			subeAd=:subeAd,
			sirketID=:sirketID"
			);
	
		$insert=$kaydet->execute(array(
			'subeAd' => $_POST['subeAd'],
			'sirketID' => $_POST['sirketID']
		));
	
	
		if ($insert) {
			
			//echo "kayıt başarılı";
	
			Header("Location:sube.php?durum=ok");
			exit;
	
		} else {
	
			//echo "kayıt başarısız";
			Header("Location:sube.php?durum=no");
			exit;
		}
	
	}

	//kayıt düzenleme/personel
	if (isset($_POST['updateİslem2'])) {
		
		$subeID=$_POST['subeID'];



		$kaydet=$db->prepare("UPDATE sube SET
		subeID=:subeID,
		sirketID=:sirketID,
		subeAd=:subeAd,
		WHERE subeID={$_POST['subeID']}"
		
		);

		$insert=$kaydet->execute(array(
		'subeID' => $_POST['subeID'],
		'sirketID' => $_POST['sirketID'],
		'subeAd' => $_POST['subeAd'],
		
		));


	if ($insert) {
		
		//echo "kayıt başarılı";

		Header("Location:duzenle3.php?durum=ok&subeID=$subeID");
		exit;

	} else {

		//echo "kayıt başarısız";
		Header("Location:duzenle3.php?durumno&subeID=$subeID");
		exit;
	}

}	

		//veri silme/şube
		if ($_GET['bilgiSiLL']=="ok") {

			$sil=$db->prepare("DELETE from sube where subeID=:ID");
			$kontrol=$sil->execute(array(
				'ID' => $_GET['subeID']
			));
		
			if ($kontrol) {
				
				//echo "kayıt başarılı";
		
				Header("Location:sube.php?durum=ok");
				exit;
		
			} else {
		
				//echo "kayıt başarısız";
				Header("Location:sube.php?durum=no");
				exit;
			}

		
		
	}
	
?>