<?php
$dsn = 'mysql:dbname=thehomeofvolunteers;host=10.130.11.146';
$user = 'userA76';
$password = '5xHrGB3ScWVYRm5J';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
if(isset($_GET)){
    foreach ($dbh->query("SELECT * FROM stars WHERE id=$_GET[id]") as $row) {
        echo $row['star'];
    }
}else if(isset($_POST)){
    $dbh->exec("UPDATE stars SET star=star+1 WHERE id=$_POST[id]");
    foreach ($dbh->query("SELECT * FROM stars WHERE id=$_POST[id]") as $row) {
        echo $row['star'];
    }
}
