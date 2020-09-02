<?php

namespace App\Pagination\Renderers;

use App\Pagination\Meta;
use App\Pagination\PageIterator;

/**
 * Class PlainRenderer
 * @package App\Pagination\Renderers
 */
abstract class RendererAbstract
{

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * RendererAbstract constructor.
     * @param Meta $meta
     */
    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }

    /**
     * @return PageIterator|array
     */
    public function pages()
    {
        $lrCount = 2;

        $range = range(1, $this->meta->lastPage());

        $endDifference = max(0, $this->meta->page - ($this->meta->lastPage - $lrCount) + 1);

        $range = array_slice(
            array_slice($range, max(1, ($this->meta->page - $lrCount) - $endDifference)),
            0, ($lrCount * 2)
        );


        array_unshift($range, 1);
        $range[] = $this->meta->lastPage();

        return new PageIterator(
            array_unique($range),
            $this->meta
        );
    }

    /**
     * @return mixed
     */
    abstract public function render();
}