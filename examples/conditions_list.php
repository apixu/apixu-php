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

print_r(\Serializer\SerializerBuilder::instance()->build()->toArray($conditions));
