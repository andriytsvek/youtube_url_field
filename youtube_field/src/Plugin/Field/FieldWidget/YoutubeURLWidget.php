<?php

namespace Drupal\youtube_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'entity_user_access_w' widget.
 *
 * @FieldWidget(
 *   id = "youtube_url_w",
 *   label = @Translation("YouTube URL Field - Widget"),
 *   description = @Translation("YouTube URL Field - Widget"),
 *   field_types = {
 *     "youtube_url",
 *   },
 * )
 */

class YoutubeURLWidget extends WidgetBase {
  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['url'] = [
      '#type' => 'url',
      '#title' => t('Youtube URL'),
      '#description' => t('Insert your YouTube URL link'),
      '#default_value' => isset($items[$delta]->url) ? $items[$delta]->url : NULL,
    ];

    return $element;
  }
}
