<?php declare(strict_types = 1);

use Apixu\Exception\ApixuException;
use Apixu\Exception\InternalServerErrorException;
use Apixu\Exception\ErrorException;

require dirname(__DIR__) . '/vendor/autoload.php';

try {
    $language = 'ru';
    $api = \Apixu\Factory::create($_SERVER['APIXUKEY'], $language);
} catch (ApixuException $e) {
    die($e->getMessage());
}

$q = 'London';
$days = 2;
$hour = 13; // paid license only / null for all hours

try {
    $forecast = $api->forecast($q, $days, $hour);
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

    if ($forecastDay->getHour() !== null) {
        /** @var \Apixu\Response\Forecast\Hour $hour */
        foreach ($forecastDay->getHour() as $hour) {
            echo $hour->getTimeEpoch(); echo "\n";
            echo $hour->getTime()->format('H:i:s'); echo "\n";
            echo $hour->getCondition()->getText();  echo "\n";
            echo $hour->getVisKM();  echo "\n";
            echo $hour->getGustMph();  echo "\n";
            echo $hour->getGustKph();  echo "\n";
        }
    }
}

echo '<pre>';print_r(\Serializer\SerializerBuilder::instance()->build()->toArray($forecast));exit;
