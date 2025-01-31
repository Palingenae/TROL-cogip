<?php
    namespace App\DataFixtures;

   
    use App\Entity\Company;
    use App\Entity\Invoice;
    use DateTime;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
    use Doctrine\Common\DataFixtures\DependentFixtureInterface;
    use Faker\Factory;

    class InvoiceFixtures extends Fixture implements DependentFixtureInterface
    {
        public function load(ObjectManager $manager): void
        {
            $now = new DateTime("now");
            $faker = Factory::create();
            for ($i=1; $i <= 12 ; $i++) { 
                $typeReference = rand(1,10);
                $invoice = new Invoice();
                $invoice->setRef($faker->numerify("F".$now->format("Ymd")."-###"));
                $invoice->setCompany($this->getReference("company-".$typeReference, Company::class));
                $invoice->setCreatedAt($now);
                $invoice->setUpdatedAt($now);
                $manager->persist($invoice);
            }

            $manager->flush();
        }

        public function getDependencies(): array
        {
            return [CompanyFixtures::class];
        }
    }
?>
