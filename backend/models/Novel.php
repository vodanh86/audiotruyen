<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "novel".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image
 * @property string|null $feature_image
 * @property int|null $author_id
 * @property int|null $category_id
 * @property int|null $view
 * @property int|null $rating
 * @property int|null $type
 * @property int|null $status
 * @property int|null $new
 * @property int|null $recommend
 * @property int|null $feature
 */
class Novel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'novel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'category_id', 'view', 'rating', 'type', 'status', 'new', 'recommend', 'feature'], 'integer'],
            [['name'], 'string', 'max' => 1045],
            [['description'], 'string', 'max' => 5045],
            [['image', 'feature_image'], 'string', 'max' => 545],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'image' => 'Image',
            'author_id' => 'Author ID',
            'category_id' => 'Category ID',
            'view' => 'View',
            'rating' => 'Rating',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }
}
