<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 24; ++$i) {
            $blog = new Blog();
            $blog
                ->setName($faker->words(5, true))
                ->setIntro($faker->paragraphs(2, true))
                ->setContent('## '.$faker->words(4, true).PHP_EOL.PHP_EOL.$faker->paragraph(25).PHP_EOL.PHP_EOL.$faker->paragraph(25))
                ->setPublishDate($faker->dateTimeThisYear());

            $manager->persist($blog);
        }

        $manager->flush();
    }
}
