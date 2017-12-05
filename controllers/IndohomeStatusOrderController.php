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
         $last_update = IndihomeStatusOrder::find()
                ->select('*')
                ->orderBy('indihome_status_order_id DESC')
                ->one();
         
        $query = IndihomeStatusOrder::find();
        $query->where(['=', 'time', IndihomeStatusOrder::find()
                ->select('time')
                ->orderBy('indihome_status_order_id DESC')
                ->limit(1)]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
                    'last_update'=> $last_update,
                    'dataProvider' => $dataProvider,
        ]);
    }

}
