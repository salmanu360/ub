<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var frontend\models\CourseSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-4">
         <?= $form->field($model, 'id') ?>
        </div>

        <div class="col-md-4">
         <?= $form->field($model, 'name') ?>
        </div>

        <div class="col-md-4">
         <?= $form->field($model, 'email') ?>
        </div>
    </div>
    		

		

		<?php // echo $form->field($model, 'tags') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'comment') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <a href="<?php echo Url::to(['index'])?>" class="btn btn-default">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
