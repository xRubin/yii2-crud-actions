<?php

namespace rubin\yii2\crud;

interface VariationModelInterface
{
    /**
     * Returns models related to the main one as variations.
     * @return \yii\db\BaseActiveRecord[] list of variation models.
     */
    public function getVariationModels();
}