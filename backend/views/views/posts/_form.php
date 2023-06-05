<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use dosamigos\ckeditor\CKEditor;
use kartik\widgets\FileInput;
use kartik\select2\Select2;


/**
* @var yii\web\View $this
* @var common\models\Posts $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="posts-form  ">
   

        <?php $form = ActiveForm::begin([
          'id' => 'posts',
       
          'options' => ['enctype' => 'multipart/form-data'],
          //'enableClientValidation' => true,
         // 'errorSummaryCssClass' => 'error-summary alert alert-danger',
         
          ]
          );
          ?>

            
                      
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                     
                     
                       <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                      
                     
                        <?= $form->field($model, 'body')->widget(CKEditor::className(), [
                              'options' => ['cols'=>50],
                              'preset' => 'full',
                         ]) ?>
                      
              
                              <?= $form->field($model, 'meta_description')->textarea(['rows' => 6]) ?>
                      
                       <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 6]) ?>
                     
                       <?=                         $form->field($model, 'status')->dropDownList(
                            common\models\Posts::optsstatus()
                        ); ?>


                    <?=    $form->field($model, 'blog_category_id')->dropDownList(                           
                               \yii\helpers\ArrayHelper::map(common\models\Posts::optsCategory(), 'id', 'name'),
                        )->label("Blog Category"); ?>

              
               <?php   
                     if(!empty($model->blog_tag)){
                         $model->blog_tags=explode(",",$model->blog_tag);
                      }
                     echo $form->field($model, 'blog_tags')->widget(Select2::classname(), [
                         'data' => \yii\helpers\ArrayHelper::map(common\models\Posts::optsTags(), 'tag_name', 'tag_name'),
                         'options' => ['placeholder' => 'Select any blog ...', 'multiple' => true],
                         'pluginOptions' => [
                         'tags' => true,
                       //  'tokenSeparators' => [',', ' '],        
                         ],
                         ])->label('Tag Category');
                         
                    ?>
                  

                
                         <?= $form->field($model, 'featured')->textInput() ?>
                     
                         <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>
                     
                     
                       <?php

                    $file_preview2 = (!empty($model->image))?Yii::$app->request->baseUrl.'/uploads/'.$model->image:'';
?>
               
                 <?php 

                 echo $form->field($model, 'image')->widget(FileInput::classname(), [
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
                    ]); 


                                        ?>
               

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? 'Create' : 'Save'),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>



</div>     

<?php ActiveForm::end(); ?>

    
     </div>

