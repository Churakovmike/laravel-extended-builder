<?php

namespace ChurakovMike\ExtendedBuilder;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class ExtendedQueryBuilder
 * @package App
 */
class ExtendedQuery extends Builder
{
    /**
     * ExtendedQuery constructor.
     * @param $modelClass
     */
    public function __construct(string $modelClass)
    {
        $this->setQuery($modelClass::query());
        $this->setModel(new $modelClass);
        parent::__construct($modelClass::query()->getQuery());
    }
}
