<?php 
  session_start();
  include("sessions/errorsession.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY POSTS</title>
</head>
<body>
    <div class="container">
        <h1>
            WAJAPA BLOG
        </h1>
        <?php 
           success();
           error();
        ?>
        <?php 
            try{
                  include("Config/connect.php");
                  $author= $_SESSION["name"];
                  $query = "SELECT post_id, blog_title, time_created FROM blogs WHERE blogger = '$author' ORDER BY post_id ASC";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  $num = $stmt->rowCount();
                  if($num>0){
                                echo "<table class='table table-striped'>";
                                    echo "<tr class='thead-dark'>";
                                       
                                        echo "<th>TITLE</th>";
                                        echo "<th>TIME CREATED</th>";
                                        echo "<th>ACTIONS</th>";
                                    echo "</tr>";
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $Id = $row["post_id"];
                                    $Title = $row["blog_title"];
                                    $TimeCreated = $row["time_created"];
                                    echo "<tr>";
                                        
                                        echo "<td>{$Title}</td>";
                                        echo "<td>{$TimeCreated}</td>";
                                        echo "<td><button class='btn-success'><a style='color:white' href='read.php?Id={$Id}'>READ</a></button> <button class='btn-primary'><a style='color:white' href='update.php?Id={$Id}'>UPDATE</a></button>  
                                        <button class='btn-danger'><a style='color:white' href='delete.php?Id={$Id}'>DELETE</a></button></td>";
                                    echo "</tr>";
                                }
                              echo"</table><hr>";
                              echo"<button class='btn btn-danger'><a href='index.php' style='color:white'>Back</a></button>";
                  } 
                else{
                  echo"<div>NO DATA AVAILABLE</div>";
                }
            }    
            catch(PDOException $e){
              die('ERROR: '.$e->getMessage());

          }
         
        ?>
    </div>
</body>
</html>