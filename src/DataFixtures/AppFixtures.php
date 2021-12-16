<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i<=5; $i++) {
            $contact = new Contact();
            $contact->setName('Tueleau');
            $contact->setFirstName('Enzo');
            $contact->setEmail('user' . $i . '@gmail.com');
            $contact->setMessage('Test');
            $contact->setNewsletter('Newsletter');
            $contact->setSujet('Sujet #' . $i);
            $manager->persist($contact);
        }
        $manager->flush();
    }
}
