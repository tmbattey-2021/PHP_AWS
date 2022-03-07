<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=TEST_TMB', 
   'tmb_remote', 'darwin01');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



