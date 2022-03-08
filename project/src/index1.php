<?php 
ob_start();
session_start();
require 'baglan.php';

$kullSor=$db->prepare('SELECT * FROM kullanicilar where  kullaniciAd=:ad');
$kullSor->execute(array(
    'ad' => $_SESSION['username']
));
$kullCek=$kullSor->fetch(PDO::FETCH_ASSOC);

$db = new mysqli("localhost","root","","kargodb3");
$musteriSorgu = $db->prepare("SELECT COUNT(musteri.musteriID) musteriSayisi FROM musteri");
$musteriSorgu->execute();
$musteriSonuc = $musteriSorgu->get_result();
$musteriSayisi = $musteriSonuc->fetch_assoc();
$musteriSorgu->close();

$dagitimSorgu = $db->prepare("SELECT SUM(dagitim.dagitimMiktar) dagitimSayisi FROM dagitim");
$dagitimSorgu->execute();
$dagitimSonuc = $dagitimSorgu->get_result();
$dagitimSayisi = $dagitimSonuc->fetch_assoc();
$dagitimSorgu->close();

$subeSorgu = $db->prepare("SELECT COUNT(sube.subeID) subeSayisi FROM sube");
$subeSorgu->execute();
$subeSonuc = $subeSorgu->get_result();
$subeSayisi = $subeSonuc->fetch_assoc();
$subeSorgu->close();

$personelSorgu = $db->prepare("SELECT COUNT(personel.personelID) personelSayisi FROM personel");
$personelSorgu->execute();
$personelSonuc = $personelSorgu->get_result();
$personelSayisi = $personelSonuc->fetch_assoc();
$personelSorgu->close();
$db->close()
?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>X | KARGO</title>
        <meta charset="utf-8">
        <meta name="description" content="X Kargo">
        <meta name="keywords" content="X, Kargo">
        <meta name="googlebot" content="noarchive"/>
        <meta name="Revisit-After" content="1 days"/>
        <meta name="robots" content="index, contact"/>
        <meta name="copyright" content="2020-2021 Copyright | https://www.X.com"/>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="images/icon.jpg" type="image/x-icon">
    </head>
    <body>
        <div id="container">
            <header id="banner">
                
                <div id="logo">
                    <a href="#">
                        <img src="images/logo3.png" alt="Şirket Logosu" title="X Kargo">
                    </a>
                </div>


                <div id="profil">
                    <a href="#"> <img src="images/kullanıcı.png"  alt=""></a>
                </div>

                <div>
                <span style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size:18px; margin-top: 5px; margin-right:20px; float:right;">Hoş Geldin</span>
                <span style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; font-size:20px; margin:-95px; margin-top:24px; float:right;"><?php echo $kullCek['kullaniciAd'];?></span>
                </div>

            </header>

            <nav id="anaMenu">
                <ul>
                    
                    <div id="home">
                        <a href="index1.php">
                            <!-- <img src="images/home2.png" alt="" title="AnaSayfa"> -->
                        </a>
                    </div>
                
                    <li>
                        <a href="analiz.php"><img style="width:27px;" src="images/sütun.jpg " alt=""> COLUMN CHART</a> 
                    </li>
                
                    <li>
                        <a href="analiz1.php"><img style="width:28px;" src="images/pasta2.png" alt=""> PIE CHART</a> 
                    </li>

                    <li>
                        <a href="personel.php"><img style="width:25px;" src="images/personel.png" alt=""> PERSONEL TABLOSU</a>
                    </li>
                    
                    <li>
                        <a href="#"><img style="width:25px;" src="images/personel.png" alt=""> PERSONEL İŞLEM</a>
                    </li>

                    <li>
                        <a href="sube.php"><img style="width:14px;" src="images/şube.png" alt=""> ŞUBE TABLOSU</a>
                    </li>

                    <li>
                        <a href="#"><img style="width:14px;" src="images/şube.png" alt=""> ŞUBE İŞLEM</a>
                    </li>

                    <li>
                        <a href="musteri.php"><img style="width:15px;" src="images/müşteri.jpg" alt=""> MÜŞTERİ TABLOSU</a>
                    </li>

                    <li>
                        <a href="index.php"><img style="width:25px;" src="images/çıkış.png" alt="">ÇIKIŞ YAP</a>
                    </li>
                </ul>

            </nav>
            
            <section id="content">
                <div class="kutu">
                <div class="box" style="border:2px solid transparent;
                    background-color:rgba(0, 75, 154, 0.7);
                    color: #ffffff;
                    font-size: 16px;
                    line-height:30px;
                    padding: 15px ;
                    text-decoration: none;
                    text-shadow: none;
                    border-radius: 30px;
                    transition: 0.25s;
                    display: block;
                    width: 290px;
                    margin-top: 20px auto;
                    text-align: center;">
                <div class="inner">
                <p><b>Toplam Müşteri</b></p>
                <h3><?php echo $musteriSayisi["musteriSayisi"]; ?></h3>
                
                </div>
                </div>
                <div class="kutu1">
                <div class="box1" style="border:2px solid transparent;
                    background-color:rgba(255, 140, 140, 0.7);
                    color: #ffffff;
                    font-size: 16px;
                    line-height:32px;
                    padding: 15px ;
                    text-decoration: none;
                    text-shadow: none;
                    border-radius: 30px;
                    transition: 0.25s;
                    display: block;
                    width: 290px;
                    margin-top:20px;
                    text-align: center;">
                <div class="inner">
                <p><b>Toplam Dağıtım</b></p>
                <h3><?php echo $dagitimSayisi["dagitimSayisi"]; ?></h3>
                
                </div>
                </div>
                <div class="box2" style="border:2px solid transparent;
                    background-color:rgba(66, 111, 147, 0.6);
                    color: #ffffff;
                    font-size: 16px;
                    line-height: 32px;
                    padding: 15px ;
                    text-decoration: none;
                    text-shadow: none;
                    border-radius: 30px;
                    transition: 0.25s;
                    display: block;
                    width: 290px;
                    margin-top:20px;
                    text-align: center;">
                <div class="inner">
                <p> <b>Toplam Şube</b></p>
                <h3><?php echo $subeSayisi["subeSayisi"]; ?></h3>
               
                </div>
                </div>
                <div class="box3" style="border:2px solid transparent;
                    background-color:rgba(255, 27, 0, 0.5);
                    color: #ffffff;
                    font-size: 16px;
                    line-height:32px;
                    padding: 15px ;
                    text-decoration: none;
                    text-shadow: none;
                    border-radius: 30px;
                    transition: 0.25s;
                    display: block;
                    width: 290px;
                    margin-top:20px;
                    text-align: center;">
                <div class="inner"> 
                <p><b>Toplam Personel</b> </p>
                <h3><?php echo $personelSayisi["personelSayisi"]; ?></h3>
                
                </div>
            </section>

            
            <footer id="foot">
                <a href="index1.php">Anasayfa</a> |
                <a href="#">Versiyon 1.0.1</a> |
                <a href="#">Destek</a> |
                <a href="iletişim.php">İletişim</a>
                <br>
                <p class="kucukMetin">Tüm hakları saklıdır</p>
            </footer>

        </div>

    </body>
</html>