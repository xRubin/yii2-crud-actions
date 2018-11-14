<?php

namespace rubin\yii2\crud;

interface SoftDeleteModelInterface
{
    /**
     * Marks the owner as deleted.
     * @return int|false the number of rows marked as deleted, or false if the soft deletion is unsuccessful for some reason.
     */
    public function softDelete();

    /**
     * Restores record from "deleted" state, after it has been "soft" deleted.
     * @return int|false the number of restored rows, or false if the restoration is unsuccessful for some reason.
     */
    public function restore();
}