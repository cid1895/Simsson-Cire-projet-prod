<?php
  include_once'./partsphp/head.php';
  include_once'./partsphp/function/connector.php';
  include_once'./partsphp/function/products.php';
?>
  <header>
    <nav>
      <h1 class="logo"><a href="#">Simsson Cire</a></h1>
    </nav>
    <div class="hero-banner">
      <div class="container">
        <p class="slogan">Pour une sensation<br>de propreté propre.</p>
      </div>
    </div>
  </header>
  <main>
    <section id="description">
      <div class="container">
        <h2 class="h2">Sub-discombobulateur<br>Atomique</h2>
        <p class="description">Le Sub-discombobulateur Atomique sert à nettoyer l'air
          ambiant autour d'un joueur suite à une détéléportation... Pour une sensation
          de propreté propre. Selon monsieur Cire co-fondateur de l'entreprise: <i>"C'est un produit qui ne sert à
            rien et qui coute cher, nous allons devenir RICHE!"</i>>.</p>
      </div>
    </section>
    <section id="citation">
      <div class="container">
        <p class="citation">“Steve Jobs a vendu des ordinateurs en plastique coloré, nous ne vendons pas grand-chose de
          couleur!”</p>
        <h4 class="auteur">Madame Simsonne - co-fondatrice</h4>
      </div>
    </section>
    <section id="produit">
      <div class="container">
        <h2 class="h2">Nos produits</h2>
        <div class="row">
        <?php
          $requete = all_products();
          foreach($requete as $row){
        ?>
          <div class="col-lg-4 col-md-6 col-s-12">
            <div class="shadow">
              <div>
                <img src="img/<?php echo $row["img"];?>.jpg" alt="">
              </div>
              <div class="text-card">
                <h3><?php echo $row["nom"];?></h3>
                <span><?php echo $row["prix"];?></span>
                <ul>
                  <li><?php echo $row["desc1"];?></li>
                  <li><?php echo $row["desc2"];?></li>
                  <li><?php echo $row["desc3"];?></li>
                  <li><?php echo $row["desc4"];?></li>
                  <li><?php echo $row["desc5"];?></li>
                </ul>
              </div>
            </div>
          </div>

         
          
          <?php
            }
          ?>


        </div>
      </div>
    </section>
    <section id="reserver">
      <div class="container">
      <h2 class="h2">Réserver</h2>
        <p>Veullez entrer votre adresse courriel et le produit que vous désirez. Un courriel vous sera envoyé losrque le
            produit sera disponible</p>
        <form action="" method="POST">   
          <?php
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
                
                $email = $_POST['email'];
                $produit = $_POST['product'];
        
                if(empty($email)) {
                    $status = "Veuillez entrer votre adresse courriel";
                }else {
                    $sql = "INSERT INTO email_reservations (email, produit) VALUES (:email, :produit)";
        
                    $stmt = connect()->prepare($sql);
        
                    $stmt->execute(['email' => $email, 'produit' => $produit]);
        
                    $status = "Merci";
                    $email = "";
                }
            }
          ?>     
          <input type="text" class="email" name="email" id="email" placeholder="Adresse courriel" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>"><br>
          <select name="product" id="product">
            <?php
              $requete = all_products();
              foreach($requete as $row){
            ?>
              <option value="<?php echo $row["nom"];?>"><?php echo $row["nom"];?></option>
            <?php
              }
            ?>
          </select><br>
          <input type="submit" name="submit" class="btn" value="Réserver">
        </form>
      </div>
    </section>
  </main>
  <footer>
    <p>Site réalisé par Cédric Marcoux - 2020</p>
  </footer>

<?php
  include_once'./partsphp/foot.php';
?>
  