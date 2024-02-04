<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\Category;
use Faker\Factory;

#[AsCommand(
    name: 'app:add-category-to-database',
    description: 'Ajoute une catégorie à la base de données',
)]
class AddCategoryToDatabaseCommand extends Command
{
    private $faker;

    public function __construct()
    {
        parent::__construct();

        $this->faker = Factory::create(); // Initialise Faker
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Ajoute une catégorie à la base de données');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $category = new Category();
        $category->setLibelle($this->faker->word);

        $io->success('Catégorie ajoutée avec succès.');

        return Command::SUCCESS;
    }
}
