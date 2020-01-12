<?php

namespace App\Applications\Services\Converters\Interfaces;

interface ConverterInterface
{
    /**
     * @param string $string
     * @return array
     */
    public function unserialize(string $string): array;

    /**
     * @param array $details
     * @return string
     */
    public function serialize(array $details): string;

    /**
     * @param string $source
     * @return string
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function fetch(string $source): string;
}
