<?php
  include_once'../admin/partsphp/head.php';
  include_once'../admin/partsphp/function/connector.php';
  include_once'../admin/partsphp/function/products.php';
?>
  <header>
    <nav>
      <h1 class="logo"><a href="#">Simsson Cire</a></h1>
    </nav>
  </header>
  <main>
    <div class="container">
      <h2>Produit Simsonn-Cire</h2>
      <a class="btn-success" href="add.php">Ajouter</a>
      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom du produit</th>
            <th scope="col">Image</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $requete = all_products();
              foreach($requete as $row){
            ?>
          <tr>
            <th scope="row"><?php echo $row["id"];?></th>
            <td><?php echo $row["nom"];?></td>
            <td><img src="../img/<?php echo $row["img"];?>.jpg" alt=""></td>
            <td><?php echo $row["prix"];?></td>
            <td>
              <ul>
                <li><?php echo $row["desc1"];?></li>
                <li><?php echo $row["desc2"];?></li>
                <li><?php echo $row["desc3"];?></li>
                <li><?php echo $row["desc4"];?></li>
                <li><?php echo $row["desc5"];?></li>
              </ul>
            </td>
            <td>
              <a class="btn-warning" href="update.php?id=<?php echo $row["id"];?>">Modifier</a>
              <a class="btn-danger" href="delete.php?id=<?php echo $row["id"];?>">Supprimer</a>
            </td>
          </tr>
            <?php
                }
            ?>
        </tbody>
      </table>
    </div>
  </main>
  <footer>
    <p>Site réalisé par Cédric Marcoux - 2020</p>
  </footer>

<?php
  include_once'../admin/partsphp/foot.php';
?>
  