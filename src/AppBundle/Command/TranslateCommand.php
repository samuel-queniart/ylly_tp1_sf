<?php

namespace AppBundle\Command;

use AppBundle\NinjaTranslator\NinjaTranslatorManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidOptionException;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TranslateCommand extends Command
{
    protected static $defaultName = 'app:translate-entity';

    /**
     * @var NinjaTranslatorManager
     */
    private $ninjaTranslator;

    public function __construct(NinjaTranslatorManager $ninjaTranslator)
    {
        $this->ninjaTranslator = $ninjaTranslator;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Translate by cloud services')
            ->setHelp('This command translate automatically entity from language to destination')
            ->addOption(
                'entities',
                't',
                InputOption::VALUE_OPTIONAL | InputOption::VALUE_IS_ARRAY,
                'Which entities do you translate ?'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entities = $this->getEntityToTranslate($input);

        $progressBar = new ProgressBar($output, \count($entities));

        $progressBar->start();

        foreach ($entities as $ninjaTranslator) {
            $output->writeln($ninjaTranslator['class'], OutputInterface::VERBOSITY_VERBOSE);

            $progressBar->advance();
        }

        $progressBar->finish();
    }

    /**
     * @param InputInterface $input
     *
     * @throws \ReflectionException
     *
     * @return array
     */
    protected function getEntityToTranslate(InputInterface $input)
    {
        $entities = $this->ninjaTranslator->getNinjaTranslators();

        $allowEntities = $input->getOption('entities');

        if ($allowEntities !== []) {
            $entities = array_filter($entities, function ($key) use ($allowEntities) {
                return \in_array($key, $allowEntities, true);
            }, ARRAY_FILTER_USE_KEY);
        }

        if (0 === \count($entities)) {
            throw new InvalidOptionException('No entity found (Available : '.implode(', ', array_map(
                function ($item) {
                    return $item['class'];
                },
                $this->ninjaTranslator->getNinjaTranslators()
            )).')');
        }

        return $entities;
    }
}
