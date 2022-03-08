
<?php require_once 'baglan.php'; ?>
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
        <meta name="copyright" content="2020-2021 Copyright | https://www.yurticikargo.com"/>
        <link rel="icon" href="images/icon.jpg" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div id="container">
            <header id="banner">
                
                <div id="logo">
                    <a href="#">
                        <img src="images/logo3.png" alt="Şirket Logosu" title="X Kargo">
                    </a>
                </div>

                
                <!-- <div id="home22"> -->
                <a href="index1.php">
                        <!-- <img src="images/home2.png" alt="" title="AnaSayfa"> -->
                        <div class="butonx" style="border:2px solid transparent;
                                background-color:black;
                                color: white;
                                font-size: 15px;
                                line-height: 10px;
                                padding: 10px ;
                                text-decoration: none;
                                text-shadow: none;
                                border-radius: 3px;
                                width: 100px;
                                text-align: center;
                                margin-top:15px;
                                float: right;
                                position: relative;
                                right: 20px;">
                                <div class="inner">
                                <p><b>Panele Dön</b></p>
                            </div>
                        </div>
                    </a>
                <!-- </div> -->



        

            </header>

        
            
            <section id="content2">
            <!-- <input type="text" required="" name="ilceID" placeholder="Şube ID Giriniz..." style="text-align:center;"> -->
                    <?php 
                  
                        error_reporting(0); 
                            
                                if ($_GET['durum']=="ok") {?>
                                    
                                <b style="color:green; margin-left:600px;">İşlem başarılı..</b>

                                <?php } elseif ($_GET['durum']=="no") {?>

                                <b style="color:red;  margin-left:600px;">İşlem başarısız..</b>

                                <?php }
                                ?>
                        <form action="islem2.php" method="POST">
                        
                                

                            <table border="1" id="" style="width:40%px; margin-left: 450px; background-color:peru;">
                            <caption id="" style="background-color: silver; margin-top: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">PERSONEL EKLE</caption>
                            <tr><td>Şube ID:<td><select style="width:254px; text-align:center;" name="subeID">
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option selected></option>
                            </select>
                            </td></tr>
                            <tr><td>Personel TC:<td><input style="width:250px; text-align:center;" type="number" required="" name="personelTc" placeholder="TC kimlik no Giriniz..."></td></tr>
                            <tr><td>Personel Ad:<td><input style="width:250px; text-align:center;" type="text" required="" name="personelAd" placeholder="Adını Giriniz..." ></td></tr>
                            <tr><td>Personel Soydı:<td><input style="width:250px; text-align:center;" type="text" required="" name="personelSoyAd" placeholder="Soyadını Giriniz..." ></td></tr>
                            <tr><td>Personel Tel:<td><input style="width:250px; text-align:center;" type="number" required="" name="personelTel" placeholder="Telefon Giriniz..." ></td></tr>
                            <tr><td>Mail Adresi:<td><input style="width:250px; text-align:center;" type="text" required="" name="personelMail" placeholder="Mail Adresini Giriniz..."></td></tr>
                            <tr><td>Görev ID:<td>  <select  type="number" style="width:254px; text-align:center;" name="gorevID">
                            <option>1</option>
                            <option>2</option>
                            <option selected></option>
                            </select>        
                            </td></tr>
                            <tr><td>Dağıtım Hız Performans:<td><input style="width:250px; text-align:center;" type="number" required="" name="dagitimHiz" placeholder="Hız Performansını Giriniz..."></td></tr>
                            <tr><td>Satış ve Anlaşma Sayısı:<td><input style="width:250px; text-align:center;" type="number" required="" name="anlasmaSayisi" placeholder="Anlaşma Sayısını Giriniz..."></td></tr>
                            
                            <tr>
                            <td></td>
                            <td><button type="submit" name="insertİslemi" style=" width: 70px;
                                                                                    height: 23px;
                                                                                    margin-left:54px;
                                                                                    background-color:white;
                                                                                    border-style: solid;
                                                                                    border-color: black;
                                                                                    border-radius: 2px;" >Kaydet</button> 
                                                                                    <button style=" width: 70px;
                                                                                                    height: 23px;
                                                                                                    
                                                                                                    background-color:white;
                                                                                                    border-style: solid;
                                                                                                    border-color: black;
                                                                                                    border-radius: 2px;" type="reset">Temizle</button></td>
                            </tr>
                            </table>

	                        </form>

                        <table border="2" id="" style="width:30%px; margin-left:180px; background-color:silver; ">
                        <caption class="" style="background-color:silver; margin-top:10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">PERSONEL BİLGİLERİ</caption>
                            <tr style="color:brown;"> 
                                <th>Sıra No</th>
                                <th>Personel ID</th>
                                <th>Sube ID</th> 
                                <th>Personel TC</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Telefon</th>
                                <th>e-mail</th>
                                <th>Görev ID</th>
                                <th>Hız Performansı</th>
                                <th>Anlaşma Sayısı</th>
                                <th>İşlemler</th>
                            </tr> 
                            <!-- verileri tabloya listeleme -->
                            <?php
                            $bilgiSor=$db->prepare("SELECT * from personel");
                            $bilgiSor->execute();

                            $say=0;
                            while($bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>

                            <tr style="color:;">
                                <td align="center"><?php echo $say; ?></td>
                                <td align="center"><?php echo $bilgiCek['personelID'] ?></td>
                                <td align="center"><?php echo $bilgiCek['subeID'] ?></td>
                                <td align="center"><?php echo $bilgiCek['personelTc'] ?></td>
                                <td align="center"><?php echo $bilgiCek['personelAd'] ?></td>
                                <td align="center"><?php echo $bilgiCek['personelSoyAd'] ?></td>
                                <td align="center"><?php echo $bilgiCek['personelTel'] ?></td>
                                <td align="center"><?php echo $bilgiCek['personelMail'] ?></td>
                                <td align="center"><?php echo $bilgiCek['gorevID'] ?></td>
                                <td align="center"><?php echo $bilgiCek['dagitimHiz'] ?></td>
                                <td align="center"><?php echo $bilgiCek['anlasmaSayisi'] ?></td>
                                <td align="center"><a href="duzenle2.php?personelID=<?php echo $bilgiCek['personelID'] ?>"><button>Düzenle</button></td></a>
                            </tr>

                            <?php } ?>
                        
                    </table>
                   
                
                            
                        <?php
                            // $bilgiSor=$db->prepare("SELECT * from musteri");
                            // $bilgiSor->execute();

                            // $bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC);

                            // echo "<pre>";
                            // print_r($bilgiCek);
                            // echo "</pre>";

                            // echo "<br>";
                            // echo $bilgiCek['musteriAd'];
                            // echo $bilgiCek['musteriSoyAd']

                            //Select İşlemi
                            // $bilgiSor=$db->prepare("SELECT * from musteri");
                            // $bilgiSor->execute();

                            // while($bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC)) {
                            //     echo $bilgiCek['musteriID']; 
                            //     echo $bilgiCek['ilceID']; echo "<br>";
                            //     echo $bilgiCek['musteriAd']; echo "<br>";
                            //     echo $bilgiCek['musteriSoyAd']; echo "<br>";
                            //     echo $bilgiCek['musteriTel']; echo "<br>";
                            //     echo $bilgiCek['musteriMail']; echo "<br>";
                            // }

                        ?> 
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