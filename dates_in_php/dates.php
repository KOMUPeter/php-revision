<?php
// Method 1: Create DateTime objects
$date1 = new DateTime('03-07-1990');
$date2 = DateTime::createFromFormat('d-m-Y', '17-05-2015');

// Output formatted dates with HTML horizontal rule
echo $date1->format('d \o\f M Y') . ' This is the first way presented' . '<hr>';  // Outputs: 03 of Jul 1990
echo $date2->format('d \o\f M Y') . '<hr>';  // Outputs: 17 of May 2015

// Calculate the difference between two dates
$dateDifference = $date1->diff($date2);

// Output the difference
echo "Difference in years between father and son: " . $dateDifference->y . " years, " . $dateDifference->m . " months, " . $dateDifference->d . " days.";