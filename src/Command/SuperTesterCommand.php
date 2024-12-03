<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\MaSuperTesterConnection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:super-tester',
    description: 'Add a short description for your command',
)]
class SuperTesterCommand extends Command
{
    public function __construct(
        private MaSuperTesterConnection $maSuperTesterConnection
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $io = new SymfonyStyle($input, $output);
        $io->success('SuperTester is a great tool to test your code!');

        $result = $this->maSuperTesterConnection->getSuperTesterDataWithParams(
            'SELECT * FROM property WHERE property_id > :id',
            ['id' => 1]);

        dump($result);

        return Command::SUCCESS;
    }
}
