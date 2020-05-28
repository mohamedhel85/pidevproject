<?php

namespace AppBundle\Command;

use AppBundle\Entity\image;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SetupImagesCommand extends Command
{

    /**
     * @var EntityManager
     */
    private $em;

    private $projectDir;

    public function __construct(EntityManagerInterface $em )
    {
        parent::__construct();

        $this->projectDir ="%kernel.project_dir%";
        $this->em = $em;
    }


    protected function configure()
    {
        $this
            ->setName('app:setup-images')
            ->setDescription('custom command used to import images to my project ')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input,$output);

        $images = glob($this->projectDir . '/../web/img/*.*');
        $imageCount = count($images);

        if ($imageCount === 0) {
            $io->warning('No images found');

            return false;
        }
        $io->title('importing images');
        $io->progressStart($imageCount);

        $filenames =[];

        //$output->writeLn(sprintf('Found %d images', $wallpaperCount));

        //$output->writeln('Command result.');

        foreach ($images as $image) {

            [
                'basename'=> $filename,
                'filename'=> $slug,

            ]=pathinfo($image);

            [
                0 => $width,
                1 => $height,
            ]= getimagesize($image);

            $wp = (new image())
                ->setFilename($filename)
                ->setSlug($slug)
                ->setWidth($width)
                ->setHeight($height)
            ;
            $this->em->persist($wp);
            $io->progressAdvance();
            $filenames[]= [$filename];
        }
        $this->em->flush();
        $io->progressFinish();
//        display command result in a table
        $table = new Table($output);
        $table
            ->setHeaders(['filename'])
            ->setRows($filenames);
        $table->render();
        $io->success(sprintf("cool, we added %d images",$imageCount));
    }

}
