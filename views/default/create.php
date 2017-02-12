<?php
/**
 * @copyright Copyright (c) 2017 Zoltán Szántó <mrbig00@gmail.com>
 * @license   MIT http://opensource.org/licenses/MIT
 */

use yii\helpers\Html;
use mrbig00\settings\Module;

/**
 * @var yii\web\View                    $this
 * @var mrbig00\settings\models\Setting $model
 */

$this->title = Module::t(
    'settings',
    'Create {modelClass}',
    [
        'modelClass' => Module::t('settings', 'Setting'),
    ]
);
$this->params['breadcrumbs'][] = ['label' => Module::t('settings', 'Settings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>
