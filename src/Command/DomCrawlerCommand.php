<?php
declare(strict_types=1);

namespace App\Command;

use App\Applications\Services\Files\File;
use App\Applications\Services\Containers\Details;
use App\Applications\Services\Converters\HtmlConverter;
use App\Applications\Services\Converters\JsonConverter;
use App\Applications\Services\ResourceManagers\Reader;
use App\Applications\Services\ResourceManagers\Writer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

class DomCrawlerCommand extends Command
{
    protected static $defaultName = 'app:dom-crawler';

    protected function configure()
    {
        $this
            ->setDescription('Dom Crawler of Videx')
            ->addArgument('url', InputArgument::OPTIONAL, 'url of Videx')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $url = $input->getArgument('url');

        if ($url) {
            $jsonFile = 'converted/videx.json';
            $io->note(sprintf('You passed an url of Videx: %s', $url));
            $detailsContainer = new Details();
            $detailsContainer->addDetails(new Reader(new File($url), new HtmlConverter()));
            $detailsContainer->sortByPrice();
            $detailsContainer->saveDetails(new Writer(new File($jsonFile, new Filesystem()), new JsonConverter()));
            $io->success('Json File is in ~/'.$jsonFile);
        } else {
            $io->warning('Missing url. Please add a valid url of Videx');
        }

        return 0;
    }
}
