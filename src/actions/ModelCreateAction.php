<?php
namespace rubin\yii2\crud\actions;

use rubin\yii2\crud\traits\FormAjaxValidationTrait;
use Yii;
use yii\base\Action;

/**
 * Class ModelCreateAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelCreateAction extends Action
{
    use FormAjaxValidationTrait;

    /** @var yii\db\BaseActiveRecord */
    public $model;
    /** @var string */
    public $key = 'id';
    /** @var string */
    public $redirect = 'view';
    /** @var string */
    public $render = 'create';
    /** @var bool */
    public $performAjaxValidation = false;

    /**
     * Creates new model.
     * If creation is successful, the browser will be redirected to the 'redirect' page.
     * @return mixed
     */
    public function run()
    {
        if ($this->performAjaxValidation)
            $this->performAjaxValidation($this->model);

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