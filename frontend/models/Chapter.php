<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 * @property string|null $image
 * @property int|null $order
 * @property int|null $novel_id
 * @property string|null $content
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order', 'novel_id'], 'integer'],
            [['name', 'content'], 'string', 'max' => 5045],
            [['link', 'image'], 'string', 'max' => 1045],
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
            'link' => 'Link',
            'image' => 'Image',
            'order' => 'Order',
            'novel_id' => 'Novel ID',
            'content' => 'Content',
        ];
    }
}
