<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;

/**
 * Class ModelCreateAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelCreateAction extends Action
{
    /** @var yii\db\BaseActiveRecord */
    public $model;
    /** @var string */
    public $key = 'id';
    /** @var string */
    public $redirect = 'view';
    /** @var string */
    public $render = 'create';

    /**
     * Creates new model.
     * If creation is successful, the browser will be redirected to the 'redirect' page.
     * @return mixed
     */
    public function run()
    {
        $post = Yii::$app->request->post();
        if ($this->model->load($post) && $this->model->save()) {
            return $this->controller->redirect([$this->redirect, 'id' => $this->model->{$this->key}]);
        } else {
            return $this->controller->render($this->render, [
                'model' => $this->model,
            ]);
        }
    }
}