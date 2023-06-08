<header>
    <nav>
        <img src="../media/logo.png" alt="square logo" href="../accueil.php">
        <ul>
            <?php
            if($_SESSION['type']=="client"){
                include 'header-client.php';
            }elseif($_SESSION['type']=="technicien"){
                include 'header-client.php';
            }elseif($_SESSION['type']=="admin"){
                include 'header-client.php';
            }
             ?>
            <li><a href="#">Se déconnecter</a></li>
        </ul>
    </nav>
    
</header>
