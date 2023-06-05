<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use kartik\widgets\FileInput;
/**
* @var yii\web\View $this
* @var common\models\School $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="school-form">

    <?php $form = ActiveForm::begin([
    'id' => 'School',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>
    <p>
    <?php
         $s= Yii::$app->request->baseUrl;
         $convertPath = str_ireplace('/backend/web', '/frontend/web/uploads/',$s);
        /*$file=$convertPath.'uploads/'.$model->name;
        $url=Url::to(['school/downloaddocument','id'=>$model->id,'c'=>$model->name]);
        if(!empty($model->name)){
            echo  '<a style="margin-left: 188px;" href="'.$url.'"  class="" title="Download document">Download College Image <i class="fa fa-download fa-fw"></i></a>';
        } */ 
        
        ?>
        <!-- <img src="<?php //echo $convertPath.'/'.$model->name;?>" alt="no image"> -->
    </p>
        <p>
        <?php      
             $file_preview2 = (!empty($model->name))?$convertPath.'/'.$model->name:'';
            // $file_preview2 = '';
            //echo $file_preview2;die;
                echo $form->field($model, 'name')->widget(FileInput::classname(), [
                'options' => [
                'multiple'=>false
                ],
                'value'=>$file_preview2,
                'pluginOptions' =>[
                'showRemove' => true,
                'showUpload' => true,
                'previewFileType' => 'any',
                'initialPreview'=>[
                $file_preview2
                ],
                'initialPreviewAsData'=>true,
                'overwriteInitial'=>true,
                ]
                ]);  ?>

			
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('models', 'School'),
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

