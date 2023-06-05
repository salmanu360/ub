<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/**
* @var yii\web\View $this
* @var frontend\models\CourseSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Program Filters
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">        
            <div class="course-search">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <div class="form-group mb-3">
                    <?php  echo $form->field($model, 'name')->label('Course Name') ?>
                </div>
                <div class="form-group mb-3">
                    <?= $form->field($model, 'college_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(\common\models\School ::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'College'],
                        'pluginOptions' => [
                        'allowClear' => true,
                        'autocomplete' => false
                    ],
                    ])->label('College') ?>
                </div>  

                <div class="row">
                    <div class="col-sm-12">
                        <?= Html::submitButton('<i class="fa fa-filter" aria-hidden="true"></i> '.Yii::t('app', 'Apply Filter'),  ['class' => 'common-circle-blue-btn w-100']) ?>
                    </div>
                    <div class="col-sm-12">
                        <?= Html::a('<i class="fa fa-undo margin-r-5"></i> '.Yii::t('app', 'Reset'),['/recruiter/programs-colleges/index'], ['class' => 'common-dashboard-circle-btn w-100']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div> 
        </div>
    </div>
</div>