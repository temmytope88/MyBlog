<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY POSTS</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <nav class="navbar navbar-light bg-light ">
                <div class="navbar-brand">
                    <h2>WAJAPA BLOG</h2>
                </div>
            </nav>
        </div>
        <?php 
            try{
                  include("Config/connect.php");
                  $query = "SELECT post_id, blog_title, blog_post, time_created, blogger FROM blogs ORDER BY post_id ASC";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  $num = $stmt->rowCount();
                  if($num>0){
                                echo "<table class='table table-striped '>";
                                    echo "<tr class='thead-dark'>";
                                       
                                        echo "<th>TITLE</th>";
                                        echo "<th>AUTHOR</th>";
                                        echo "<th>TIME CREATED</th>";
                                        echo "<th>ACTIONS</th>";
                                    echo "</tr>";
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $Id = $row["post_id"];
                                    $Title = $row["blog_title"];
                                    $TimeCreated = $row["time_created"];
                                    $blogger = $row["blogger"];
                                    echo "<tr>";
                                        
                                        echo "<td>{$Title}</td>";
                                        echo "<td>{$blogger}</td>";
                                        echo "<td>{$TimeCreated}</td>";
                                        echo "<td><button class='btn-success'><a style='color:white' href='read.php?Id={$Id}'>READ</a></button>";
                                    echo "</tr>";
                                }
                              echo"</table> <hr>";
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