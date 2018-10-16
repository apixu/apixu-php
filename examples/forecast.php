<?php declare(strict_types = 1);

use Apixu\Exception\ApixuException;
use Apixu\Exception\InternalServerErrorException;
use Apixu\Exception\ErrorException;

require dirname(__DIR__) . '/vendor/autoload.php';

try {
    $api = \Apixu\ApixuBuilder::instance()->setApiKey($_SERVER['APIXUKEY'])->build();
} catch (ApixuException $e) {
    die($e->getMessage());
}

$q = 'London';
$days = 1;

try {
    $forecast = $api->forecast($q, $days);
} catch (InternalServerErrorException $e) {
    die($e->getMessage());
} catch (ErrorException $e) {
    die($e->getMessage());
} catch (ApixuException $e) {
    die($e->getMessage());
}

/** @var \Apixu\Response\Forecast\ForecastDay $forecastDay */
foreach ($forecast->getForecast()->getForecastDay() as $forecastDay) {
    $date = $forecastDay->getDate();
    if ($date !== null) {
        echo $date->format('Y-m-d'); echo "\n";
    }
    echo $forecastDay->getDateEpoch(); echo "\n";
    echo $forecastDay->getDay()->getMaxTempCelsius(); echo "\n";
    echo $forecastDay->getAstro()->getSunrise(); echo "\n";
}


echo '<pre>';print_r($forecast->toArray());exit;
