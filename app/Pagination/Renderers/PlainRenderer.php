<?php

namespace App\Pagination\Renderers;

/**
 * Class PlainRenderer
 * @package App\Pagination\Renderers
 */
class PlainRenderer extends RendererAbstract
{

    /**
     * @param array $extra
     * @return mixed|string
     */
    public function render(array $extra = [])
    {
        $iterator = $this->pages();

        $html = '<ul>';

        if ($iterator->hasPrevious()) {
            $html .= '<li><a href="' . $this->query($this->meta->page - 1, $extra) . '">Previous</a></li>';
        }

        foreach ($iterator as $page) {
            if ($iterator->isCurrentPage()) {
                $html .= '<li><strong><a href="' . $this->query($page, $extra) . '">' . $page . '</a></strong></li>';
            } else {
                $html .= '<li><a href="' . $this->query($page, $extra) . '">' . $page . '</a></li>';
            }
        }

        if ($iterator->hasNext()) {
            $html .= '<li><a href="' . $this->query($this->meta->page + 1, $extra) . '">Next</a></li>';
        }

        $html .= '</ul>';

        return $html;

    }

    /**
     * @param $page
     * @param array $extra
     * @return string
     */
    protected function query($page, array $extra = [])
    {
        return '?page=' . $page . '&' . http_build_query($extra);
    }
}