<?php

namespace App\Applications\Services\Containers\Interfaces;

use App\Applications\Services\ResourceManagers\Interfaces\ReaderInterface;
use App\Applications\Services\ResourceManagers\Interfaces\WriterInterface;

interface DetailsInterface
{
    /**
     * @param ReaderInterface $reader
     */
    public function addDetails(ReaderInterface $reader): void;

    /**
     * @param WriterInterface $writer
     */
    public function saveDetails(WriterInterface $writer): void;

    /**
     * @return bool
     */
    public function sortByPrice(): void;

    /**
     * @return array
     */
    public function getDetails(): array;
}
