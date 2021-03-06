<?php

namespace App\Pagination;

use App\Pagination\Meta;

/**
 * Class Builder
 * @package App\Pagination
 */


class Builder
{
    /**
     * @var
     */
    protected $builder;

    /**
     * Builder constructor.
     * @param $builder
     */
    public function __construct($builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return Results
     */
    public function paginate($page = 1, $perPage = 10)
    {
        $page = max(1, $page);

        $total = $this->builder->execute()->rowCount();



        $result = $this->builder
            ->setFirstResult(
                $this->getFirstResultIndex($page, $perPage)
            )
            ->setMaxResults($perPage)
            ->execute()
            ->fetchAll();

        return new Results(
            $result,
            $meta = new Meta($page, $perPage, $total)
    );

    }

    /**
     * @param $page
     * @param $perPage
     * @return float|int
     */
    protected function getFirstResultIndex($page, $perPage)
    {
        return ($page - 1) * $perPage;
    }
}