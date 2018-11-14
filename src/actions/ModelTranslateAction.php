<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\base\Model;

/**
 * Class ModelTranslateAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelTranslateAction extends Action
{
    public $key = 'id';

    public $redirect = 'view';

    public $render = 'translate';

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!isset(Yii::$app->extensions['yii2tech/ar-variation']))
            throw new InvalidConfigException('Extension yii2tech/ar-variation required');
    }

    /**
     * Updates an existing model.
     * If update is successful, the browser will be redirected to the 'redirect' page.
     * @param mixed $id
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function run($id)
    {
        $model = $this->controller->findModel($id);

        $post = Yii::$app->request->post();
        if (Model::loadMultiple($model->getVariationModels(), $post) && $model->save()) {
            return $this->controller->redirect([$this->redirect, 'id' => $model->{$this->key}]);
        } else {
            return $this->controller->render($this->render, [
                'model' => $model,
            ]);
        }
    }
}