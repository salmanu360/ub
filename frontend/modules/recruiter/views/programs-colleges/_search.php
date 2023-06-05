<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/**
* @var yii\web\View $this
* @var backend\models\SchoolSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>
<div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            College Filters
        </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="school-search">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <div class="row">
                    <div class="form-group mb-3">   	 	
                        <?php  echo $form->field($model, 'name') ?>
                    </div>

                    <div class="form-group mb-3">
                        <?= $form->field($model, 'dest_country')->widget(Select2::classname(), [
                            'data' => common\models\Country::optsCountry(),
                            'options' => ['placeholder' => 'Country'],
                            'pluginOptions' => [
                            'allowClear' => true,
                            'autocomplete' => false
                        ],
                        ])->label('Country') ?>
                    </div>
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

