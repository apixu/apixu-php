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

try {
    $search = $api->search($q);
} catch (InternalServerErrorException $e) {
    die($e->getMessage());
} catch (ErrorException $e) {
    die($e->getMessage());
} catch (ApixuException $e) {
    die($e->getMessage());
}

print_r($search->toArray());
