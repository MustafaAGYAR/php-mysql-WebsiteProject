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
                            
                            <?php
                            $bilgiSor=$db->prepare("SELECT * FROM musteri WHERE musteriID=:ID");
                            $bilgiSor->execute(array(
                                'ID' => $_GET['musteriID']
                                
                            ));

                            $say=0;
                            $bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC);
                        
                            ?>

                        <form action="islem2.php" method="POST">
                            <table border="1" id="" style="width:40%px; margin-left: 450px; background-color:peru;">
                            <caption  style="background-color: silver; margin-top: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Müşteri Bilgileri Düzenle</caption>
                            <tr><td>İlçe ID:<td><select style="width:254px; text-align:center;" name="ilceID">
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            </select>
                            </td></tr>
                            <tr><td>Müşteri Adı:<td><input style="width:250px; text-align:center;" type="text" required="" name="musteriAd" value="<?php echo $bilgiCek['musteriAd'] ?>" style="text-align:center;"></td></tr>
                            <tr><td>Müsteri Soyadı:<td><input style="width:250px; text-align:center;" type="text" required="" name="musteriSoyAd" value="<?php echo $bilgiCek['musteriSoyAd'] ?>" style="text-align:center;"></td></tr>
                            <tr><td>Telefon:<td><input style="width:250px; text-align:center;" type="text" required="" name="musteriTel" value="<?php echo $bilgiCek['musteriTel'] ?>" style="text-align:center;"></td></tr>
                            <tr><td>Mail Adresi:<td><input style="width:250px; text-align:center;" type="text" required="" name="musteriMail" value="<?php echo $bilgiCek['musteriMail'] ?>" style="text-align:center;"></td></tr>
                            <tr>
                            <td></td>
                            <input type="hidden" value="<?php echo $bilgiCek['musteriID'] ?>" name="musteriID">
                            <td><button type="submit" name="updateislemi" style=" width: 70px;
                                                                                    height: 23px;
                                                                                    margin-left:100px;
                                                                                    background-color:white;
                                                                                    border-style: solid;
                                                                                    border-color: black;
                                                                                    border-radius: 2px;">Güncelle</td>
                            </tr>
                            </table>
	                    </form>

                        <table border="2" id="" style="width:30%px; margin-left:300px; background-color:silver; ">
                        <caption class="" style="background-color:silver; margin-top:10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">MÜŞTERİ BİLGİLERİ</caption>
                            <tr> 
                                <th>Sıra No</th>
                                <th>Müşteri ID</th>
                                <th>İlçe ID</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Telefon</th>
                                <th>e-Mail</th>
                                <th>İşlemler</th>
                                <th>İşlemler</th>
                            </tr> 
                            <!-- verileri tabloya listeleme -->
                            <?php
                            $bilgiSor=$db->prepare("SELECT * from musteri");
                            $bilgiSor->execute();

                            $say=0;
                            while($bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC)) { $say++ ?>

                            <tr>
                                <td align="center"><?php echo $say; ?></td>
                                <td align="center"><?php echo $bilgiCek['musteriID'] ?></td>
                                <td align="center"><?php echo $bilgiCek['ilceID'] ?></td>
                                <td align="center"><?php echo $bilgiCek['musteriAd'] ?></td>
                                <td align="center"><?php echo $bilgiCek['musteriSoyAd'] ?></td>
                                <td align="center"><?php echo $bilgiCek['musteriTel'] ?></td>
                                <td align="center"><?php echo $bilgiCek['musteriMail'] ?></td>
                                <td align="center"><a href="duzenle.php?musteriID=<?php echo $bilgiCek['musteriID'] ?>"><button>Düzenle</button></td></a>
                                <td align="center"><a href="islem2.php?musteriID=<?php echo $bilgiCek['musteriID'] ?>&bilgiSil=ok"><button>Kaydı Sil</button></td></a>
                            </tr>

                            <?php } ?>
                        
                    </table>
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