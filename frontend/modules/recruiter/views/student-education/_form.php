 <?php
use common\models\StudentEducation;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var frontend\models\StudentSearch $searchModel
*/

$this->title = Yii::t('models', 'Student');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>.help-block{color: red; font-size: 12px;}</style> 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<main role="main" class="col-md-10 ms-sm-auto px4 dashboard-main-body">
    <?= Html::a('Back to Listing', ['index','sid'=>$_GET['sid']], ['class' => 'btn btn-warning pull-right']) ?>
<h4 class="common-dashboard-heading mt-3">Students Education
</h4>

    <p>
        <!-- // <?//= Html::a('Create Student Education', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <!-- form -->
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
         <div class="col-md-3">
             <?= $form->field($model, 'country_of_education')->widget(Select2::classname(), [
                            'data' => common\models\Country::optsCountry(),
                            'options' => ['placeholder' => 'Country...', 'id' => 'country'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'autocomplete' => false
                            ]
                        ]) ?>
         </div>

         <div class="col-md-3">
           <?php $edu_data = ArrayHelper::map(\common\models\LevelEducation::find()->where(['country_id' => $model->country_of_education])->all(), 'id', 'edu_name'); ?>
                        <?= $form->field($model, 'highest_level_education')->widget(DepDrop::classname(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'data' => $edu_data,
                                'options' => ['id' => 'level-education'],
                                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                'pluginOptions' => [
                                    'depends' => ['country'],
                                    'placeholder' => 'Select ...',
                                    'url' => Url::to(['/recruiter/student/education-lists'])
                                ]
                            ]);
                        ?>  
         </div>

         <div class="col-md-3">
           <?php $grade_data = ArrayHelper::map(\common\models\GradingScheme::find()->all(), 'id', 'name'); ?>       
                        <?= $form->field($model, 'grading_scheme')->widget(DepDrop::classname(), [
                                'type' => DepDrop::TYPE_SELECT2,
                                'data' => $grade_data, 
                                'options' => ['id' => 'grading-scheme'],
                                'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                'pluginOptions'=>[
                                    'depends'=>['country', 'level-education'],
                                    'placeholder'=>'Select...',
                                    'url' => Url::to(['/recruiter/student/grading-lists'])
                                ]
                            ]);
                        ?>
         </div>

         <div class="col-md-3">
             <?php $data = [4 => 4, 5 => 5, 7 => 7, 10 => 10, 20 => 20, 100 => 100]; ?>
                        <?=$form->field($model, 'grade_scale')->widget(Select2::classname(), [
                            'data' => $data,
                            'options' => ['placeholder' => 'Grade Scale...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                                'autocomplete' => false
                            ],
                        ])->label("Grade Scale (out of)") ?>
         </div>

         <div class="col-md-3">
            <?= $form->field($model, 'grade_average')->textInput(['type' => 'number', 'min' => 0, 'max' => 5, 'step' => 0.1, 'maxlength' => true, 'placeholder' => 'Grade Average']) ?>

         </div>
              <?= $form->field($model, 'created_at')->hiddenInput(['value'=>date('Y-m-d')])->label(false) ?>
              <?= $form->field($model, 'student_id')->hiddenInput(['value'=>$_GET['sid']])->label(false) ?>

            <?php if($model->isNewRecord !=1){
             echo $form->field($model, 'updated_at')->hiddenInput(['value'=>date('Y-m-d')])->label(false);
            }?>

            <?php if($model->isNewRecord !=1){
                echo  $form->field($model, 'updated_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false);
            }?>

            <?= $form->field($model, 'created_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

            
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">                 
           <?= $form->field($model, 'graduated_recent_school')->checkbox()->label('Graduated from most recent school'); ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-6">
             <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <br>
    <!-- form end -->
    
    </div>
</main>