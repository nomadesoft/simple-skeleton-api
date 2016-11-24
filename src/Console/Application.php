<?php

namespace App\Console;

use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Console\Input\InputInterface;

/**
 * Application
 *
 * @category Command
 * @package  Console
 * @author   Jesus Farfan <jesu.farfan23@gmail.com>
 * @license  MIT.
 */
class Application extends ConsoleApplication
{
    /**
     * getCommandName
     *
     * Gets the name of the command based on input.
     *
     * @param InputInterface $input The input interface
     *
     * @return string The command name
     */
    protected function getCommandName(InputInterface $input) : string
    {
        $command = $input->getFirstArgument() ?? 'help';
        return $command;
    }

    /**
     * getDefaultCommand
     *
     * Gets the default commands that should always be available.
     *
     * @return array An array of default Command instances
     */
    protected function getDefaultCommands() : array
    {
        $defaultCommands = parent::getDefaultCommands();

        return $defaultCommands;
    }

    /**
     * Overridden so that the application doesn't expect the command
     * name to be the first argument
     *
     */
    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        return $inputDefinition; 
    }
}
