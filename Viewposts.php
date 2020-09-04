<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY POSTS</title>
</head>
<body>
    <div class="container">
        <h1>
            MY BLOG POSTS
        </h1>
        <?php 
            try{
                  include("Config/connect.php");
                  $query = "SELECT Id, Title, TimeCreated FROM blogtable ORDER BY Id DESC";
                  $stmt = $conn->prepare($query);
                  $stmt->execute();
                  $num = $stmt->rowCount();
                  if($num>0){
                                echo "<table>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>TITLE</th>";
                                        echo "<th>TIME CREATED</th>";
                                        echo "<th>ACTIONS</th>";
                                    echo "</tr>";
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $Id = $row["Id"];
                                    $Title = $row["Title"];
                                    $TimeCreated = $row["TimeCreated"];
                                    echo "<tr>";
                                        echo "<td>{$Id}</td>";
                                        echo "<td>{$Title}</td>";
                                        echo "<td>{$TimeCreated}</td>";
                                        echo "<td><button><a href='read.php?={$Id}'>READ</a></button> <button><a href='update.php?={$Id}'>UPDATE</a></button> <button><a>DELETE</a></button></td>";
                                    echo "</tr>";
                                }
                              echo"</table>";
                  } 
                else{
                  "<div>NO DATA AVAILABLE</div>";
                }
            }    
            catch(PDOException $e){
              die('ERROR: '.$e->getMessage());

          }
         
        ?>
    </div>
</body>
</html>