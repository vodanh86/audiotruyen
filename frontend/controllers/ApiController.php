<?php

namespace frontend\controllers;

use Yii;
use app\models\Chapter;
use app\models\Novel;
use frontend\models\ChapterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ChapterController implements the CRUD actions for Chapter model.
 */
class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Lists all Chapter models.
     * @return mixed
     */
    public function actionIndex($novel_id=-1)
    {
        #$searchModel = new ChapterSearch();
        if ($novel_id == -1){
            return Chapter::find()->all();
        }
        return array(
            "error"=> 0,
            "message"=> "",
            "data"=>Chapter::find()->WHERE([ 'novel_id' => $novel_id])->all());
    }

    /**
     * Creates a new Chapter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionNovel($new = -1, $type = -1, $feature = -1)
    {
        $cri = "";
        if ($new != -1){
            $cri = $cri . " n.new = " . $new ;
        };
        if ($type != -1){
            if ($cri != "") {
                $cri = $cri . " AND ";
            };
            $cri = $cri . " n.type = ".$type;
        };
        if ($feature != -1){
            if ($cri != "") {
                $cri = $cri . " AND ";
            };
            $cri = $cri . " n.feature = ".$feature;
        };
        $sql = "
        SELECT n.*, c.name AS category, a.name as author FROM  novel n 
        INNER JOIN category c ON n.category_id = c.id
        INNER JOIN author a ON n.author_id = a.id";
        if ($cri != "") {
            $sql = $sql . " WHERE " . $cri;
        }
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($sql);
        return array(
            "error"=> 0,
            "message"=> "",
            "data"=>$command->queryAll());
    }

    /**
     * Displays a single Chapter model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = Novel::findOne($id);
        if (isset($model->view)){
            $model->view = $model->view + 1;
        } else {
            $model->view = 1;
        }
        $model->save();
        return array(
            "error"=> 0,
            "message"=> "",
            "data"=>$model->view
        );
    }



    /**
     * Updates an existing Chapter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Chapter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLoto(){
        $abc = $row = Yii::$app->db2->createCommand("SELECT * FROM mv_loto_result WHERE region = 'bac' ORDER BY id desc LIMIT 1")->queryOne();
        return array(
            "error"=> 0,
            "message"=> "",
            "data"=>$abc);
    }

    /**
     * Finds the Chapter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Chapter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Chapter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
