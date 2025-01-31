<?php

    namespace App\DataFixtures;

    use App\DataFixtures\enumerations\Types;
    use App\Entity\Type;
    use DateTime;
    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;

    class TypeFixtures extends Fixture
    {
        public function load(ObjectManager $manager): void
        {
            $dateImmutable = new DateTime("now");

            foreach (Types::cases() as $case) {
                $type = new Type();
                $type->setName($case->name);
                $type->setCreatedAt($dateImmutable);
                $type->setUpdatedAt($dateImmutable);
                $manager->persist($type);
                $this->addReference($case->value, $type);
            }

            $manager->flush();
        }
    }
?>
