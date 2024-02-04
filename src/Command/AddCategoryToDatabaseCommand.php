<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Category;
use Faker\Factory;

#[AsCommand(
    name: 'app:add-category-to-database',
    description: 'Ajoute une catégorie à la base de données',
)]
class AddCategoryToDatabaseCommand extends Command
{
    private $entityManager;
    private $faker;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
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

        // Utilise Faker pour générer des données aléatoires
        $category = new Category();
        $category->setLibelle($this->faker->word); // Utilise une méthode de Faker pour générer un mot aléatoire
        // Ajoute d'autres propriétés...

        $this->entityManager->persist($category);
        $this->entityManager->flush();

        $io->success('Catégorie ajoutée avec succès.');

        return Command::SUCCESS;
    }
}
