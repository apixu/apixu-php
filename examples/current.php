<?php declare(strict_types = 1);

use Apixu\Exception\ApixuException;
use Apixu\Exception\InternalServerErrorException;
use Apixu\Exception\ErrorException;

require dirname(__DIR__) . '/vendor/autoload.php';

try {
    $language = 'es';
    $api = \Apixu\Factory::create($_SERVER['APIXUKEY'], $language);
} catch (ApixuException $e) {
    die($e->getMessage());
}

$q = 'London';

try {
    $current = $api->current($q);
} catch (InternalServerErrorException $e) {
    die($e->getMessage());
} catch (ErrorException $e) {
    die($e->getMessage());
} catch (ApixuException $e) {
    die($e->getMessage());
}

$template = <<< EOT
The current weather for %s is:
    - Temperature: %d degrees Celsius
    - Humidity: %d

EOT;

echo sprintf(
    $template,
    $current->getLocation()->getName(),
    $current->getCurrent()->getTempCelsius(),
    $current->getCurrent()->getHumidity()
);

print_r(\Serializer\SerializerBuilder::instance()->build()->toArray($current));
