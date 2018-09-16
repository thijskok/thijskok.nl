<?php

namespace App\Services;

use App\Page;

class PageService
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function all()
    {
        return $this->page->all();
    }
}
