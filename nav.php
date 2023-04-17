<link rel="stylesheet" href="index.css">

<h1 id="logo">Viktoria Style</h1>
        
<div class="nav-box">
<nav class="row" >
    <?php echo "<a class='col-3' href='index.php?naziv=katalog'>Kolekcija</a>";?>
        <a class="col-3" href="">O nama</a>
        <!-- <a class=" col-2   "href="">Prodajna mesta</a> -->
        <a class="col-3"href="">Pitajte nas</a>
        <a class="col-3"href="">Kontakt</a>
</nav>
</div>

    <a href="cart.php" class="cart">
        <h4 >
            <i class="bi bi-cart" id="cart"></i> Korpa
            <?php 
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo "<span>$count</span>";
                } 
                else 
                    echo "<span>0</span>";

            ?>
        </h4>
    </a>

