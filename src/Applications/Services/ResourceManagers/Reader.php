<?php
declare(strict_types=1);

namespace App\Applications\Services\ResourceManagers;

use App\Applications\Services\Files\Interfaces\FileInterface;
use App\Applications\Services\Converters\Interfaces\ConverterInterface;
use App\Applications\Services\ResourceManagers\Interfaces\ReaderInterface;

class Reader implements ReaderInterface
{
    /**
     * @var FileInterface
     */
    private FileInterface $file;

    /**
     * @var ConverterInterface
     */
    private ConverterInterface $converter;

    /**
     * Reader constructor.
     * @param FileInterface $file
     * @param ConverterInterface $converter
     */
    public function __construct(FileInterface $file, ConverterInterface $converter)
    {
        $this->file = $file;
        $this->converter = $converter;
    }

    /**
     * @inheritDoc
     */
    public function read(): array
    {
        try {
            $content = $this->file->fetch($this->converter);
            return $this->converter->unserialize($content);
        } catch (\Exception $exception) {
            return [];
        }
    }
}
