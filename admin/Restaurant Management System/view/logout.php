<?php

require_once '../model/databasemodel.php';

session_start();
session_destroy();

header('location:../view/login_form.php');



?>