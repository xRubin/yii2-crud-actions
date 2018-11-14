<?php
namespace rubin\yii2\crud;

interface PositionableModelInterface
{
    /**
     * Moves owner record by one position towards the start of the list.
     * @return bool movement successful.
     */
    public function movePrev();
    /**
     * Moves owner record by one position towards the end of the list.
     * @return bool movement successful.
     */
    public function moveNext();
    /**
     * Moves owner record to the start of the list.
     * @return bool movement successful.
     */
    public function moveFirst();
    /**
     * Moves owner record to the end of the list.
     * @return bool movement successful.
     */
    public function moveLast();
}