<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use cinghie\cookieconsent\widgets\CookieWidget;
use kartik\widgets\TypeaheadBasic;
use yii\jui\Autocomplete;
use yii\helpers\ArrayHelper;
use thtmorais\pace\Pace;
use common\models\User;


AppAsset::register($this);
$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php Html::csrfMetaTags() ?>
    <base href="<?= Url::home(true) ?>" />
    <title> <?= Html::encode($this->title) .' - '. Yii::$app->name ?> </title>
    <?php $this->head() ?>
    
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">    
</head>
<body>
<?php $this->beginBody() ?>

<?php
    echo Pace::widget([
      'color'=>'red',
      'theme'=>'minimal',
      'options'=>[]
    ]);
?>
    

    <!-- views -->
    <?php echo $content ?>



<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>