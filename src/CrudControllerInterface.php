<?php
namespace rubin\yii2\crud;

interface CrudControllerInterface
{
    /**
     * Finds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param mixed $id
     * @return \yii\db\BaseActiveRecord the loaded model
     * @throws \yii\web\NotFoundHttpException if the model cannot be found
     */
    public function findModel($id);
}
