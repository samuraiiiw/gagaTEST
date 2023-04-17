<?php
    require_once "functions.php"; 

    $title = "Viktoria Style";
    $table = 'artikal';
    
    // $haljina= 'haljina';
    // $pantalone = 'pantalone';
?>

<html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$title";?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>

    <?php require_once "nav.php"; ?>
    
    <div class="row prikaz">

        <div class="kategorije col-3">
                <h2 style="margin-left: 10%;">Kategorije</h2>
                <ul>
                    <li>Bluza</li>
                    <li><?php echo "<a href='index.php?naziv=haljina'>Haljina</a>";?></li>  
                    <li>Kaput</li>
                    <li>Kombinezon</li>
                    <li><?php echo "<a href='index.php?naziv=pantalone'>Pantalone</a>"?></li>
                    <li>Suknja</li>
                    <li>Majica</li>
                </ul>
        </div>


        <div id="slike" class="slike col-9 row">
            <?php

            if(isset($_GET['naziv'])){
                $naziv=$_GET['naziv']; 

                        //filtriranje

                        if($naziv !='katalog'){
                            $nisa = $naziv;
                        } else {
                                $nisa = 'haljina';
                            }

            
                        //izbacivanje slika
        
                        $sql="SELECT * FROM $table WHERE nisa='{$nisa}'";
 
                        $result = $mysqli->query($sql) or die($mysqli->error);
                        
                        while ($row = $result->fetch_assoc()){
                            
                            if($row['s'] == 0 && $row['l'] ==0 && $row['xl']==0 && $row['xxl'] ==0 && $row['xxxl']==0) continue;  
        
                            echo  "<div class='oneimage col-4'>
                                        <a href='prikaz.php?id={$row['id']}' >
                                            <img src ='{$row['slika']}' >
                                            <p class='nazivArtikla'>{$row['naziv']}<br>
                                                                    {$row['cena']} RSD</p>
                                        </a>
                                     </div>";
                        }
                        
                } 
                else
                {
                    $nisa= 'haljina';

                    $sql="SELECT * FROM $table WHERE nisa='{$nisa}'";
 
                        $result = $mysqli->query($sql) or die($mysqli->error);
                        
                        while ($row = $result->fetch_assoc()){
                            
                            if($row['s'] == 0 && $row['l'] ==0 && $row['xl']==0 && $row['xxl'] ==0 && $row['xxxl']==0) continue;  
        
                            echo  "<div class='oneimage col-4'>
                                        <a href='prikaz.php?id={$row['id']}' >
                                            <img src ='{$row['slika']}' >
                                            <p class='nazivArtikla'>{$row['naziv']}</p>
                                        </a>
                                     </div>";
                        }
                }

            ?>

        </div>

        
        
    </div>


    <script src="index.js" type="text/jsx"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
</html>