<?php

namespace Tests\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Exception\InvalidOptionException;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * @internal
 * @coversNothing
 */
final class TranslateCommandTest extends KernelTestCase
{
    public function testWhithoutOptionExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:translate-entity');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command' => $command->getName(),
        ]);

        $this->assertSame(0, $commandTester->getStatusCode());
    }

    public function testWithValidOptionExecute()
    {
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:translate-entity');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command' => $command->getName(),
            '--entities' => ['Article'],
        ], [
            'verbosity' => OutputInterface::VERBOSITY_VERBOSE,
        ]);

        $this->assertSame(0, $commandTester->getStatusCode());
    }

    public function testWithInvalidOptionExecute()
    {
        $this->expectException(InvalidOptionException::class);
        $kernel = static::createKernel();
        $application = new Application($kernel);

        $command = $application->find('app:translate-entity');
        $commandTester = new CommandTester($command);

        $commandTester->execute([
            'command' => $command->getName(),
            '--entities' => ['Toto'],
        ], [
            'verbosity' => OutputInterface::VERBOSITY_VERBOSE,
        ]);
    }
}
