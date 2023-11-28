<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $units = $_POST['units'];
    $type = $_POST['type'];
    $rate = ($type === 'residential') ? 5 : 7;
    $billAmount = $units * $rate;
    echo "<p>Your Electricity Bill is: $billAmount</p>";
} else {
        echo "Invalid Request";
}
?>
