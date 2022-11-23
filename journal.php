<?php
 require('connexion.inc.php');
 $sql = "SELECT * FROM journal";
 $sth = $conn -> prepare($sql);
 $sth->execute();
 $pdo_sta = $sth->fetchAll(PDO::FETCH_ASSOC);

 $i = 0 ;
 if(!$pdo_sta){
    echo "echec de la requette";
}

echo "<table border='2'>";
while($i < count($pdo_sta)){
    echo "<tr>";
    foreach($pdo_sta[1] as $chp=>$val){
        echo "<td>$val</td>";
    }
    $i+=1;
    
    echo "</tr>";
}
echo "</table>";
?>