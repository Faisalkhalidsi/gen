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
use app\models\LastAnalyzedTable;
use app\models\AsmOsm;


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

//        $thirdData = LastAnalyzedTable::find()
//                ->select('MAX(last_analyzed_table_id), table_name, row_total,date')
//                ->groupBy('table_name')
//                ->all();

//        SELECT * FROM `asm_osm` WHERE `name`='DATA' ORDER BY `asm_osm_id` DESC LIMIT 1 
        $asmDATA = AsmOsm::find()
                ->select('*')
                ->where("name ='DATA' ")
                ->orderBy('asm_osm_id DESC')
                ->one();

        $asmOCR = AsmOsm::find()
                ->select('*')
                ->where("name ='OCR' ")
                ->orderBy('asm_osm_id DESC')
                ->one();

        $asmRECO = AsmOsm::find()
                ->select('*')
                ->where("name ='RECO' ")
                ->orderBy('asm_osm_id DESC')
                ->one();

        $asmREDO = AsmOsm::find()
                ->select('*')
                ->where("name ='REDO' ")
                ->orderBy('asm_osm_id DESC')
                ->one();

        $modelPartition = new PartitionTable();
        return $this->render('index', [
                    'diagram' => $data,
                    'secondDiagram' => $secondData,
//                    'thirdData' => $thirdData,
                    'modelPartition' => $modelPartition,
                    'asmDATA' => $asmDATA,
                    'asmOCR' => $asmOCR,
                    'asmRECO' => $asmRECO,
                    'asmREDO' => $asmREDO
        ]);
    }

    public function actionPartition() {
        $request = Yii::$app->request;
        $from = $request->post('from');
        $to = $request->post('to');
        $partition_id = $request->post('id');

        $sql = PartitionTable::find()
                ->select('MAX(partition_table_id) as table_id,partition_id, order_total, date');

        $param = array(
            'param1' => 'partition_id',
            'param2' => 'date',
            'param3' => 'order_total');


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
            $arr = $this->arrangeBar($partition_id, $data, $param);
            $series = $arr['series'];
            $categoriesReal = $arr['categories'];

            if ($series == 0) {
                return $this->renderAjax('_flash');
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
                    'categories' => $categoriesReal,
                    'yAxis' => 'Order Total'
        ]);
    }

    public function actionTopten() {
        $request = Yii::$app->request;
        $from = $request->post('from');
        $to = $request->post('to');
        $table_name = $request->post('id');

        $sql = TopTable::find()
                ->select('MAX(top_table_id), table_name, row_total,date');

        $param = array(
            'param1' => 'table_name',
            'param2' => 'date',
            'param3' => 'row_total');

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

        $data = $sql->all();

        if ($table_name != NULL) {
            $arr = $this->arrangeBar($table_name, $data, $param);
            $series = $arr['series'];
            $categoriesReal = $arr['categories'];

            if ($series == 0) {
                return $this->renderAjax('_flash');
            }
        } else {
            foreach ($data as $values) {
                $categoriesReal[] = "Table Name";
                $series[] = array(
                    'type' => 'column',
                    'name' => "Table Name : " . $values['table_name'],
                    'data' => array((int) $values['row_total']));
            }
        }
        return $this->renderAjax('_chart', [
                    'series' => $series,
                    'id' => 'toptenChart',
                    'categories' => $categoriesReal,
                    'yAxis' => 'Row Total'
        ]);
    }

    public function actionLastanalyzed() {
        $request = Yii::$app->request;
        $from = $request->post('from');
        $to = $request->post('to');
        $table_name = $request->post('id');

        $sql = LastAnalyzedTable::find()
                ->select('MAX(last_analyzed_table_id), table_name, row_total,date');

        $param = array(
            'param1' => 'table_name',
            'param2' => 'date',
            'param3' => 'row_total');

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

        $data = $sql->all();

        if ($table_name != NULL) {
            $arr = $this->arrangeBar($table_name, $data, $param);
            $series = $arr['series'];
            $categoriesReal = $arr['categories'];

            if ($series == 0) {
                return $this->renderAjax('_flash');
            }
        } else {
            foreach ($data as $values) {
                $categoriesReal[] = "Table Name";
                $series[] = array(
                    'type' => 'column',
                    'name' => "Table Name : " . $values['table_name'],
                    'data' => array((int) $values['row_total']));
            }
        }
        return $this->renderAjax('_chart', [
                    'series' => $series,
                    'id' => 'lastanalyzedChart',
                    'categories' => $categoriesReal,
                    'yAxis' => 'Row Total'
        ]);
    }

    public function arrangeBar($primary, $data, $param) {
        $categories = array();
        $resultsDate = array();
        $resultsTotal = array();

        foreach ($data as $values) {
            if (!in_array($values[$param['param2']], $categories)) {
                array_push($categories, $values[$param['param2']]);
                $categoriesReal[] = ($values[$param['param2']]);
            }

            $resultsPrimary[] = $values[$param['param1']];
            $resultsDate[] = $values[$param['param2']];
            $resultsTotal[] = $values[$param['param3']];
        }

        if (sizeof($categories) == 0) {
            $series = 0;
            $categoriesReal = 0;
        } else {
            $series = array();
            $myObj = new Data();

            for ($i = 0; $i < sizeof($categoriesReal); $i++) {
                $myObj->name = $resultsPrimary[$i];
                for ($j = 0; $j < sizeof($resultsDate); $j++) {
                    if ($categoriesReal[$i] == $resultsDate[$j]) {
                        $simpan[] = (int) $resultsTotal[$j];
                    }
                }
                $myObj->data = $simpan;
                if (sizeof($categoriesReal) == 1) {
                    array_push($series, (array) $myObj);
                } elseif ($i == (sizeof($categoriesReal) - 1)) {
                    array_push($series, (array) $myObj);
                }
            }

            if ($primary == NULL) {
                $categoriesReal = '';
            }
        }

        $result = array(
            'series' => $series,
            'categories' => $categoriesReal);

        return $result;
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
