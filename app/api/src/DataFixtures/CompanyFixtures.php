<?php
    namespace App\DataFixtures;

    use App\DataFixtures\enumerations\Types;
    use App\Entity\Company;
    use App\Entity\Type;
    use DateTime;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
    use Doctrine\Common\DataFixtures\DependentFixtureInterface;
    use Faker\Factory;
    class CompanyFixtures extends Fixture implements DependentFixtureInterface
    {
        public function load(ObjectManager $manager): void
        {
            $now = new DateTime("now");
            $faker = Factory::create();
            for ($i=1; $i <= 10 ; $i++) { 
                $typeReference = Types::cases()[array_rand(Types::cases())]->value;
                $company = new Company();
                $company->setName($faker->company());
                $company->setTypeId($this->getReference($typeReference, Type::class));
                $company->setCountry('Belgique');
                $company->setTVA($faker->numerify("BE##########"));
                $company->setCreatedAt($now);
                $company->setUpdatedAt($now);
                $manager->persist($company);
                $this->addReference("company-".$i,$company);
            }

            $manager->flush();
        }

        public function getDependencies(): array
        {
            return [TypeFixtures::class];
        }
    }
?>
