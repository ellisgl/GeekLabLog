<?php

namespace App\Command\Admin;

use App\User\Entity\UserEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'admin:create-user';

    /** @var EntityManagerInterface $entityManger */
    private $entityManger;

    /**
     * CreateUserCommand constructor.
     *

     * @param string|null   $name
     */
    public function __construct(EntityManagerInterface $entityManager, string $name = null)
    {
        parent::__construct($name);
        $this->entityManger = $entityManager;
    }


    protected function configure(): void
    {
        $this->setDescription('Create a new user')
             ->setHelp('This command will create a new user...')
             ->addArgument('username', InputArgument::REQUIRED, 'The desired user name')
             ->addArgument('email', InputArgument::REQUIRED, 'The user\'s email address')
             ->addArgument('password', InputArgument::REQUIRED, 'The password')
             ->setHelp('This command allows you to create a user...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $user = new UserEntity();
        $user->setUserName($input->getArgument('username'))
            ->setEmail($input->getArgument('email'))
            ->setPassword($input->getArgument('password'));

        $this->entityManger->persist($user);
        $this->entityManger->flush();

        return Command::SUCCESS;
    }
}
