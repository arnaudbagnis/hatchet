<?php

namespace Rareloop\Hatchet\Commands;

use Rareloop\Hatchet\Commands\MakeFromStubCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'make:exception {name : The class name of the Exception}',
    description: 'Create a Exception'
)]
class ExceptionMake extends MakeFromStubCommand
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');

        $stub = file_get_contents(__DIR__ . '/stubs/Exception.stub');
        $stub = str_replace('DummyException', $name, $stub);

        $this->createFile('app/Exceptions/'.$name.'.php', $stub);
    }
}
