<?php

include_once('datos.php');
include_once('meekrodb.2.3.php');

DB::$user = $datos['user'];
DB::$password = $datos['pass'];
DB::$dbName = $datos['db'];
DB::$host = $datos['host'];
