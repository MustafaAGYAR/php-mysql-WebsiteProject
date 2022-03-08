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
                        <form action="islem2.php" method="POST">
                        <?php 
                                // if ($_GET['durum']=="ok") {
                                    
                                //     echo "İşlem başarılı";

                                // } elseif ($_GET['durum']=="no") {

                                //     echo "İşlem başarısız";
                                // }

                            ?>
                            <table border="1" id="" style="width:40%px; margin-left: 500px; background-color:peru;">
                            <caption id="" style="background-color: silver; margin-top: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ŞUBE EKLE</caption>
                            
                            <tr><td>Şube Adı:<td><input style="width:250px; text-align:center;" type="string" required="" name="subeAd" placeholder="Şube Adını Giriniz..."></td></tr>
                            <tr><td>Şirket ID:<td><select style="width:250px; text-align:center;" name="sirketID">
                            <option selected>1</option>
                            </select>
                            </td></tr>
                            <tr>
                            <td></td>
                            <td><button type="submit" name="subeEkle" style=" width: 70px;
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
                    <table border="2" id="" style="width:30%px; margin-left:489px; background-color:silver; ">
                        <caption class="" style="background-color:silver; margin-top:10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">ŞUBE BİLGİLERİ</caption>
                            <tr> 
                                <th>Sıra No</th>
                                <th>Şube ID</th>
                                <th>Şirket ID</th>
                                <th>Şube Adı</th>
                                
                            </tr> 
                            <!-- verileri tabloya listeleme -->
                            <?php
                            $bilgiSor=$db->prepare("SELECT * from sube");
                            $bilgiSor->execute();

                            $say=0;
                            while($bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>

                            <tr>
                                <td align="center"><?php echo $say; ?></td>
                                <td align="center"><?php echo $bilgiCek['subeID'] ?></td>
                                <td align="center"><?php echo $bilgiCek['sirketID'] ?></td>
                                <td align="center"><?php echo $bilgiCek['subeAd'] ?></td>
                                <td align="center"><a href="duzenle3.php?=<?php echo $bilgiCek['subeID'] ?>"><button>Düzenle</button></td></a>
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