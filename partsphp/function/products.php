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
?>