<?php

require_once __DIR__ . '/vendor/autoload.php';

if (isset($_POST['address'])) {

    $api = new \Yandex\Geo\Api();
    $api->setQuery($_POST['address']);


    $api->setLang(\Yandex\Geo\Api::LANG_US)->load();

    $response = $api->getResponse()->getList();
    $collection = [];

    foreach ($response as $key => $item) {
        $collection[$key]['address'] = $item->getAddress(); // адрес
        $collection[$key]['latt'] = $item->getLatitude(); // широта
        $collection[$key]['long'] = $item->getLongitude(); // долгота
    }

    echo json_encode($collection);
}

