<?php
/**
 * @copyright Copyright (c) 2017 Zoltán Szántó <mrbig00@gmail.com>
 * @license   MIT http://opensource.org/licenses/MIT
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mrbig00\settings\Module;
use \mrbig00\settings\models\Setting;
use rmrevin\yii\fontawesome\FA;
use kartik\widgets\Select2;

/**
 * @var yii\web\View                    $this
 * @var mrbig00\settings\models\Setting $model
 * @var yii\widgets\ActiveForm          $form
 */
?>

<?php $form = ActiveForm::begin(); ?>
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
        <div class="setting-form">
            <?php $sections = Setting::getDistinctSections(); ?>
            <?php $sections = array_combine($sections, $sections) ?>
            <?= $form->field($model, 'section')->widget(
                Select2::classname(),
                [
                    'data'          => $sections,
                    'options'       => ['placeholder' => 'Select a state ...'],
                    'pluginOptions' => [
                        'allowClear'     => true,
                        'tags'           => true,
                        'createTag'      => new \yii\web\JsExpression('function (params) {return {id: params.term, text: params.term, newOption: true}}'),
                        'templateResult' => new \yii\web\JsExpression(
                            'function (data) {
                            var $result = $("<span></span>");
                            $result.text(data.text);
                            if (data.newOption) {
                              $result.append(" <em class=\"bg-info text-muted\">(new)</em>");
                            }
                        
                            return $result;
                          }'
                        ),
                    ],
                ]
            ); ?>

            <?= $form->field($model, 'key')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'active')->checkbox(['value' => 1]) ?>

            <?=
            $form->field($model, 'type')->dropDownList(
                $model->getTypes()
            )->hint(Module::t('settings', 'Change at your own risk')) ?>

            <div class="form-group">

            </div>
        </div>
        <div class="box-footer">
            <?=
            Html::submitButton(
                $model->isNewRecord ? Module::t('settings', 'Create') :
                    Module::t('settings', 'Update'),
                [
                    'class' => $model->isNewRecord ?
                        'btn btn-success' : 'btn btn-primary',
                ]
            ) ?>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
