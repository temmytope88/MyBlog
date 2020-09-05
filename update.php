<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <div><h1>UPDATE POST</h1></div>
   <?php
        
       if(isset($_GET["Id"]) &&  isset($_POST["body"])){
                     
                         include("Config/connect.php");

                      try{
                          $id = $_GET["Id"];
                          $title = $_POST["title"];
                          $body = $_POST["body"];
                          $date = date("Y-m-d H:i:s");
                          
                          $query = " UPDATE blogtable  SET Title='$title', Body='$body', TimeCreated='$date' WHERE Id = $id" ;
                          $stmt = $conn->prepare($query);

                          if($stmt->execute()){
                              echo"<div>Record save</div>";
                          }
                          else{
                              echo"<div>Unable to save</div>" ;
                          }
                      }
                      catch(PDOException $e){
                          echo"fail<br>";
                          die('ERROR: '.$e->getMessage());

                      }
      }
     
      else if(isset($_GET["Id"])){
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
                            echo"<form action={$_SERVER["PHP_SELF"]}?Id={$id} method = 'post'>";
                              echo"<p>";
                                echo"<label>Title</label><br>";
                                echo"<input type='text' name = 'title' value={$title}>";
                              echo "</p>";
                              echo"<p>";
                                echo"<label>Body</label><br>";
                                echo"<textarea name='body'>{$body}</textarea>";
                              echo"</p>";
                              echo"<p>";
                                echo "<button>Update</button>";
                              echo"</p>";
                            echo"</form>";
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