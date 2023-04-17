<?php

    require_once "functions.php";

    $title = "prikaz";
    $table= 'artikal';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
     <link rel="stylesheet" href="style.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
          <?php
          
            require_once "nav.php";            

                if(isset($_GET['id'])){
                    $artikal_id = $_GET['id'];
                } else {
                    if(isset($_POST['artikal_id'])){
                        $artikal_id = $_POST['artikal_id'];
                    }
                }


                $q = "SELECT * 
                       FROM $table 
                       WHERE artikal.id=$artikal_id";

                $result = $mysqli->query($q) or die($mysqli->error);

                $row = $result->fetch_assoc();
                $naziv = $row['naziv'];   
                $cena = $row['cena'];
                
                
                

                    echo "
                            <form action= 'prikaz.php' method = 'POST'>
                           <div class='row prikaz'>
                            <div class='col-5'>
                                <img src='{$row['slika']}' class='uvelicano'>
                            </div>
                            
                            <div class='artikal_info col-4'>

                                <form method='post' id = 'cartForm'>
                                <div><h2>$naziv</h2></div>
                                
                                <div>
                                Izaberi veličinu:<br> ";
                                    
                                if($row['s'] == 1){
                                    echo "<input type='radio' name='velicina' id='' value='S' required>S";
                                }
                                if($row['m'] == 1){
                                    echo "<input type='radio' name='velicina' id='' value='M' required>M";
                                }
                                if($row['l'] == 1){
                                    echo "<input type='radio' name='velicina' id='' value='L' required>L";
                                }
                                if($row['xl'] == 1){
                                    echo "<input type='radio' name='velicina' id='' value='XL' required>XL";
                                }
                                if($row['xxl'] == 1){
                                    echo "<input type='radio' name='velicina' id='' value='2XL' required>2XL";
                                }
                                if($row['xxxl'] == 1){
                                    echo "<input type='radio' name='velicina' id='' value='3XL' required>3XL";
                                }
                                
                    echo "
                                    </div>
                                
                                    <div>
                                    Cena:<br>
                                    <p id='cena-info'>$cena RSD</p>
                                    </div>
                                    
                                    <input type='hidden' name= 'artikal_id' value='$artikal_id'>
                                    <button type='submit' class='btn-prikaz' onclick='openPopup()' name='add' id='btnForm'>Dodaj u korpu</button>
                                </form>
                            </div>
                        </div>
                        </form>"
                        ;
                    
            ?>
    

        <div class="popup "id="popup">
            <div class="scroll">
                <?php

                //novi kod


            //      if(isset($_POST['cartForm'])){
            //         echo "fsfds";

            //     $sql= "SELECT *
            //         FROM artikal
            //         INNER JOIN slika on artikal.id = slika.artikal_id
            //         WHERE artikal.id = $artikal_id";

            //     $result = $mysqli->query($sql) or die($mysqli->error);
            //     $artikal = $result->fetch_accos();

            //     $novi_artikal = array(
            //         'id' => $artikal['id'],
            //         'naziv' => $artikal['naziv'],
            //         'cena' => $artikal['cena'],
            //         // 'velicina' => $artikal['velicina'],
            //         'kolicina' => 1
            //     );

            //     $korpa = $_SESSION['korpa'];

            //     if(array_key_exists($artikal_id, $korpa)) {
            //         $korpa[$artikal_id]['kolicina'] += 1;
            //         echo "111111111111111111";
            //     } else {
            //         $korpa[$artikal_id] = $novi_artikal;
            //         echo "2222222222222222";
            //     }
                
            //     $_SESSION['korpa'] = $korpa;
                

            // }

            // if(isset($_SESSION['korpa'])) {
            //     $korpa = $_SESSION['korpa'];
            // } else {
            //     $korpa = array();
            //     $_SESSION['korpa']= $korpa;
            // }


                //stari kod

            if(isset($_SESSION['cart'])){
            echo "
            <div class='korpa-naziv'>
             Korpa
            </div>";

            
            if($_SESSION['cart'][0] == 0 ){
                $_SESSION['cart'][0] = $artikal_id;
            }
            
            $temp=0;
            foreach($_SESSION['cart'] as $key){
                if($key==$artikal_id)
                    $temp=1;
            }

            if($temp==0){
                array_push($_SESSION['cart'],$artikal_id);
                $count=count($_SESSION['cart']);
            }

            foreach($_SESSION['cart'] as $key=>$value){
                 // echo "<script>alert('Artikal je vec dodat u korpu!')</script>";
                 
                 $result = $mysqli->query("SELECT * FROM $table WHERE artikal.id=$value") or die($mysqli->error);
                 $row = $result->fetch_assoc();
                 $naziv = $row['naziv'];    
                 $cena= $row['cena'];
                //  $slika= $row['slika'];
                //  echo "$naziv";
                    echo "
                 <div class='popup-prikaz row'>
                    <div class='popup-slika col-4'>
                        <img src ='{$row['slika']}' >
                    </div>

                    <div class='popup-info col-8'>
                    
                            <p>$naziv<br>
                            $cena RSD</p>
                    </div>
                 </div>";
            
            }

            }
        ?>
        </div>
            <div class="cart-btn">
            <a href='cart.php' ><button class='korpa-bttn'>Idi u Korpu</button></a>
        </div>
    </div>  
        



 <script src="javascript.js"></script>
    <script>
        let popup=document.getElementById("popup");

        function openPopup(){
            popup.classList.add("open-popup");
        }
    </script>

    <script src="https://unpkg.com/babel-standalone"></script>

        <!-- <script src="javascript.js" type="text/jsx"></script> -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>