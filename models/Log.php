<?php

namespace alyanik\viewlog\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\log\Logger;

/**
 * This is the model class for table "log".
 *
 * @property int $id
 * @property int $level
 * @property string $category
 * @property double $log_time
 * @property string $prefix
 * @property string $message
 */
class Log extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['level'], 'integer'],
            [['log_time'], 'number'],
            [['prefix', 'message'], 'string'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'level'     => 'Level',
            'category'  => 'Category',
            'log_time'  => 'Log Time',
            'prefix'    => 'Prefix',
            'message'   => 'Message',
        ];
    }

    /**
     * @return array
     */
    public static function basicTypeNames()
    {
        return [
            Logger::LEVEL_ERROR         => 'error',
            Logger::LEVEL_WARNING       => 'warning',
            Logger::LEVEL_INFO          => 'info',
            Logger::LEVEL_TRACE         => 'trace',
            Logger::LEVEL_PROFILE_BEGIN => 'profile begin',
            Logger::LEVEL_PROFILE_END   => 'profile end'
        ];
    }
}