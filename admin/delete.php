<?php
  include_once'../admin/partsphp/head.php';
  include_once'../admin/partsphp/function/connector.php';
  include_once'../admin/partsphp/function/products.php';

    $product_id = product_id($_GET["id"]); 
    $product = $product_id->fetch();


    $status = "";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM sub_disco_produits WHERE id = :id";
        $stmt = connect()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

    }
?>
<header>
    <nav>
        <h1 class="logo"><a href="#">Simsson Cire</a></h1>
    </nav>
</header>
<main>
    <div class="container">
        <div>  
            <h2>Supprimer un article</h2>
                <h3>Êtes-vous certain de vouloir supprimer ce produit?</h3>
                <p><?php echo $product['nom']?></p>
                <p><?php echo $product['prix']?></p>
                <div><img src="../img/<?php echo $product['img']?>.jpg" alt=""></div>
                <div>
                    <ul>
                        <li><?php echo $product["desc-1"];?></li>
                        <li><?php echo $product["desc-2"];?></li>
                        <li><?php echo $product["desc-3"];?></li>
                        <li><?php echo $product["desc-4"];?></li>
                        <li><?php echo $product["desc-5"];?></li>
                    </ul>
                </div>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
                <input type="submit" class="btn" value="Supprimer">

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