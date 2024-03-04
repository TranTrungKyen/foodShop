<?php 
session_start();
require_once('../../db/config.php');
session_destroy();

header("Location: ". SITEURL);