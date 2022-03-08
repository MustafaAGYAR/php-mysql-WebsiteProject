<?php
$dataPoints = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=kargodb1;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT dagitim.dagitimMiktar as y, dagitim.dagitimAy as x FROM dagitim WHERE dagitim.SubeID=10 ORDER BY dagitim.dagitimID DESC');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}

$dataPoints1 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=kargodb1;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT dagitim.dagitimMiktar as y, dagitim.dagitimAy as x FROM dagitim WHERE dagitim.SubeID=11 ORDER BY dagitim.dagitimID ');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints1, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}

$dataPoints2 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=kargodb1;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT dagitim.dagitimMiktar as y, dagitim.dagitimAy as x FROM dagitim WHERE dagitim.SubeID=12 ORDER BY dagitim.dagitimID DESC');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints2, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}

$dataPoints3 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=kargodb1;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT dagitim.dagitimMiktar as y, dagitim.dagitimAy as x FROM dagitim WHERE dagitim.SubeID=13 ORDER BY dagitim.dagitimID ');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints3, array("y"=> $row->y, "label"=> $row->x));
}
$link = null;
}
catch(\PDOException $ex){
print($ex->getMessage());
}
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
        <meta name="copyright" content="2020-2021 Copyright | https://www.yurticikargo.com"/>
        <link rel="icon" href="images/icon.jpg" type="image/x-icon">
        <link rel="stylesheet" href="style.css">
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <script>
            window.onload = function () {
            //3.grafik
            var chart = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Buca Şubesi Aylık Dağıtım Hizmeti"
            },
            data: [{
            type: "bar", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render(); 

            //4.grafik
            var chart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Konak Şubesi Aylık Dağıtım Hizmeti"
            },
            data: [{
            type: "column", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render(); 

            //5.grafik
            var chart = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Bornova Şubesi Aylık Dağıtım Hizmeti"
            },
            data: [{
            type: "bar", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render(); 

            //5.grafik
            var chart = new CanvasJS.Chart("chartContainer4", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark1", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Urla Şubesi Aylık Dağıtım Hizmeti"
            },
            data: [{
            type: "column", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
            }]
            });
            chart.render(); 


    }
    </script>
    </head>
    <body>
        <div id="container">
            <header id="banner">

                <div id="logo">
                    <a href="#">
                        <img src="images/logo3.png" alt="Şirket Logosu" title="X Kargo">
                    </a>

                    <form action="analizRapor.php" method="POST">
                    <select style=" 
                                background-color:black;
                                color: white; margin-left:600px; margin-top:240px;" name="subeler">
                            <option>Buca Analiz Raporu</option>
                            <option>Bornova Analiz Raporu</option>
                            <option>Konak Analiz Raporu</option>
                            <option>Urla Analiz Raporu</option>
                            <option selected>Analiz Raporu Seçin</option>
                            </select>
                            <td></td>
                            <button  style="
                                background-color:black;
                                color: white; width:100px; margin-left:625px; margin-top:20px;" type="submit" name="insertislemi">Analiz Et</buton>
                    </form>
                </div>

                

                <!-- <div id="home22"> -->
                    <div>
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
                    </div>
                    
                <!-- </div> -->

            </header>


            <section id="content2">
                    <button style="
                                background-color:black;
                                color: white; margin-top:110px; margin-left:5px; " id="sonuc3">KONAK</button>
                    <div id="chartContainer1" style="height: 200px; width: 40%; margin-top: 30px; float:right; margin-right:30px;"></div>
                    <div id="chartContainer2" style="height: 200px; width: 40%; margin-top: 30px; float:left; margin-left:30px;"></div>
                    <div id="chartContainer3" style="width:40%; height:200px; float:left; margin-top:60px; margin-left:30px;"></div>
                    <div id="chartContainer4" style="width:40%; height:200px; float:right; margin-top:60px; margin-right:30px;" ></div>
            
                    <button style="
                                background-color:black;
                                color: white; margin-left:167px; " id="sonuc">BUCA</button>
                    <button style="
                                background-color:black;
                                color: white; margin-left:3px; " id="sonuc1">BORNOVA</button>
                    <button style="
                                background-color:black;
                                color: white; margin-top:230px; margin-left:90px; " id="sonuc2">URLA</button>
                    
                    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script type="text/javascript">
        
                    </script>

                    <script type="text/javascript">

                        var baslik="Yeni Şube Açma Olumlu!";
                        var icerik="";
                        
                        $("#sonuc").click(function(){
                            // swal("Yeni Şube Açma Olumlu!", "En Yoğun Şube, Buca Şubesi!", "success")
                            swal({
                            title: "Buca Şubesi Analiz!",
                            text: "En Yoğun, En Başarılı Dağıtım Performansına sahip Şube, Buca Şubesi!",
                            icon:"info",
                            button:"Sonuç"
                            })
                        
                        .then((value) => {

                            swal(baslik,icerik,"success");
                        });
                        
                        });
                    </script>

                    <script type="text/javascript">

                        $("#sonuc1").click(function(){
                            // swal("İstikrarlı İlerleme!", "Yeni Şube Açma Yakındır!", "info")
                            swal({
                            title: "İstikrarlı İlerleme!",
                            text: "Yeni Şube Açma Yakındır!",
                            icon:"info",
                            button:"Kapat"
                            });
                        });
                    </script>

                    <script type="text/javascript">

                    $("#sonuc2").click(function(){
                        // swal("Batıyoruz!", "En Az Dağıtım sağlayan Şube Urla Şubesidir. Urla Şubesi Kapatılması Önerilmektedir!", "error")
                        swal({
                            title: "Batıyoruz!",
                            text: "En Az Dağıtım sağlayan Şube Urla Şubesidir. İyileştirilmeye Gidilmeli Ya da Urla Şubesi Kapatılması Önerilmektedir!",
                            icon:"error",
                            button:"Kapat"
                            });
                    });
                    </script>

                    <script type="text/javascript">

                    $("#sonuc3").click(function(){
                        // swal("Dağıtımların Arttırılması Gerek!", "Yeni Şubeye Şu Durumda Uzağız!", "warning")
                        swal({
                            title: "Dağıtımların Arttırılması Gerek!",
                            text: "Yeni Şubeye Şu Durumda Uzağız!",
                            icon:"warning",
                            button:"Kapat"
                            });
                    });
                    </script>



                





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