<?php
//aws mysql database
$pdo = new PDO('mysql:host=ls-25e22aea68953870fcc0d34c723d0d60e8a81892.cvwgk0rnptsm.us-east-1.rds.amazonaws.com;port=3306;dbname=dbmaster', 
  'dbmasteruser', 'Darwin01$');

//local sql
//$pdo = new PDO('mysql:host=localhost;port=3306;dbname=dbmaster', 
//   'tmbattey', 'darwin');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



