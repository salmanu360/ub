<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ForStudents $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'For Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="for-students-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?> -->
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'first_name',
            'last_name',
            // 'birth_date',
            'phone_no',
           /// 'gender',
            //'country_of_citizenship',
            'first_language',
            'marital_status',
            'country_of_interest',
            'service_of_interest',
            'passport_no',
            /*' passport_expiry_date',
            'address:ntext',
            'city',
            'state',
            'country',
            'zip_code',
            'country_of_education',
            'highest_level_education',
            'grading_scheme',
            'grade_scale',
            'grade_average',
            'graduated_recent_school',
            'english_exam_type',
            'date_of_exam',
            'exact_score_listening',
            'exact_score_reading',
            'exact_score_writing',
            'exact_score_speaking',
            'exact_score_overall',
            'have_gre_exam',
            'gre_exam_date',
            'gre_verbal_score',
            'gre_verbal_rank',
            'gre_quantitative_score',
            'gre_quantitative_rank',
            'gre_writing_score',
            'gre_writing_rank',
            'have_gmat_exam',
            'gmat_exam_date',
            'gmat_verbal_score',
            'gmat_verbal_rank',
            'gmat_quantitative_score',
            'gmat_quantitative_rank',
            'gmat_writing_score',
            'gmat_writing_rank',
            'gmat_total_score',
            'gmat_total_rank',
            'refused_visa',
            'study_permit',
            'details:ntext',
            'upload_document',
            'consent',
            'created_at',
            'updated_at', */
        ],
    ]) ?>

</div>
