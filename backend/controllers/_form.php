<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Student;
use kartik\date\DatePicker;
use kartik\select2\Select2;

$student=Student::find()->all();
?>

<div class="assign-univ-course-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'student_id')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(common\models\Student::find()->all(), 'ID', function($model){return $model->first_name .' '.$model->last_name;}),
    'options' => ['placeholder' => 'Select Student ...'],
    'pluginOptions' => [
    'tags' => true,
    ],
    ]); ?>
 

    <?php echo $form->field($model, 'college_id')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(common\models\School::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'Select College ...'],
    'pluginOptions' => [
    'tags' => true,
//  'tokenSeparators' => [',', ' '],        
    ],
    ]); ?>

    <?php echo $form->field($model, 'course_id')->widget(Select2::classname(), [
    'data' => \yii\helpers\ArrayHelper::map(common\models\Course::find()->all(), 'id', 'name'),
    'options' => ['placeholder' => 'Select Course ...'],
    'pluginOptions' => [
    'tags' => true,
    'multiple' => false,
    ],
    ]); ?>

    <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

    <?= $form->field($model, 'intake')->widget(DatePicker::classname(), [
                'options' => ['readonly'=>'readonly'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
                'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
