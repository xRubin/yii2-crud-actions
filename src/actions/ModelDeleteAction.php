<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;

/**
 * Class ModelDeleteAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelDeleteAction extends Action
{
    /** @var array */
    public $redirect = ['index'];

    /**
     * Deletes an existing model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param mixed $id
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function run($id)
    {
        $this->controller->findModel($id)->delete();

        return $this->controller->redirect($this->redirect);
    }
}