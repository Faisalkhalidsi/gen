<?php

namespace app\controllers;

use Yii;
use app\models\IndihomeStatusOrder;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IndohomeStatusOrderController implements the CRUD actions for IndihomeStatusOrder model.
 */
class IndohomeStatusOrderController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all IndihomeStatusOrder models.
     * @return mixed
     */
    public function actionIndex() {
        $data = IndihomeStatusOrder::find()
                ->select('*')
                ->orderBy('indihome_status_order_id DESC')
                ->groupBy('task,date');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $data,
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    

}
