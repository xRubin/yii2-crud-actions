<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\base\Model;

/**
 * Class ModelVariateAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelVariateAction extends Action
{
    /** @var string */
    public $key = 'id';
    /** @var string */
    public $redirect = 'view';
    /** @var string */
    public $render = 'variate';

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
        /** @var yii\db\BaseActiveRecord|\rubin\yii2\crud\VariationModelInterface $model */
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