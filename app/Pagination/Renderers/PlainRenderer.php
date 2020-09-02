<?php

namespace App\Pagination\Renderers;

use App\Pagination\Meta;

/**
 * Class PlainRenderer
 * @package App\Pagination\Renderers
 */
class PlainRenderer extends RendererAbstract
{
    public function render()
    {
        $iterator = $this->pages();
    }
}