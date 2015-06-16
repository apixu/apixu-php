<?php

    $key = "YOUR_API_KEY";
    $city = 'paris';
    $url = "http://api.apixu.com/v1/current.json?key=$key&q=paris&=" ;
    
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    
    $json_output=curl_exec($ch);
    $weather = json_decode($json_output);
    echo "<h1>Current Weather</h1>";
    echo "<h2>Location</h2>";
    echo "City: ". $weather->location->name;
    echo "<br>";
    echo "Region: ".$weather->location->region;
    echo "<br>";
    echo "Country: ".$weather->location->country;
    echo "<br>";
    echo "Lat: ".$weather->location->lat." , Lon:".$weather->location->lon;
            
    echo "<h2>Temprature</h2>";
    
    echo "<br>";
    echo "Temperature (&deg;C): " . $weather->current->temp_c; echo "<br>";
    echo "Feels like (&deg;C)". $weather->current->feelslike_c;
            echo "<br>";
    echo "<br>";
    echo "Temperature (&deg;F): " . $weather->current->temp_f; echo "<br>";
    echo "Feels like (&deg;F)". $weather->current->feelslike_f;
    echo "<br>";
    echo "Condition: <img src='" . $weather->current->condition->icon ."'>" . $weather->current->condition->text;
    
    echo "<h2>Wind</h2>";
    echo $weather->current->wind_mph." mph <br>";
    echo $weather->current->wind_kph." kph <br>"; 
    echo $weather->current->wind_degree."&deg;  " . $weather->current->wind_dir."<br>";   
    echo "Humidity: ".$weather->current->humidity;
    echo "<br><br><br>";
    
    echo "Updated On: ".$weather->current->last_updated;
 ?>

