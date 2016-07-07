<?php

namespace frontend\controllers;

use Yii;
use app\models\ReporteFallos;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use \app\models\UsuariosDepartamento;
use app\models\AsignacionCopiadora;

/**
 * ReporteFallosController implements the CRUD actions for ReporteFallos model.
 */
class ReporteFallosController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [

                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ReporteFallos models.
     * @return mixed
     */
    public function actionIndex() {
        if(!UsuariosDepartamento::find()->where(['id_usuario'=>Yii::$app->user->identity->id])->count()){
            return $this->goHome();
        }
        $dataProvider = new ActiveDataProvider([
            'query' => ReporteFallos::find()->where(['id_departamento' => UsuariosDepartamento::findOne(['id_usuario' => Yii::$app->user->identity->id])]),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReporteFallos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
                if(!UsuariosDepartamento::find()->where(['id_usuario'=>Yii::$app->user->identity->id])->count()){
            return $this->goHome();
        }
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ReporteFallos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
                if(!UsuariosDepartamento::find()->where(['id_usuario'=>Yii::$app->user->identity->id])->count()){
            return $this->goHome();
        }
        $model = new ReporteFallos();
        $model->id_departamento = UsuariosDepartamento::findOne(['id_usuario' => Yii::$app->user->identity->id])->id_departamento;
        $model->save();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ReporteFallos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
                if(!UsuariosDepartamento::find()->where(['id_usuario'=>Yii::$app->user->identity->id])->count()){
            return $this->goHome();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ReporteFallos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
                if(!UsuariosDepartamento::find()->where(['id_usuario'=>Yii::$app->user->identity->id])->count()){
            return $this->goHome();
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReporteFallos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReporteFallos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ReporteFallos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionList($id) {
       
        $printes = AsignacionCopiadora::find()->where(['id_copiadora' => $id, 
            'id_departamento'=> UsuariosDepartamento::findOne(Yii::$app->user->identity->id)->id_departamento,
            ])->all();
        $printesSize = AsignacionCopiadora::find()->where(['id_copiadora' => $id])->count();
        if ($printesSize > 0) {
            foreach ($printes as $print) {
                echo "<option value='" . $print->serie . "'>" . $print->serie . "</option>";
            }
        } else {
            echo "<option>-</option>";
        }
    }

}
