<?php

use Apixu\Exception\ApixuException;
use Apixu\Exception\InternalServerErrorException;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require dirname(__DIR__) . '/vendor/autoload.php';

$config = new \Apixu\Config();
$config->setApiKey($_SERVER['APIXUKEY']);

try {
    $api = \Apixu\Apixu::api($config);
} catch (ApixuException $e) {
    die($e->getMessage());
}

try {
    $conditions = $api->conditions();
} catch (InternalServerErrorException $e) {
    die($e->getMessage());
} catch (ErrorException $e) {
    die($e->getMessage());
} catch (ApixuException $e) {
    die($e->getMessage());
}

/** @var \Apixu\Response\Condition $condition */
foreach ($conditions as $condition) {
    echo sprintf(
        "%s, %s, %s, %s\n",
        $condition->getCode(),
        $condition->getDay(),
        $condition->getNight(),
        $condition->getIcon()
    );
}

print_r($conditions->toArray());
