<!DOCTYPE html>
<html lang = "en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Artist Results</title>
</head>
<body>
    <main role = "main" class ="container-fluid"> 
    <a href="show-SCartists.php">Back to Artist Catalog</a>
        <h1> Artist Results </h1>
        <?php 
            $searchtype = $_POST["searchtype"];
            $searchterm = trim ($_POST ["searchterm"]);
           // echo "$searchtype $searchterm";

            if (!$searchtype || !$searchterm){
                echo "You have not entered search details. Please try again.";
                exit;
            }

            $db = new mysqli('localhost', 'playlist_user1', 'playlistpass1', 'soundcloudDB');

            if ($db->connect_error){
                die("Connect error".$db->connect_errorno.":".$db->connect_error);

            }
            $query ="SELECT * FROM artists WHERE $searchtype LIKE '%$searchterm%'";
          //echo $query; 

            $result = $db->query($query);

            $num_results = $result -> num_rows;

            echo "<p>Number of songs found: $num_results</p>"; 
          

            for ($i =0; $i<$num_results; $i++){
                $row = $result->fetch_assoc();

                
                
                echo "<p><strong> Artist Name: ";
                echo $row["name"]."</strong><br/>";
                echo "Age: ".$row["age"]."<br/>";
                echo "Twitter: ".$row["social_media"]."<br/>";
                echo "label: ".$row["label"]."<br/>";
            

            }
            $result -> free();
            $db -> close();
            


            
          
         
            

        ?>
</body>
</html> 