<?php

/**
 * Класс Offer.
 * Предназначен для представления записей <offer></offer> в XML
 */

class Offer
{

  protected string $id;
  protected string $mark;
  protected string $model;
  protected string $generation;
  protected string $year;
  protected string $run;
  protected string $color;
  protected string $body_type;
  protected string $engine_type;
  protected string $transmission;
  protected string $gear_type;
  protected string $generation_id;

  /**
   * @return string
   */
  public function getId(): string
  {
    return $this->id;
  }

  /**
   * @param string $id
   */
  public function setId(string $id): void
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getMark(): string
  {
    return $this->mark;
  }

  /**
   * @param string $mark
   */
  public function setMark(string $mark): void
  {
    $this->mark = $mark;
  }

  /**
   * @return string
   */
  public function getModel(): string
  {
    return $this->model;
  }

  /**
   * @param string $model
   */
  public function setModel(string $model): void
  {
    $this->model = $model;
  }

  /**
   * @return string
   */
  public function getGeneration(): string
  {
    return $this->generation;
  }

  /**
   * @param string $generation
   */
  public function setGeneration(string $generation): void
  {
    $this->generation = $generation;
  }

  /**
   * @return string
   */
  public function getYear(): string
  {
    return $this->year;
  }

  /**
   * @param string $year
   */
  public function setYear(string $year): void
  {
    $this->year = $year;
  }

  /**
   * @return string
   */
  public function getRun(): string
  {
    return $this->run;
  }

  /**
   * @param string $run
   */
  public function setRun(string $run): void
  {
    $this->run = $run;
  }

  /**
   * @return string
   */
  public function getColor(): string
  {
    return $this->color;
  }

  /**
   * @param string $color
   */
  public function setColor(string $color): void
  {
    $this->color = $color;
  }

  /**
   * @return string
   */
  public function getBodyType(): string
  {
    return $this->body_type;
  }

  /**
   * @param string $body_type
   */
  public function setBodyType(string $body_type): void
  {
    $this->body_type = $body_type;
  }

  /**
   * @return string
   */
  public function getEngineType(): string
  {
    return $this->engine_type;
  }

  /**
   * @param string $engine_type
   */
  public function setEngineType(string $engine_type): void
  {
    $this->engine_type = $engine_type;
  }

  /**
   * @return string
   */
  public function getTransmission(): string
  {
    return $this->transmission;
  }

  /**
   * @param string $transmission
   */
  public function setTransmission(string $transmission): void
  {
    $this->transmission = $transmission;
  }

  /**
   * @return string
   */
  public function getGearType(): string
  {
    return $this->gear_type;
  }

  /**
   * @param string $gear_type
   */
  public function setGearType(string $gear_type): void
  {
    $this->gear_type = $gear_type;
  }

  /**
   * @return string
   */
  public function getGenerationId(): string
  {
    return $this->generation_id;
  }

  /**
   * @param string $generation_id
   */
  public function setGenerationId(string $generation_id): void
  {
    $this->generation_id = $generation_id;
  }


  public function toString(): string
  {
    return "Offer{" .
      "id=\"" . $this->id .
      "\", mark=\"" . $this->mark .
      "\", model=\"" . $this->model .
      "\", generation=\"" . $this->generation .
      "\", year=\"" . $this->year .
      "\", run=\"" . $this->run .
      "\", color=\"" . $this->color .
      "\", body-type=\"" . $this->body_type .
      "\", engine-type=\"" . $this->engine_type .
      "\", transmission=\"" . $this->transmission .
      "\", gear-type=\"" . $this->gear_type .
      "\", generation-id=\"" . $this->generation_id .
      "\""."}";
  }


}
