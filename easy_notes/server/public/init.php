<?php
error_reporting(0);

require_once('config.php');
require_once('lib.php');

session_save_path(TEMP_DIR);
session_start();