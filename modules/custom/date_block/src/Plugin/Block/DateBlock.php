<?php

namespace Drupal\date_block\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a Date Block,
 * @Block(
 * id = "date_block",
 * admin_label = @Translation("Datumsausgabe"),
 * category = @Translation("Datumsausgabe_xx"),
 *)
 */

class DateBlock extends BlockBase {
 /**
  * {@inheritdoc}
  */

  public function build() {
    $format = $this->getFormat();
    return array(
      '#type' => 'markup',
      '#markup' => date($format),
      '#cache' =>[
        'max-age' => 0,
      ],
    );
  }

  /**Legt ein config-Obj. an 
   * liest Standart-Format-Wert aus 
   * */

  private function getFormat(){
    $config = \Drupal::config('date_block.settings');
    $format = $config->get('format');
    return $format;
  }

}