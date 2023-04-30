<?php
require ('connec.php');

$pdo = new PDO(DSN, USER, PASS);

if ($_POST) {
   
    $firstname = trim($_POST['firstname']); 
    $lastname = trim($_POST['lastname']);

    $query = 'INSERT INTO friend(lastname, firstname) VALUES (:nom, :prenom)';
    $statement = $pdo->prepare($query);


    $statement->bindValue(':prenom', $firstname, PDO::PARAM_STR);
    $statement->bindValue(':nom', $lastname, PDO::PARAM_STR);

    $statement->execute();
    
}
    $query = "SELECT * FROM friend";
    $statement = $pdo->query($query);
    $friends = $statement->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Liste Friends</h1>
    <ul>
    <?php
        foreach($friends as $friend)
        {
            echo '<li>' . $friend['firstname'] . " " . $friend['lastname'] . '</li>';

        }

   ?>
    </ul>
    <form  action=" "  method="POST">
        <div>
            <label  for="nom">Nom :</label>
            <input  type="text"  id="nom"  name="firstname" required >
        </div>
        <div>
            <label  for="prenom">Prénom :</label>
            <input  type="text"  id="nom"  name="lastname" required>
        </div>
        <button>submit</button>
    </form>
</body>
</html>