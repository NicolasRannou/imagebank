<?php        
        // parse file to get password
        $cnf = parse_ini_file(".my.cnf");
        
        //connect to DB with info from my.conf
        try
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO("mysql:host=".$cnf['host'].";dbname=".$cnf['database'],
                           $cnf['user'],$cnf['password'], $pdo_options);
            
            // insert new user
            //$reponse = $bdd->query('CREATE TABLE users (id  int NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(32), email VARCHAR(32), password VARCHAR(32));');
            $reponse = $bdd->query("INSERT INTO users(name, email, password) VALUES('nicol2as2', 'nico2lasemail2', 'password22')");
            
            // On affiche chaque entrée une à une
            while ($donnees = $reponse->fetch())
            {
                echo '-'.$donnees[Tables_in_imagebank];
            }
    
            $reponse->closeCursor(); // Termine le traitement de la requête
            
            //back to main page
            header('Location: admin.php');
        }
        catch (Exception $e)
        {
            die('Error : ' . $e->getMessage());
        }
?>
