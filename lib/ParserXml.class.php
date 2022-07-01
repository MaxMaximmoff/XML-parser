<?php

require_once("lib/Offer.class.php");
require_once("lib/Offers.class.php");

/**
 * Класс ParserXml.
 * Предназначен для парсинга xml файла выгрузки
 */
class ParserXml
{
  private $filename;

  /**
   * ParserXml constructor.
   */
  public function __construct(String $filename)
  {
    $this->filename = $filename;
  }

  public function pars()
  {
    $xml = file_get_contents($this->filename);
    $xml = simplexml_load_string($xml);
    $record = $xml->offers->offer;


    $offers = new Offers();

    foreach ($record as $item) {
      $offer = new Offer;
      $offer->setId($item->{'id'});
      $offer->setMark($item->{'mark'});
      $offer->setModel($item->{'model'});
      $offer->setGeneration($item->{'generation'});
      $offer->setYear($item->{'year'});
      $offer->setRun($item->{'run'});
      $offer->setColor($item->{'color'});
      $offer->setBodyType($item->{'body-type'});
      $offer->setEngineType($item->{'engine-type'});
      $offer->setTransmission($item->{'transmission'});
      $offer->setGearType($item->{'gear-type'});
      $offer->setGenerationId($item->{'generation_id'});

      $offers->addOffer($offer);
    }

    return $offers;
  }
}