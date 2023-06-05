<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;
use common\models\User;
use common\models\ModulesPermission;
use common\components\ActionPermission as ActionPermissionComponent;

/**
* @var yii\web\View $this
* @var common\models\User $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('occ', 'User');
$this->params['breadcrumbs'][] = ['label' => Yii::t('occ', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'View');
$user = Yii::$app->user->identity;

$buttons = ActionPermissionComponent::getModuleButtons(ModulesPermission::MODULE_USERS,['user_id'=>$model->id]);
?>
<div class="giiant-crud user-view box box-primary">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>    <div class="box-header with-border">
        <div class="clearfix crud-navigation">
            <!-- menu buttons -->
            <div class='pull-right'>
                <?php if(isset($buttons['access'])){echo $buttons['access'];}?>
                <?php if(isset($buttons['edit'])){echo $buttons['edit'];}?>
                <?php if(isset($buttons['new'])){echo $buttons['new'];}?>
                <?php if(isset($buttons['view_all'])){echo $buttons['view_all'];}?>
            </div>
        </div>
    </div>

    <div class="box-body  no-padding">

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'username',
            'fname',
            'lname',
        'email:email',
        [
                'attribute'=>'status',
                'value'=>$model->pageStatus,
            ],
    ],
    ]); ?>

        </div>
    <div class="box-footer">
        <?php if(isset($buttons['delete'])){echo $buttons['delete'];}?>
    </div>
</div>
<!--History-->
<?php echo $this->render('../_history',[
           'id'=>$model->id,
           'type'=>\common\models\History::TYPE_USER,
]);?>
<!--History-->
