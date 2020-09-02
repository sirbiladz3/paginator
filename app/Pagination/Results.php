<?php


namespace App\Pagination;


use App\Pagination\Renderers\PlainRenderer;

/**
 * Class Results
 * @package App\Pagination
 */
class Results
{
    /**
     * @var array
     */
    protected $results;
    /**
     * @var Meta
     */
    protected $meta;

    /**
     * Results constructor.
     * @param array $results
     * @param Meta $meta
     */
    public function __construct(array $results, Meta $meta)
    {
        $this->results = $results;
        $this->meta = $meta;
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->results;
    }

    /**
     * @return PlainRenderer
     */
    public function render(array $extra = [])
    {
        return (new PlainRenderer($this->meta))->render($extra);
    }
}