<?php
session_start();
include '../conexion.php';
include '../../class/global.php';

if (isset($_POST['action']) && $_POST['action'] == 'get_all_blog') {
    $result = Globales::getBlogAll();
    echo json_encode($result);
}