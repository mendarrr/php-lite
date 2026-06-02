<?php

$country = array(
    "Kenya" => "Nairobi",
    "Uganda" => "Kampala",
    "Belgium" => "Brussels",
    "SouthAfrica" => "Johannesburg",
    "UAE" => "Abudhabi",
    "Somalia" => "Mogadishu",
    "Sudan" => "Juba",
    "Slovenia" => "Ljubljana",
    "Germany" => "Berlin",
    "Greece" => "Athens",
    "Ireland" => "Dublin",
    "Egypt" => "Cairo",
    "Portugal" => "Lisbon",
    "Spain" => "Madrid",
    "Sweden" => "Stockholm",
    "United Kingdom" => "London",
    "Cyprus" => "Nicosia",
    "Lithuania" => "Vilnius",
    "Czech Republic" => "Prague",
    "Estonia" => "Tallin",
    "Hungary" => "Budapest",
    "Latvia" => "Riga",
    "Malta" => "Valetta",
    "Austria" => "Vienna",
    "Tanzania" => "Daressalam"
);

// Sort by capital (values) alphabetically  
asort($country);

// Display capital and country name  
foreach ($country as $COUNTRY => $CAPITAL) {
    echo "Capital: " . $CAPITAL . " => Country: " . $COUNTRY . "\n";
}
