<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;

/**
 * Class ModelSoftRestoreAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelSoftRestoreAction extends Action
{
    /** @var array */
    public $redirect = ['index'];

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!isset(Yii::$app->extensions['yii2tech/ar-softdelete']))
            throw new InvalidConfigException('Extension yii2tech/ar-softdelete required');
    }

    /**
     * @param mixed $id
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function run($id)
    {
        /** @var \rubin\yii2\crud\SoftDeleteModelInterface $model */
        $model = $this->controller->findModel($id);
        $model->restore();

        return $this->controller->redirect($this->redirect);
    }
}