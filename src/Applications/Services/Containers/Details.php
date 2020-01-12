<?php
declare(strict_types=1);

namespace App\Applications\Services\Containers;

use App\Applications\Services\Containers\Interfaces\DetailsInterface;
use App\Applications\Services\ResourceManagers\Interfaces\ReaderInterface;
use App\Applications\Services\ResourceManagers\Interfaces\WriterInterface;
use App\Entity\Interfaces\HtmlEntityInterface;

class Details implements DetailsInterface
{
    /**
     * @var array
     */
    private array $details = [];

    /**
     * @inheritDoc
     */
    public function addDetails(ReaderInterface $reader): void
    {
        $this->details += $reader->read();
    }

    /**
     * @inheritDoc
     */
    public function saveDetails(WriterInterface $writer): void
    {
        $writer->write($this->details);
    }

    /**
     * @inheritDoc
     */
    public function sortByPrice(string $order = 'DESC'): void
    {
        usort($this->details, function (HtmlEntityInterface $item1, HtmlEntityInterface $item2) use ($order) {
            if ($order === 'DESC') {
                return $item2->getPrice() <=> $item1->getPrice();
            }

            return $item1->getPrice() <=> $item2->getPrice();
        });
    }

    /**
     * @inheritDoc
     */
    public function getDetails(): array
    {
        return $this->details;
    }
}
