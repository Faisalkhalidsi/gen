<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\PartitionTable;
use app\models\TopTable;
use app\models\Data;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $data = PartitionTable::find()
                ->select('MAX(partition_table_id) as table_id,partition_id, order_total, date')
                ->groupBy('partition_id')
                ->all();

        $secondData = TopTable::find()
                ->select('MAX(top_table_id), table_name, row_total,date')
                ->groupBy('table_name')
                ->all();

        $modelPartition = new PartitionTable();
        return $this->render('index', [
                    'diagram' => $data,
                    'secondDiagram' => $secondData,
                    'modelPartition' => $modelPartition,
        ]);
    }

    public function actionPartition() {
        $request = Yii::$app->request;
        $from = $request->post('from');
        $to = $request->post('to');
        $partition_id = $request->post('partition_id');

        $sql = PartitionTable::find()
                ->select('MAX(partition_table_id) as table_id,partition_id, order_total, date');

        if ($partition_id != NULL) {
            $sql->where('date >=:from');
            $sql->andWhere('date <=:to');
            $sql->addParams([':from' => $from]);
            $sql->addParams([':to' => $to]);
            $sql->groupBy('date,partition_id');
            $sql->andWhere('partition_id =:partition_id');
            $sql->addParams([':partition_id' => $partition_id]);
        } else {
            $sql->groupBy('partition_id');
        }
        $data = $sql->all();

        if ($partition_id != NULL) {
            $categories = array();
            $resultsDate = array();


            foreach ($data as $values) {
                if (!in_array($values['date'], $categories)) {
                    array_push($categories, $values['date']);
                    $categoriesReal[] = ($values['date']);
                }

                $resultsPartitionID[] = $values['partition_id'];
                $resultsDate[] = $values['date'];
                $resultsOrderTotal[] = $values['order_total'];
            }

            if (sizeof($categories) == 0) {
                return $this->renderAjax('_flash');
            }

            $series = array();
            $myObj = new Data();

            for ($i = 0; $i < sizeof($categoriesReal); $i++) {
                $myObj->name = $resultsPartitionID[$i];
                for ($j = 0; $j < sizeof($resultsDate); $j++) {
                    if ($categoriesReal[$i] == $resultsDate[$j]) {
                        $simpan[] = (int) $resultsOrderTotal[$j];
                    }
                }
                $myObj->data = $simpan;
                if (sizeof($categoriesReal) == 1) {
                    array_push($series, (array) $myObj);
                } elseif ($i == (sizeof($categoriesReal) - 1)) {
                    array_push($series, (array) $myObj);
                }
            }

            if ($partition_id == NULL) {
                $categoriesReal = '';
            }
        } else {
            foreach ($data as $values) {
                $categoriesReal[] = "Partition ID";
                $series[] = array(
                    'type' => 'column',
                    'name' => "Partition Id : " . $values['partition_id'],
                    'data' => array((int) $values['order_total']));
            }
        }


        return $this->renderAjax('_chart', [
                    'series' => $series,
                    'id' => 'partitionChart',
                    'categories' => $categoriesReal
        ]);
    }

    public function actionTopten() {
        $request = Yii::$app->request;
        $from = $request->post('from');
        $to = $request->post('to');
        $table_name = $request->post('table_name');

        $sql = TopTable::find()
                ->select('MAX(top_table_id), table_name, row_total,date');

        if ($table_name != NULL) {
            $sql->where('date >=:from');
            $sql->andWhere('date <=:to');

            $sql->groupBy('table_name,date');
            $sql->andWhere('table_name =:table_name');
            $sql->addParams([':table_name' => $table_name]);
            $sql->addParams([':from' => $from]);
            $sql->addParams([':to' => $to]);
        } else {
            $sql->groupBy('table_name');
        }

        try {
            $data = $sql->all();
        } catch (Exception $ex) {
            echo 'Query failed', $ex->getMessage();
        }

        if ($table_name != NULL) {
            $categories = array();
            $resultsDate = array();
            $resultsRowTotal = array();


            foreach ($data as $values) {
                if (!in_array($values['date'], $categories)) {
                    array_push($categories, $values['date']);
                    $categoriesReal[] = ($values['date']);
                }

                $resultsTableName[] = $values['table_name'];
                $resultsDate[] = $values['date'];
                $resultsRowTotal[] = $values['row_total'];
            }

            if (sizeof($categories) == 0) {
                return $this->renderAjax('_flash');
            }

            $series = array();
            $myObj = new Data();

            for ($i = 0; $i < sizeof($categoriesReal); $i++) {
                $myObj->name = $resultsTableName[$i];
                for ($j = 0; $j < sizeof($resultsDate); $j++) {
                    if ($categoriesReal[$i] == $resultsDate[$j]) {
                        $simpan[] = (int) $resultsRowTotal[$j];
                    }
                }
                $myObj->data = $simpan;
                if (sizeof($categoriesReal) == 1) {
                    array_push($series, (array) $myObj);
                } elseif ($i == (sizeof($categoriesReal) - 1)) {
                    array_push($series, (array) $myObj);
                }
            }

            if ($table_name == NULL) {
                $categoriesReal = '';
            }
        } else {
            foreach ($data as $values) {
                $categoriesReal[] = "Table Name";
                $series[] = array(
                    'type' => 'column',
                    'name' => "Partition Id : " . $values['table_name'],
                    'data' => array((int) $values['row_total']));
            }
        }
//        Yii::$app->session->setFlash('success', "Your message to display");
//        Yii::$app->getSession()->setFlash('success', [
//            'type' => 'success',
//            'duration' => 5000,
//            'icon' => 'fa fa-users',
//            'message' => 'My Message',
//            'title' => 'My Title',
//            'positonY' => 'top',
//            'positonX' => 'left'
//        ]);

        return $this->renderAjax('_chart', [
                    'series' => $series,
                    'id' => 'toptenChart',
                    'categories' => $categoriesReal
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

}
