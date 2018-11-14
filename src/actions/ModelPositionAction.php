<?php
namespace rubin\yii2\crud\actions;

use rubin\yii2\crud\PositionableModelInterface;
use Yii;
use yii\base\Action;
use yii\base\InvalidConfigException;
use yii\helpers\Url;

/**
 * Class ModelPositionAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelPositionAction extends Action
{
    /** @var string */
    public $positionAttribute = 'sort';
    /** @var string */
    public $redirect = 'index';

    /**
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();

        if (!isset(Yii::$app->extensions['yii2tech/ar-position']))
            throw new InvalidConfigException('Extension yii2tech/ar-position required');
    }

    /**
     * @param mixed $id
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function run($id)
    {
        /** @var PositionableModelInterface $model */
        $model = $this->controller->findModel($id);

        switch (Yii::$app->request->getQueryParam($this->positionAttribute)) {
            case 'up':
            case 'prev':
                $model->movePrev();
                break;
            case 'down':
            case 'next':
                $model->moveNext();
                break;
            case 'top':
            case 'first':
                $model->moveFirst();
                break;
            case 'bottom':
            case 'last':
                $model->moveLast();
                break;
        }

        $params = Yii::$app->request->getQueryParams();
        unset($params[$this->positionAttribute]);
        $params[0] = $this->redirect;
        return $this->controller->redirect(Url::to($params));
    }
}