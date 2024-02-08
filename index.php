<?php
date_default_timezone_set('Europe/Istanbul');

function convertTimeToDecimal($timeString) {
    $timeString = str_replace(':', '', $timeString);
    $hours = substr($timeString, 0, 2);
    $minutes = substr($timeString, 2, 2);
    $decimalTime = (float)($hours + $minutes / 60);
    return $decimalTime;
}

// Opening and closing hours - current time
$openingTime = "07:20";
$closingTime = "22:00";
$current_time = date('H:i', time());
$current_time_decimal = convertTimeToDecimal($current_time);
$openingTime_decimal = convertTimeToDecimal($openingTime);
$closingTime_decimal = convertTimeToDecimal($closingTime);

// Check if we are within the service hours
if ($current_time_decimal >= $openingTime_decimal && $current_time_decimal <= $closingTime_decimal) {
    echo "We are within the service hours. Welcome!";
} else {
    // Display notification outside of service hours
    echo "We are outside of service hours. Please try again within the specified hours.";
}
?>
