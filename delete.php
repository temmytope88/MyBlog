<?php
        if(isset($_GET["Id"])){
          try{
                 $id = $_GET["Id"];
        
                  
                 include("Config/connect.php");
                  $query =  "DELETE FROM blogtable WHERE Id = $id";
                  $stmt = $conn->prepare($query);
                  
                  $stmt->execute();

                  $_SESSION["delete"] = "deleted";
                  header("Location:Viewposts.php");
            }
        catch(PDOExcetion $e){
             die(
              $_SESSION["delete"] ='ERROR: '.$e->getMessage());
              header("Location:Viewposts.php");
            }   
        }

        else{
          $_SESSION["delete"] = "ERROR: Id not found";
          header("Location:Viewposts.php");
        };