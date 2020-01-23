<?php

namespace Drupal\youtube_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'entity_user_access_f' formatter.
 *
 * @FieldFormatter(
 *   id = "youtube_url_f",
 *   label = @Translation("YouTube URL Field - Formatter"),
 *   description = @Translation("YouTube URL Field - Formatter"),
 *   field_types = {
 *     "youtube_url",
 *   }
 * )
 */

class YoutubeURLFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $url = $item->url;

      if (preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches)) {

        $elements[$delta] = [
          '#type' => 'inline_template',
          '#template' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
          '#context' => [
            'id' => $matches[1],
          ],
        ];
      }
    }

    return $elements;
  }
}
