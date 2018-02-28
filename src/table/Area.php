<?php
/**
 * 地区信息表模型-表模型
 */

namespace shawn\beehive\table;

class Area extends BeehiveAR
{
    public static function tableName()
    {
        return '{{%area}}';
    }

    public function rules()
    {
        return [
            [['areaCode'], 'required'],
            [['areaLevel'], 'integer'],
            [['areaCode'], 'string', 'max' => 10],
            [['areaName'], 'string', 'max' => 50],
            [['areaInfo'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'areaCode' => '地区编码',
            'areaName' => '地区名称',
            'areaLevel' => '级别',
            'areaInfo' => '地区全称',
        ];
    }
}
