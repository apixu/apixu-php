apixu.com-PHP-Api
======================
A php api to parse weather data from [apixu.com](http://www.apixu.com/). This api retrieves and normalise the data received from api call to [apixu.com](http://www.apixu.com/).
-----------

For example code and how to use this api, please take a look into `Examples_*.php` files
- `Examples_Current.php` Shows how to receive the current weather.
- `Examples_Forecast.php` Shows how to receive weather forecasts.

Dependency
=======
-This api uses [cUrl] (http://php.net/manual/en/book.curl.php) extension for php.
-You will need Api key to make call, you can get it from [apixu.com](http://apixu.com/).

Example call
============
```php
<?php
	$key = "YOUR_API_KEY";
    $city = 'paris';
    $url = "http://api.apixu.com/v1/current.json?key=$key&q=paris&=" ;
    
    $ch = curl_init();  
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    
    $json_output=curl_exec($ch);
    $weather = json_decode($json_output);
	echo "Temperature: " . $weather->current->temp_c;
```

