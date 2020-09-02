<?php


namespace App\Pagination;


use Iterator;

/**
 * Class PageIterator
 * @package App\Pagination
 */
class PageIterator implements Iterator
{
    protected $pages;

    protected $meta;

    protected $position;

    /**
     * PageIterator constructor.
     * @param array $pages
     * @param Meta $meta
     */
    public function __construct(array $pages, Meta $meta)
    {
        $this->pages = $pages;
        $this->meta = $meta;
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return $this->pages[$this->position];
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        $this->position = 0;
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return isset($this->pages[$this->position]);
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        $this->position = 0;
    }
}