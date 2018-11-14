[![Latest Stable Version](https://poser.pugx.org/rubin/yii2-crud-actions/v/stable)](https://packagist.org/packages/rubin/yii2-crud-actions)

# Yii2 CRUD actions
Часто используемые действия для админки, вынесенные в отдельные Actions. Настраиваемые.

### Установка
```bash
composer require rubin/yii2-crud-actions
```

### Пример использования
Для личного использования, подробной документации не будет.

```php
public function actions()
{
    return [
        'index' => [
            'class' => 'rubin\yii2\crud\actions\ModelIndexAction',
            'searchModel' => new CameraSearch(),
        ],
        'view' => [
            'class' => 'rubin\yii2\crud\actions\ModelViewAction',
        ],
        'create' => [
            'class' => 'rubin\yii2\crud\actions\ModelCreateAction',
            'model' =>  new Camera(),
        ],
        'update' => [
            'class' => 'rubin\yii2\crud\actions\ModelUpdateAction',
        ],
        'delete' => [
            'class' => 'rubin\yii2\crud\actions\ModelDeleteAction',
        ],
        'position' => [
            'class' => 'rubin\yii2\crud\actions\ModelPositionAction',
        ]
    ];
}
```