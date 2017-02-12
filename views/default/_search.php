<?php
/**
 * @copyright Copyright (c) 2017 Zoltán Szántó <mrbig00@gmail.com>
 * @license   MIT http://opensource.org/licenses/MIT
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mrbig00\settings\Module;

/**
 * @var yii\web\View                          $this
 * @var mrbig00\settings\models\SettingSearch $model
 * @var yii\widgets\ActiveForm                $form
 */
?>

<div class="setting-search">

    <?php $form = ActiveForm::begin(
        [
            'action' => ['index'],
            'method' => 'get',
        ]
    ); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'section') ?>

    <?= $form->field($model, 'key') ?>

    <?= $form->field($model, 'value') ?>

    <?= $form->field($model, 'active')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('settings', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Module::t('settings', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
