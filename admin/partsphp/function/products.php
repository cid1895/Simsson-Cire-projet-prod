<?php
    function all_products(){
        $conn = connect();
        try{
            $requete = $conn->query('SELECT * from sub_disco_produits');
            return $requete -> fetchAll();
        }catch( PDOException $e ){
            echo 'Erreur'. $e -> getMessage();
        }
        $conn = null;
    }

    function product_id($id){
        $conn = connect();
        try{
            $requete = $conn->prepare("SELECT * FROM sub_disco_produits WHERE id = :id");
            $requete ->execute([":id"=>$id]);
            return $requete;
        }catch( PDOException $e ){
            echo 'Erreur'. $e -> getMessage();
        }
        $conn = null;
      }
?>