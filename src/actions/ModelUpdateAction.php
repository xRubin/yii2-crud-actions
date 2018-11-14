<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;

/**
 * Class ModelUpdateAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelUpdateAction extends Action
{
    /** @var string */
    public $key = 'id';
    /** @var string */
    public $redirect = 'view';
    /** @var string */
    public $render = 'update';

    /**
     * Updates an existing model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param mixed $id
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function run($id)
    {
        $model = $this->controller->findModel($id);

        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()) {
            return $this->controller->redirect([$this->redirect, 'id' => $model->{$this->key}]);
        } else {
            return $this->controller->render($this->render, [
                'model' => $model,
            ]);
        }
    }
}