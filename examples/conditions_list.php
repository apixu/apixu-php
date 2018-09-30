<?php

use Apixu\Exception\ApixuException;
use Apixu\Exception\InternalServerErrorException;

require dirname(__DIR__) . '/vendor/autoload.php';

try {
    $api = \Apixu\ApixuBuilder::instance()->setApiKey($_SERVER['APIXUKEY'])->build();
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
