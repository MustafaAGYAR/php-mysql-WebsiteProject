<?php require_once 'baglan.php'; ?>

<?php
$dataPoints5 = array();
try{
$link = new \PDO( "mysql:host=localhost;dbname=kargodb3;charset=utf8",'root','',
array(
\PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);
$handle = $link->prepare('SELECT dagitim.dagitimAy as x, dagitim.dagitimMiktar as y
FROM dagitim
where dagitim.SubeID=13
ORDER BY dagitim.dagitimMiktar DESC
LIMIT 3');
$handle->execute();
$result = $handle->fetchAll(\PDO::FETCH_OBJ);
foreach($result as $row){
array_push($dataPoints5, array("y"=> $row->y, "label"=> $row->x));
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
            var chart = new CanvasJS.Chart("chartContainer6", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "dark2", // "light1", "light2", "dark1", "dark2"
            title:{
            text: "Urla Şubesi en fazla Dağıtım Sağlanan 3 AY"
            },
            data: [{
            type: "column", //change type to bar, line, area, pie, etc
            dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
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
            <div id="chartContainer6" style="height: 160px; width: 50%; margin-top: 150px; float:left; margin-left:350px;""></div>
            
            
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
























