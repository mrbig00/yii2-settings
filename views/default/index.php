<?php
/**
 * @copyright Copyright (c) 2017 Zoltán Szántó <mrbig00@gmail.com>
 * @license   MIT http://opensource.org/licenses/MIT
 */

use yii\helpers\Html;
use yii\grid\GridView;
use mrbig00\settings\Module;
use mrbig00\settings\models\Setting;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FA;

/**
 * @var yii\web\View                          $this
 * @var mrbig00\settings\models\SettingSearch $searchModel
 * @var yii\data\ActiveDataProvider           $dataProvider
 */

$this->title = Module::t('settings', 'Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            <?= $this->title; ?>
        </h3>
        <div class="box-tools pull-right">
            <?=
            Html::a(
                FA::icon('plus'),
                ['create'],
                ['class' => 'btn btn-box-tool', 'title' => Module::t('settings', 'Add new')]
            ) ?>
        </div>
    </div>
    <div class="box-body">

        <?php Pjax::begin(); ?>
        <?=
        GridView::widget(
            [
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    'id',
                    'type',
                    [
                        'attribute' => 'section',
                        'filter'    => ArrayHelper::map(
                            Setting::find()->select('section')->distinct()->where(['<>', 'section', ''])->all(),
                            'section',
                            'section'
                        ),
                    ],
                    'key',
                    'value:ntext',
                    [
                        'class'     => '\pheme\grid\ToggleColumn',
                        'attribute' => 'active',
                        'filter'    => [1 => Yii::t('yii', 'Yes'), 0 => Yii::t('yii', 'No')],
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]
        ); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
