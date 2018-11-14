<?php
namespace rubin\yii2\crud;

interface SearchModelInterface
{
    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return \yii\data\ActiveDataProvider
     */
    public function search(array $params);
}