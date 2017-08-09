<?php

namespace common\models;



use common\models\base\BaseModel;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property string $label_img
 * @property integer $cat_id
 * @property integer $user_id
 * @property string $user_name
 * @property integer $is_valid
 * @property integer $created_at
 * @property integer $updated_at
 */
class Post extends BaseModel
{
    
    const IS_VAILD=1;
    const NO_VAILD=0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['cat_id', 'user_id', 'is_valid', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary', 'label_img', 'user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '编号',
            'title' => '题目',
            'summary' => '摘要',
            'content' => '正文',
            'label_img' => '标签图',
            'cat_id' => '类别ID',
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'is_valid' => '是否发布',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
