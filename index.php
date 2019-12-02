<?php require("user.php"); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TPmysql</title>
</head>
<body>

<?php echo "Bonjour";

$User1 = new User();
$User1->setNom("Flemal");
// CODER$
?>
<form method="POST" action="">
    <input type="text" name="nom">
    <input type="text" name="mdp">
    <input type="submit" value="Valider">
</form>

<?php
    if (isset($_POST['nom'])){
        $isConnect = $User1->verifMpd($_POST['nom'],$_POST['mdp']);
        if($isConnect){echo "Vous êtes connecté";
        
            try{
               $DonneesBases=new PDO('mysql:host=192.168.65.204; dbname=Docteur; charset=utf8','FlaquetFlemal', 'FlaquetFlemal');
               echo "  select * from medicament" ;
               $ResultRequet = $DonneesBases->query("select * from medicament"); 
               echo "<table>";
               while ($Table = $ResultRequet->fetch())
                {
                    echo "<tr>";
                    echo '<td>'.$Table["codeSS"].' </td><td> '.$Table["nomcommer"].'</td>' ;
                    echo "<tr>";
                }
                $ResultRequet->closeCursor();
                echo "</table>";

            }
            catch (Exception $erreur){
                echo $erreur->getMessage();
             }
        
        }else{echo "erreur";}
    }           
?>      
</body>
</html>