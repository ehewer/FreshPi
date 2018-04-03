<?php
    // Connect to the file
    // The values in sensor.txt should be in json format
    // Expecting the fields "humidity", "fridgeTemp"

    // Retrieve the file string
    $fileName = "/sensor.json";
    $file = file_get_contents(__DIR__ . $fileName);
    echo $file;


?>