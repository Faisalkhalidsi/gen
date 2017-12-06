<?php

namespace app\controllers;

use Yii;
use app\models\UimAsm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NossfuimController implements the CRUD actions for UimAsm model.
 */
class NossfuimController extends Controller {

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
     * Lists all UimAsm models.
     * @return mixed
     */
    public function actionIndex() {
        $last_update = UimAsm::find()
                ->select('*')
                ->orderBy('uim_asm_id DESC')
                ->one();

        $asmDATA01 = UimAsm::find()
                ->select('*')
                ->where("name ='DATA01' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmINDEX03 = UimAsm::find()
                ->select('*')
                ->where("name ='INDEX03' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmDATA02 = UimAsm::find()
                ->select('*')
                ->where("name ='DATA02' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmINDEX01 = UimAsm::find()
                ->select('*')
                ->where("name ='INDEX01' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmRECO = UimAsm::find()
                ->select('*')
                ->where("name ='RECO' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmGOLD = UimAsm::find()
                ->select('*')
                ->where("name ='GOLD' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmOCR = UimAsm::find()
                ->select('*')
                ->where("name ='OCR' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmDATA04 = UimAsm::find()
                ->select('*')
                ->where("name ='DATA04' ")
                ->orderBy('uim_asm_id DESC')
                ->one();

        $asmDATA = UimAsm::find()
                ->select('*')
                ->where("name ='DATA' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmREDO_SSD = UimAsm::find()
                ->select('*')
                ->where("name ='REDO_SSD' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmINDEX04 = UimAsm::find()
                ->select('*')
                ->where("name ='INDEX04' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmARCH = UimAsm::find()
                ->select('*')
                ->where("name ='ARCH' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmDATA03 = UimAsm::find()
                ->select('*')
                ->where("name ='DATA03' ")
                ->orderBy('uim_asm_id DESC')
                ->one();
        $asmINDEX02 = UimAsm::find()
                ->select('*')
                ->where("name ='INDEX02' ")
                ->orderBy('uim_asm_id DESC')
                ->one();

//        $query = UimAsm::find();
//        $query->where(['=', 'time', UimAsm::find()
//                    ->select('time')
//                    ->orderBy('uim_asm_id DESC')
//                    ->limit(1)])
//                ->all();
//        print_r(sizeof($query));
//        $query = UimAsm::find();
//        $query->where(['=', 'time', UimAsm::find()
//                    ->select('time')
//                    ->orderBy('uim_asm_id DESC')
//                    ->limit(1)]);
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//        ]);

        return $this->render('index', [
                    'last_update' => $last_update,
                    'asmDATA01' => $asmDATA01,
                    'asmINDEX03' => $asmINDEX03,
                    'asmDATA02' => $asmDATA02,
                    'asmINDEX01' => $asmINDEX01,
                    'asmRECO' => $asmRECO,
                    'asmGOLD' => $asmGOLD,
                    'asmOCR' => $asmOCR,
                    'asmDATA04' => $asmDATA04,
                    'asmDATA' => $asmDATA,
                    'asmREDO_SSD' => $asmREDO_SSD,
                    'asmINDEX04' => $asmINDEX04,
                    'asmARCH' => $asmARCH,
                    'asmDATA03' => $asmDATA03,
                    'asmINDEX02' => $asmINDEX02,
        ]);
    }

    public function actionPie() {
        $request = Yii::$app->request;

        $id = $request->post('id');

        return $this->renderAjax('_pieChart', [
//                    'series' => $series,
                    'id' => $id,
//                    'categories' => $categoriesReal,
                    'yAxis' => 'Order Total'
        ]);
    }

}
