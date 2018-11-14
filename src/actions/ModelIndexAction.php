<?php
namespace rubin\yii2\crud\actions;

use Yii;
use yii\base\Action;
use yii\db\BaseActiveRecord;

/**
 * Class ModelIndexAction
 * @property-read yii\web\Controller|\rubin\yii2\crud\CrudControllerInterface $controller
 */
class ModelIndexAction extends Action
{
    /** @var BaseActiveRecord|\rubin\yii2\crud\SearchModelInterface */
    public $searchModel;
    /** @var string */
    public $render = 'index';

    /**
     * Lists all models.
     * @return mixed
     */
    public function run()
    {
        return $this->controller->render($this->render, [
            'searchModel' => $this->searchModel,
            'dataProvider' => $this->searchModel->search(Yii::$app->request->queryParams),
        ]);
    }

}