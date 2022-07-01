<?php

include_once 'db/DB.class.php';
include_once 'lib/Offer.class.php';
include_once 'lib/Offers.class.php';
include_once 'lib/ParserXml.class.php';

/**
 * Выгрузка данных из XML в базу данных
 */

// фаил XML с данными
if((!($argv[1] == '')) && file_exists(__DIR__ .'/xml/'.$argv[1])) {
  $filename = __DIR__ . '/xml/'.$argv[1];
}
else if (file_exists(__DIR__ .'/xml/data_light.xml')) {
  $filename = __DIR__ . '/xml/data_light.xml';
} else {
  exit("Выгрузка не выполнена. Фаил выгрузки отсутствует в папке xml!");
}


// парсим XML

// создаем объект парсера
$xml = new ParserXml($filename);
// массив с offers
$offers = $xml->pars();

// Получаем массив записей ID из XML
$ids_xml = array();

foreach ($offers->getOffers() as $offer) {
  $ids_xml[] = $offer->getId();
}

// Получаем массив записей ID из базы данных
$db = new DB;

$ids = $db->query('SELECT `id` FROM `offers`', []);

// Массив записей с ID из базы данных
$ids_db = array();
foreach ($ids as $key => $value) {
  $ids_db[] = $value['id'];
}

//
/*
 * Удаление записей из базы данных, которых нет в xml
 */

// Получаем ID, записи с которыми нужно удалить
$delete_ids = array_diff($ids_db,  $ids_xml);
// Удаление
foreach ($delete_ids as $delete_id) {
  $params = [
    'id' => $delete_id,
  ];
  $db->query('DELETE FROM `offers` WHERE id = :id', $params);
}

/*
 * Обновление данных из XML
 */

// Получаем ID, записи с которыми нужно обновить
$update_ids = array_intersect($ids_xml, $ids_db);

$offers_update = array();

foreach ($offers->getOffers() as $offer) {
  foreach ($update_ids as $update_id) {
    if($offer->getId() == $update_id) {
      $offers_update[] = $offer;
    }
  }
}

foreach ($offers_update as $offer) {

  $params = [
    'id' => $offer->getId(),
    'mark' => $offer->getMark(),
    'model' => $offer->getModel(),
    'generation' => $offer->getGeneration(),
    'year' => $offer->getYear() ? $offer->getYear() : null,
    'run' => $offer->getRun() ? $offer->getRun() : null,
    'color' => $offer->getColor(),
    'body_type' => $offer->getBodyType(),
    'engine_type' => $offer->getEngineType(),
    'transmission' => $offer->getTransmission(),
    'gear_type' => $offer->getGearType(),
    'generation_id' => $offer->getGenerationId() ? $offer->getGenerationId() : null,
  ];

  $db->query('UPDATE `offers` SET mark=:mark, model=:model, generation=:generation, year=:year, run=:run,
                    color=:color, body_type=:body_type, engine_type=:engine_type, transmission=:transmission,
                    gear_type=:gear_type, generation_id=:generation_id
                    WHERE id=:id', $params);
}


/*
 * Добавление записей из XML, которых нет в базе
 */

// Получаем ID, записи с которыми нужно добавить

$insert_ids = array_diff($ids_xml, $ids_db);

$offers_insert = array();

foreach ($offers->getOffers() as $offer) {
  foreach ($insert_ids as $insert_id) {
    if($offer->getId() == $insert_id) {
      $offers_insert[] = $offer;
    }
  }
}


// Запись в базу новых данных из XML
foreach ($offers_insert as $offer) {

  $params = [
    'id' => $offer->getId(),
    'mark' => $offer->getMark(),
    'model' => $offer->getModel(),
    'generation' => $offer->getGeneration(),
    'year' => $offer->getYear() ? $offer->getYear() : null,
    'run' => $offer->getRun() ? $offer->getRun() : null,
    'color' => $offer->getColor(),
    'body_type' => $offer->getBodyType(),
    'engine_type' => $offer->getEngineType(),
    'transmission' => $offer->getTransmission(),
    'gear_type' => $offer->getGearType(),
    'generation_id' => $offer->getGenerationId() ? $offer->getGenerationId() : null,
  ];


  $db->query('INSERT INTO `offers` (id, mark, model, generation, year, run, color, body_type, 
                      engine_type, transmission, gear_type, generation_id)
  VALUES (:id, :mark, :model, :generation, :year, :run, :color, :body_type, 
          :engine_type, :transmission, :gear_type, :generation_id)', $params);
}

echo "Выгрузка из $filename завершена!";