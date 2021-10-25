<?php
    include 'parts/start_session.php';
    session_destroy();
    header('Location: index.php');
    exit();