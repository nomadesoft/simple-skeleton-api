<?php

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * CompileCommand
 *
 * @category  Controllers
 * @package   Controllers
 * @author    Jesus Farfan <jesu.farfan23@gmail.com>
 * @copyright Jesus Farfan
 * @license   MIT 
 * @link      https://github.com/jesusfar
 */
class CompileCommand extends Command
{
    /**
     * configure command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('app:compile')
            ->setDescription('Compile application')
            ->setHelp('This command allows you to compile application in cache.');
    }

    /**
     * execute command
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Compiling....');
    }
}
