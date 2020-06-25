<?php
    include_once'../admin/partsphp/head.php';
    include_once'../admin/partsphp/function/connector.php';
    include_once'../admin/partsphp/function/products.php';

    $product_id = product_id($_GET["id"]); 
    $product = $product_id->fetch();

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "root";
    $dbName = "simsson_cire";

    try {
    $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
    $pdo = new PDO($dsn, $dbUser, $dbPassword);
    } catch(PDOException $e) {
    echo "erreur de connection " . $e->getMessage();
    }

    $status = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $desc1 = $_POST['desc1'];
        $desc2 = $_POST['desc2'];
        $desc3 = $_POST['desc3'];
        $desc4 = $_POST['desc4'];
        $desc5 = $_POST['desc5'];
        $id = $_GET['id'];

        if(empty($nom) || empty($prix) || empty($desc1)) {
            $status = "Tous les champs sont obligatoires";
        } else {
        if(strlen($nom) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $nom)) {
            $status = "Entrez un nom valide";
        }else {

            $sql = "UPDATE sub_disco_produits SET nom = :nom, prix = :prix, desc1 = :desc1, desc2 = :desc2, desc3 = :desc3, desc4 = :desc4, desc5 = :desc5 WHERE id = :id";

            $stmt = $pdo->prepare($sql);
      
            $stmt->execute(['nom' => $nom, 'prix' => $prix, 'desc1' => $desc1, 'desc2' => $desc2, 'desc3' => $desc3, 'desc4' => $desc4, 'desc5' => $desc5, 'id' => $id]);

            $status = "Merci";
            $nom = "";
            $prix = "";
            $desc1 = "";
            $desc2 = "";
            $desc3 = "";
            $desc4 = "";
            $desc5 = "";
    }
  }

}
?>

<header>
    <nav>
        <h1 class="logo"><a href="index.php">Simsson Cire</a></h1>
    </nav>
</header>
<main>
    <div class="container">
        <div>  
            <h2>Ajouter un produit</h2>
            <form class="form-add" action="" method="POST">
                <div>
                    <label for="nom">Nom du produit</label><br>
                    <input type="text" name="nom" id="nom" value="<?php echo $product["nom"];?>">
                </div>
                <div>
                    <label for="prix">Prix</label><br>
                    <input type="text" name="prix" id="prix" value="<?php echo $product["prix"];?>">
                </div>
                <div>
                    <label for="desc1">Description 1</label><br>
                    <textarea name="desc1" id="desc1" cols="20" rows="2" class="gt-input gt-text" value="<?php echo $product["desc1"];?>"><?php echo $product["desc1"];?></textarea>
                </div>
                <div>
                    <label for="desc2">Description 2</label><br>
                    <textarea name="desc2" id="desc2" cols="20" rows="2" class="gt-input gt-text" value="<?php echo $product["desc2"];?>"><?php echo $product["desc2"];?></textarea>
                </div>
                <div>
                    <label for="desc3">Description 3</label><br>
                    <textarea name="desc3" id="desc3" cols="20" rows="2" class="gt-input gt-text" value="<?php echo $product["desc3"];?>"><?php echo $product["desc3"];?></textarea>
                </div>
                <div>
                    <label for="desc4">Description 4</label><br>
                    <textarea name="desc4" id="desc4" cols="20" rows="2" class="gt-input gt-text" value="<?php echo $product["desc4"];?>"><?php echo $product["desc4"];?></textarea>
                </div>
                <div>
                    <label for="desc5">Description 5</label><br>
                    <textarea name="desc5" id="desc5" cols="20" rows="2" class="gt-input gt-text" value="<?php echo $product["desc5"];?>"><?php echo $product["desc5"];?></textarea>
                </div>


                <input type="submit" class="btn" value="Submit">

                <div class="">
                    <?php echo $status ?>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
  include_once'../admin/partsphp/foot.php';
?>