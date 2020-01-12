<?php

namespace App\Applications\Services\Files\Interfaces;

use App\Applications\Services\Converters\Interfaces\ConverterInterface;

interface FileInterface
{
    /**
     * @param string $string
     */
    public function store(string $string): void;

    /**
     * @param ConverterInterface $converter
     * @return string
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function fetch(ConverterInterface $converter): string;
}
