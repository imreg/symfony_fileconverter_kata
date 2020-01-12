<?php

namespace App\Tests\Applications\Services\Parsers;

use App\Applications\Services\Converters\JsonConverter;
use App\Applications\Services\Files\File;
use App\Applications\Services\ResourceManagers\Writer;
use App\Entity\VidexEntity;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Filesystem\Filesystem;

class WriterTest extends TestCase
{
    public function testWrite()
    {
        $jsonFile = 'tests/converted/videx.json';
        $expected = '[{"title":"Option Title","description":"Product Desc","price":1000,"discount":10}]';

        $videx = new VidexEntity();
        $videx->setOptionTitle('Option Title');
        $videx->setDescription('Product Desc');
        $videx->setPrice('1000');
        $videx->setDiscount('10');

        $writer = new Writer(new File($jsonFile, new Filesystem()), new JsonConverter());

        $writer->write([$videx]);
        $this->assertFileExists($jsonFile);
        $this->assertJsonStringEqualsJsonFile($jsonFile, $expected);
    }
}
