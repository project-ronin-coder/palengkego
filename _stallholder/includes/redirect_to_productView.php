<?php
include '../../_session.php';

if (isset($_GET['redirect'])) {

  $stall_id = $_GET['stall_id'];

  header('location: ../products_view.php?id=' . $stall_id);
}