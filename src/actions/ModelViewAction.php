<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;

/**
 * Class ModelViewAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelViewAction extends Action
{
    /** @var string */
    public $render = 'view';

    /**
     * Displays a single model.
     * @param mixed $id
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function run($id)
    {
        return $this->controller->render('view', [
            'model' => $this->controller->findModel($id),
        ]);
    }
}