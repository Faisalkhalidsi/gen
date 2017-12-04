<?php
/* @var $this \yii\web\View */
/* @var $content string */

//use Yii;
use app\widgets\Alert;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Nav;

//use kartik\sidenav\SideNav;
// OR if this package is installed separately, you can use
// use kartik\sidenav\SideNav;
//use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <div id="coba">
                <?php
                NavBar::begin([
                    'brandLabel' => Html::img('@web/images/NOSS-mon.png', ['width' => '230', 'alt' => Yii::$app->name]),
                    'brandUrl' => Yii::$app->homeUrl,
                    'brandOptions' => ['class' => 'myBrand'], //options of the brand
                    'options' => [
                        'class' => 'navbar-inverse navbar-fixed-top myNavbar',
                        'style' => 'height: 80px',
                    ],
                ]);

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right myMenu'],
                    'items' => [
                        ['label' => 'OSM', 'url' => ['/site/index']],
//                        ['label' => 'About', 'url' => ['/site/about']],
//                        ['label' => 'Contact', 'url' => ['/site/contact']],
//                        Yii::$app->user->isGuest ? (
//                                ['label' => 'Login', 'url' => ['/site/login']]
//                                ) : (
//                                '<li>'
//                                . Html::beginForm(['/site/logout'], 'post')
//                                . Html::submitButton(
//                                        'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
//                                )
//                                . Html::endForm()
//                                . '</li>'
//                                )
                    ],
                ]);


                NavBar::end();
                ?>
            </div>
            <div class="row">
                <?php ?>
            </div>
            <div class="container" style="margin-left: 10px; margin-top: 10px; width: 1300px;">
                <div class="row" id="menu">
                    <!--                    <nav class="navbar navbar-default">
                                            <div class="container-fluid">
                                                <div class="navbar-header">
                                                    <a class="navbar-brand" href="#">WebSiteName</a>
                                                </div>
                                                <ul class="nav navbar-nav">
                                                    <li class="active"><a href="#">Home</a></li>
                                                    <li><a href="#">Page 1</a></li>
                                                    <li><a href="#">Page 2</a></li>
                                                    <li><a href="#">Page 3</a></li>
                                                </ul>
                                            </div>-->
                    <!--</nav>-->
                    <?php
//                    echo Nav::widget([
////                        'options' => ['class' => 'navbar-inverse'],
//                        'items' => [
//                            [
//                                'label' => 'Home',
//                                'url' => ['site/index'],
//                                'linkOptions' => [],
//                            ],
//                            [
//                                'label' => 'Dropdown',
//                                'items' => [
//                                    ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
//                                    '<li class="divider"></li>',
//                                    '<li class="dropdown-header">Dropdown Header</li>',
//                                    ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
//                                ],
//                            ],
//                            [
//                                'label' => 'Login',
//                                'url' => ['site/login'],
//                                'visible' => Yii::$app->user->isGuest
//                            ],
//                        ],
//                        'options' => ['class' => 'navbar navbar-default nav-pills'], // set this to nav-tab to get tab-styled navigation
//                    ]);
                    ?>
                </div>

                <?= Alert::widget() ?>


                <?= $content ?>
            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; PT. Telkom Indonesia,tbk <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
