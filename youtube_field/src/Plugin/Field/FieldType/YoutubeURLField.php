<?php

namespace Drupal\youtube_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * @FieldType(
 *   id = "youtube_url",
 *   label = @Translation("YouTube URL Field"),
 *   description = @Translation("This field stores Youtube URL."),
 *   default_widget = "youtube_url_w",
 *   default_formatter = "youtube_url_f",
 * )
 */

class YoutubeURLField extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    $schema = [
      'columns' => [
        'url' => [
          'description' => 'The url link',
          'type' => 'varchar',
          'length' => 500,
        ],
      ],
      'indexes' => [],
      'foreign keys' => [],
    ];
    return $schema;
  }

    /**
     * {@inheritdoc}
     */
    public function isEmpty() {
      $value = $this->get('url')->getValue();
      return $value === NULL || $value === '';
    }

    /**
     * {@inheritdoc}
     */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
      $properties['url'] = DataDefinition::create('string')
        ->setLabel(t('URL'))
        ->setDescription(t('YouTube video URL'));

      return $properties;
    }
}
