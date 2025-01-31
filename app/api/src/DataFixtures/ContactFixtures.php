<?php
    namespace App\DataFixtures;

   
    use App\Entity\Company;
    use App\Entity\Contact;
    use DateTime;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
    use Doctrine\Common\DataFixtures\DependentFixtureInterface;
    use Faker\Factory;

    class ContactFixtures extends Fixture implements DependentFixtureInterface
    {
        public function load(ObjectManager $manager): void
        {
            $now = new DateTime("now");
            $faker = Factory::create();
            for ($i=1; $i <= 10 ; $i++) { 
                $typeReference = rand(1,10);
                $contact = new Contact();
                $fname = $faker->firstName();
                $lname = $faker->lastName();
                $contact->setName($lname." ".$fname);
                $contact->setEmail(strtolower($fname.".".$lname."@".$faker->freeEmailDomain()));
                $contact->setPhone($faker->numerify("071######"));
                $contact->setCompany($this->getReference("company-".$typeReference, Company::class));
                $contact->setCreatedAt($now);
                $contact->setUpdatedAt($now);
                $manager->persist($contact);
            }

            $manager->flush();
        }

        public function getDependencies(): array
        {
            return [CompanyFixtures::class];
        }
    }
?>
