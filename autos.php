<?php
require_once "pdo.php";

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
   header('Location: index.php');
    return;
}
//$numErr = "";
//$successmess = "";

if ( isset($_POST['make']) && isset($_POST['year']) 
     && isset($_POST['mileage'])) 
{
     if (!(ctype_digit($_POST['year'])) || (!(ctype_digit($_POST['mileage']))))
     {
         $numErr = "Both year and mileage must be numeric";
 //        break;

     }
     else
     {
        try {
            $conn = $pdo;
            $mk = htmlspecialchars($_POST['make']);
            $yr = htmlspecialchars($_POST['year']);
            $mi= htmlspecialchars($_POST['mileage']);
            $sql = "INSERT INTO autos (make, year, mileage) VALUES ('$mk', '$yr', '$mi')";
            $conn->exec($sql);
            echo "New record created successfully";
          } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
          }
          
          $conn = null;





  
    }
}

$stmt = $pdo->query("SELECT make, year, mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
<head>
</head><body>
<div style="margin-left:20%;">   
<table border="1">
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
   echo($row['make']);
   echo("</td><td>");
   echo($row['year']);
    echo("</td><td>");
   echo($row['mileage']);
   echo("</td></tr>\n");                                                                                                                                                                                                     
}
?>
</div>

<?php require_once "bootstrap.php"; ?>
<?php
if ( isset($_REQUEST['name']) ) {
    echo "Tracking Autos for : ";
    echo htmlentities($_REQUEST['name']);
    echo "</p>\n";
}
?>

<html>                    
<head>
<title>Mell Battey</title>
</head>
<body>
</p><span class="error"><?php echo $successmess?></span>
<form method="post" >  

<p>Make:<input type="text" name = "make" size = "40"></p>
<p>Year:<input type="text" name = year></p>
<br>
<p>Mileage:<input type="text" name = mileage ></p><span class="error"><?php echo $numErr?></span>
</br>

<input type="submit" value="Add">
<input type="submit" name="logout" value="Logout">
</form>
<h2>Automobiles</h2>
<br>
<br>

</body>
</html>
 