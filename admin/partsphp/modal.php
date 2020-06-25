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
        $produit = $_POST['produit'];

        if(empty($email)) {
            $status = "Veuillez entrer votre adresse courriel";
        }else {
            $sql = "INSERT INTO email_reservations (email, produit) VALUES (:email, :produit)";

            $stmt = $pdo->prepare($sql);

            $stmt->execute(['email' => $email, 'produit' => $produit]);

            $status = "Merci";
            $email = "";
        }
    }
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 class="modal-title" id="exampleModalLabel">Réserver</h5>
          <p>Veullez entrer votre adresse courriel pour réserver la <span class="produits-modal">"<?php echo $row["nom"];?>"</span>. Un courriel vous sera envoyé losrque le
            produit sera disponible</p>
          <form action="" method="POST">
            <input type="text" class="email" name="email" id="email" placeholder="Adresse courriel" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>"><br>
            <input type="submit" name="submit" class="btn" value="Réserver">
          </form>
        </div>
        <div class="modal-footer">
        <div>
            <p><?php echo $status?></p>
        </div>
        </div>
      </div>
    </div>
  </div>