<?php

require_once __DIR__ . '/vendor/autoload.php';

if (isset($_POST['send'])) {

    $api = new \Yandex\Geo\Api();
    $api->setQuery($_POST['address']);


    $api
        ->setLang(\Yandex\Geo\Api::LANG_US)
        ->load();

    $response = $api->getResponse();
    $collection = $response->getList();

    return $collection;
}

