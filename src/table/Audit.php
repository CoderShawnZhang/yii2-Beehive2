<?php
/**
 * Created by PhpStorm.
 * User: anlewo0208
 * Date: 2018/2/27
 * Time: 下午5:09
 */

namespace shawn\beehive\table;

class Audit extends BeehiveAR
{
    public static function tableName()
    {
        return '{{%audit}}';
    }

    public function rules()
    {
        return [
            [['goodsId', 'verGoodsId', 'auditStatus', 'auditStatusBefore', 'auditIsNew', 'auditPriority', 'auditResult', 'creator', 'updater', 'created', 'updated'], 'integer'],
            [['auditIdentifier', 'auditIdentifierGoods', 'auditIdentifierPrice', 'remark'], 'string', 'max' => 255],
            [['goodsId'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['goodsId' => 'id']],
            [['verGoodsId'], 'exist', 'skipOnError' => true, 'targetClass' => VerGoods::className(), 'targetAttribute' => ['verGoodsId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goodsId' => 'Goods ID',
            'verGoodsId' => 'Ver Goods ID',
            'auditStatus' => '审核状态',
            'auditStatusBefore' => '上次操作时的审核状态',
            'auditIsNew' => '是否最新审核',
            'auditPriority' => '审核优先级',
            'auditResult' => '审核结果',
            'auditIdentifier' => '商品指纹',
            'auditIdentifierGoods' => '商品信息指纹',
            'auditIdentifierPrice' => '商品价格指纹',
            'remark' => '注释',
            'creator' => 'Creator',
            'updater' => 'Updater',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }
}
