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
                            $bilgiSor=$db->prepare("SELECT * FROM personel WHERE personelID=:ID");
                            $bilgiSor->execute(array(
                                'ID' => $_GET['personelID']
                                
                            ));

                            $say=0;
                            $bilgiCek=$bilgiSor->fetch(PDO::FETCH_ASSOC);
                        
                            ?>
                        <form action="islem2.php" method="POST">
                            <table border="1" id="" style="width:40%px; margin-left: 450px; background-color:peru;">
                            <caption id="" style="background-color: silver; margin-top: 10px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">PERSONEL BİLGİLERİ DÜZENLE</caption>
                            <tr><td>Şube ID:<td><select style="width:254px; text-align:center;" name="subeID">
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option selected></option>
                            </select>
                            </td></tr>
                            <tr><td>Personel TC:<td><input style="width:250px; text-align:center;" type="number" required="" name="personelTc" value="<?php echo $bilgiCek['personelTc'] ?>"></td></tr>
                            <tr><td>Personel Ad:<td><input style="width:250px; text-align:center;" type="text" required="" name="personelAd" value="<?php echo $bilgiCek['personelAd'] ?>" ></td></tr>
                            <tr><td>Personel Soyadı:<td><input style="width:250px; text-align:center;" type="text" required="" name="personelSoyAd" value="<?php echo $bilgiCek['personelSoyAd'] ?>" ></td></tr>
                            <tr><td>Personel Tel:<td><input style="width:250px; text-align:center;" type="number" required="" name="personelTel" value="<?php echo $bilgiCek['personelTel'] ?>" ></td></tr>
                            <tr><td>Mail Adresi:<td><input style="width:250px; text-align:center;" type="text" required="" name="personelMail" value="<?php echo $bilgiCek['personelMail'] ?>"></td></tr>
                            <tr><td>Görev ID:<td><input style="width:250px; text-align:center;" type="number" required="" name="gorevID" value="<?php echo $bilgiCek['gorevID'] ?>"></td></tr>
                            <tr><td>Dağıtım Hız Performans:<td><input style="width:250px; text-align:center;" type="number" required="" name="dagitimHiz" value="<?php echo $bilgiCek['dagitimHiz'] ?>"></td></tr>
                            <tr><td>Satış ve Anlaşma Sayısı:<td><input style="width:250px; text-align:center;" type="number" required="" name="anlasmaSayisi" value="<?php echo $bilgiCek['anlasmaSayisi'] ?>"></td></tr>
                            
                            <tr>
                            <td></td>
                            <input type="hidden" value="<?php echo $bilgiCek['personelID'] ?>" name="personelID">
                            <td><button type="submit" name="updateİslem" style=" width: 70px;
                                                                                    height: 23px;
                                                                                    margin-left:90px;
                                                                                    background-color:white;
                                                                                    border-style: solid;
                                                                                    border-color: black;
                                                                                    border-radius: 2px;" >Güncelle</button>
                            </table>

	                        </form>
                        

                            <table border="2" id="" style="width:30%px; margin-left:160px; background-color:silver; ">
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
                                <td align="center"><a href="islem2.php?personelID=<?php echo $bilgiCek['personelID'] ?>&bilgiSiL=ok"><button>Kaydı Sil</button></td></a>
                            </tr>

                            <?php } ?>
                        
                    </table>
                
                
                            
                        <?php
                        
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