<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "berat".
 *
 * @property string $tanggal
 * @property int $max
 * @property int $min
 */
class Berat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'max', 'min'], 'required'],
            [['tanggal'], 'safe'],
            [['max', 'min'], 'integer'],
            [['tanggal'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tanggal' => Yii::t('app', 'Tanggal'),
            'max' => Yii::t('app', 'Max'),
            'min' => Yii::t('app', 'Min'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return BeratQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BeratQuery(get_called_class());
    }

    public static function getPerbedeaanAvg($provider)
    {
        $total = 0;

        foreach ($provider->models as $k => $item) {
            $total += $item['max'] - $item['min'];
        }

        // add number_format() before return
        $total = number_format( $total/($k+1), 1 );

        return $total;
    }

    public static function getAvg($provider, $fieldName)
    {
        $total = 0;

        foreach ($provider->models as $k => $item) {
            $total += $item[$fieldName];
        }

        // add number_format() before return
        $total = number_format( $total/($k+1), 1 );

        return $total;
    }

}
