<?php

namespace App\Applications\Services\Parsers\Interfaces;

use Symfony\Component\DomCrawler\Crawler;

interface ParserInterface
{
    /**
     * @return string
     */
    public function title(): string;

    /**
     * @return string
     */
    public function description(): string;

    /**
     * @return Crawler
     */
    public function packagePrices(): Crawler;

    /**
     * @return int
     */
    public function price(): int;

    /**
     * @return int
     */
    public function discount(): int;
}
