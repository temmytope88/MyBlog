<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">  
  <link rel="stylesheet" href="css/style.css">
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
                  $query = "SELECT blog_title, blog_post, blogger FROM blogs WHERE post_id = ? LIMIT 0,1";
                  $stmt = $conn->prepare($query);
                  $stmt->bindParam(1, $id);
                  $stmt->execute();
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);
                  $title = $row["blog_title"];
                  $body = $row["blog_post"];
                  $blogger = $row["blogger"];

                  echo"<div class='container'>
                  <div class='header'>
                  <nav class='navbar navbar-light bg-light'>
                      <div class='navbar-brand'>
                          <h2>WAJAPA BLOG</h2>
                      </div>
                  </nav>
                  </div>
                    <table class='table '>
                    <tr class='thead-dark'>
                    <th><h3>BLOG POST</h3></th>
                    </tr></table>
                       <h3>Title: {$title}</h3>
                       <hr>
                       <p>{$body}</p>
                       <p>Author: {$blogger}</p>
                       <hr>
                       <button class='btn btn-danger'><a style='color:white' href='dashboard.php'>Back</a></button>
                  </div>";
                  
                 
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