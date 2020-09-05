<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
   <?php
        if(isset($_GET["Id"])){
          try{
                 $id = $_GET["Id"];
        
                  
                 include("Config/connect.php");
                  $query = "SELECT Title, Body FROM blogtable WHERE Id = ? LIMIT 0,1";
                  $stmt = $conn->prepare($query);
                  $stmt->bindParam(1, $id);
                  $stmt->execute();
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  $title = $row["Title"];
                  $body = $row["Body"];

                  echo"<div><h1>{$title}</h1></div>";
                 echo"<div><h1>{$body}</h1></div>";
            }
        catch(PDOExcetion $e){
             die('ERROR: '.$e->getMessage());
            }
        }

        else{
          die("ERROR: ID NOT FOUND");
        };
      
   ?>
</body>
</html>