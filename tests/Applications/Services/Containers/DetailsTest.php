<?php

namespace App\Tests\Applications\Services\Parsers;

use App\Applications\Services\Containers\Details;
use App\Applications\Services\ResourceManagers\Interfaces\ReaderInterface;
use App\Entity\VidexEntity;
use PHPUnit\Framework\TestCase;

class DetailsTest extends TestCase
{
    private Details $details;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->details = new Details();
    }

    /**
     * @dataProvider provider
     */
    public function testAddDetails($expected, $provided, $order)
    {
        $reader = $this->createMock(ReaderInterface::class);
        $reader->expects($this->any())
            ->method('read')
            ->willReturn($provided);

        $this->details->addDetails($reader);
        $array = $this->details->getDetails();

        $this->assertCount(2, $array);
    }

    /**
     * @dataProvider provider
     */
    public function testDetails($expected, $provided, $order)
    {
        $reader = $this->createMock(ReaderInterface::class);
        $reader->expects($this->any())
            ->method('read')
            ->willReturn($provided);

        $this->details->addDetails($reader);
        $array = $this->details->getDetails();

        $first = current($array);
        $this->assertInstanceOf(VidexEntity::class, $first);
    }

    /**
     * @dataProvider provider
     */
    public function testSortByPriceDesc($expected, $provided, $order)
    {
        $reader = $this->createMock(ReaderInterface::class);
        $reader->expects($this->any())
            ->method('read')
            ->willReturn($provided);

        $this->details->addDetails($reader);
        $this->details->sortByPrice($order);
        $array = $this->details->getDetails();

        $first = current($array);
        $this->assertInstanceOf(VidexEntity::class, $first);
        $this->assertEquals($expected, $first->getPrice());
    }

    /**
     * @return array
     */
    public function provider()
    {
        $videx1 = new VidexEntity();
        $videx1->setOptionTitle('First Title');
        $videx1->setDescription('First Desc');
        $videx1->setPrice('1000');
        $videx1->setDiscount('10');

        $videx2 = new VidexEntity();
        $videx2->setOptionTitle('Second Title');
        $videx2->setDescription('Second Desc');
        $videx2->setPrice('500');
        $videx2->setDiscount('10');

        return [
            [
                1000,
                [$videx2, $videx1],
                'DESC'
            ],
            [
                500,
                [$videx2, $videx1],
                'ASC'
            ]
        ];
    }
}