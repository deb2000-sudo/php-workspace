<?php
// header.php - Contains a simple header function

function displayHeader($title) {
    echo "===== $title =====\n";
    echo "Header created on: " . date('Y-m-d') . "\n\n";
}
?>