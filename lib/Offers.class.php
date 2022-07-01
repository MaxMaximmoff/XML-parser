<?php


/**
 * Класс Offers.
 * Предназначен для агрегирования объектов типа Offer
 */
class Offers
{

  protected $offers = array();


  /**
   * @return mixed
   */
  public function getOffers()
  {
    return $this->offers;
  }

  /**
   * @param mixed $offers
   */
  public function setOffers($offers): void
  {
    $this->offers = $offers;
  }


  public function addOffer(Offer $offer)
  {
    $this->offers[$offer->getId()] = $offer;
  }


  public function toString(): string
  {
    $toString = '';
    foreach ($this->offers as $offer) {
      $toString .= $offer->toString().' ';
    }
    return $toString;
  }
}