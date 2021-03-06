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
            text: "Buca ??ubesi Ayl??k Da????t??m Hizmeti"
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
            text: "Konak ??ubesi Ayl??k Da????t??m Hizmeti"
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
            text: "Bornova ??ubesi Ayl??k Da????t??m Hizmeti"
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
            text: "Urla ??ubesi Ayl??k Da????t??m Hizmeti"
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
                        <img src="images/logo3.png" alt="??irket Logosu" title="X Kargo">
                    </a>

                    <form action="analizRapor.php" method="POST">
                    <select style=" 
                                background-color:black;
                                color: white; margin-left:600px; margin-top:240px;" name="subeler">
                            <option>Buca Analiz Raporu</option>
                            <option>Bornova Analiz Raporu</option>
                            <option>Konak Analiz Raporu</option>
                            <option>Urla Analiz Raporu</option>
                            <option selected>Analiz Raporu Se??in</option>
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
                                <p><b>Panele D??n</b></p>
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

                        var baslik="Yeni ??ube A??ma Olumlu!";
                        var icerik="";
                        
                        $("#sonuc").click(function(){
                            // swal("Yeni ??ube A??ma Olumlu!", "En Yo??un ??ube, Buca ??ubesi!", "success")
                            swal({
                            title: "Buca ??ubesi Analiz!",
                            text: "En Yo??un, En Ba??ar??l?? Da????t??m Performans??na sahip ??ube, Buca ??ubesi!",
                            icon:"info",
                            button:"Sonu??"
                            })
                        
                        .then((value) => {

                            swal(baslik,icerik,"success");
                        });
                        
                        });
                    </script>

                    <script type="text/javascript">

                        $("#sonuc1").click(function(){
                            // swal("??stikrarl?? ??lerleme!", "Yeni ??ube A??ma Yak??nd??r!", "info")
                            swal({
                            title: "??stikrarl?? ??lerleme!",
                            text: "Yeni ??ube A??ma Yak??nd??r!",
                            icon:"info",
                            button:"Kapat"
                            });
                        });
                    </script>

                    <script type="text/javascript">

                    $("#sonuc2").click(function(){
                        // swal("Bat??yoruz!", "En Az Da????t??m sa??layan ??ube Urla ??ubesidir. Urla ??ubesi Kapat??lmas?? ??nerilmektedir!", "error")
                        swal({
                            title: "Bat??yoruz!",
                            text: "En Az Da????t??m sa??layan ??ube Urla ??ubesidir. ??yile??tirilmeye Gidilmeli Ya da Urla ??ubesi Kapat??lmas?? ??nerilmektedir!",
                            icon:"error",
                            button:"Kapat"
                            });
                    });
                    </script>

                    <script type="text/javascript">

                    $("#sonuc3").click(function(){
                        // swal("Da????t??mlar??n Artt??r??lmas?? Gerek!", "Yeni ??ubeye ??u Durumda Uza????z!", "warning")
                        swal({
                            title: "Da????t??mlar??n Artt??r??lmas?? Gerek!",
                            text: "Yeni ??ubeye ??u Durumda Uza????z!",
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
                <a href="ileti??im.php">??leti??im</a>
                <br>
                <p class="kucukMetin">T??m haklar?? sakl??d??r</p>
            </footer>
        </div>

    </body>
</html>