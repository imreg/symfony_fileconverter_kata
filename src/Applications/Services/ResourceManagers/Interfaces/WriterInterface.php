<?php

namespace App\Applications\Services\ResourceManagers\Interfaces;

interface WriterInterface extends ResourceManagerInterface
{
    /**
     * @param array $details
     */
    public function write(array $details): void;
}
