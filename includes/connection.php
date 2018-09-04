<?php
    $mysqlUserName      = "root";
    $mysqlPassword      = "";
    $mysqlHostName      = "localhost";
    $DbName             = "malika_db";
$con = mysqli_connect($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName);
if(!$con)
	die(mysqli_connect_error());

mysqli_query ($con, "set character_set_results='utf8'");
					mysqli_query($con, 'SET character_set_results=utf8');
					mysqli_query($con, 'SET names=utf8');
					mysqli_query($con, 'SET character_set_client=utf8');
					mysqli_query($con, 'SET character_set_connection=utf8');
					mysqli_query($con, 'SET character_set_results=utf8');
					mysqli_query($con, 'SET collation_connection=utf8_general_ci');
					?>