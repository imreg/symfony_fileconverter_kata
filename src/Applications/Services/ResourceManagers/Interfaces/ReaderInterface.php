<?php

namespace App\Applications\Services\ResourceManagers\Interfaces;

interface ReaderInterface extends ResourceManagerInterface
{
    /**
     * @return array
     */
    public function read(): array;
}
