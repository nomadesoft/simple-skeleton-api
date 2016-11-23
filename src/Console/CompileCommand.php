<?php

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompileCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:compile')
            ->setDescription('Compile application')
            ->setHelp('This command allows you to compile application in cache.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Compiling....');
    }
}
