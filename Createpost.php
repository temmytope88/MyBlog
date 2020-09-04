<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CREATE POST</title>
</head>
<body>
   <div class="container">
        <div>
           <h1>
               Create Post
           </h1>
        </div>
        <?php
            if($_POST){
                include("Config/connect.php");

                try{
                    $query = "INSERT INTO blogtable (Title, Body) VALUES (:title, :body)";
                    $stmt = $conn->prepare($query);

                    $title = $_POST["title"];
                    $body = $_POST["body"];

                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':body', $body);
                    
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
        ?>
        <form action= "<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                <p>
                    <label for="Title" >Title</label><br>
                    <input type="text" name="title" id="" placeholder="title">
                </p>
                <p>
                    <label for="">Body</label><br>
                    <textarea name="body" placeholder="Enter Your Message"></textarea>
                </p>
                <p>
                    <button type="submit">Submit</button>
                </p>
            </form>      
   </div>

    
</body>
</html>