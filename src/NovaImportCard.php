<?php

namespace Jobcerto\NovaImportCard;

use Laravel\Nova\Card;

class NovaImportCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-import-card';
    }

    public function title($title)
    {
        return $this->withMeta(['title' => $title]);
    }

    public function body($body)
    {
        return $this->withMeta(['body' => $body]);
    }

    public function columns(...$columns)
    {

        return $this->withMeta(['columns' => $columns]);
    }

    public function using($model)
    {
        return $this->withMeta(['using' => $model]);
    }

}
