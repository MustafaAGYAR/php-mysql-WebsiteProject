<?php 

try {
	
	$db=new PDO("mysql:host=localhost;dbname=kargodb3;charset=utf8",'root','');

	//echo "Veritabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

	echo $e->getMessage();
}


?>