<?php

namespace App\Model;

interface CrumbElementInterface
{
    /**
     * Get element crumb's render.
     *
     * @return string
     */
    public function getCrumb(): string;
}
