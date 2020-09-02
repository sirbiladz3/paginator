<?php


namespace App\Pagination;


use Iterator;

/**
 * Class PageIterator
 * @package App\Pagination
 */
class PageIterator implements Iterator
{
    /**
     * @var array
     */
    protected $pages;

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * @var
     */
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
     * @return bool
     */
    public function isCurrentPage()
    {
        return $this->current() === $this->meta->page;
    }

    /**
     * @return bool
     */
    public function hasPrevious()
    {
        if ($this->meta->page <= 0) {
            return false;
        }

        return $this->meta->page > 1;
    }

    /**
     * @return bool
     */
    public function hasNext()
    {
        return $this->meta->page < $this->meta->lastPage;
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
        return $this->position = 0;
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