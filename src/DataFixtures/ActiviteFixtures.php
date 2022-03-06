<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use DateInterval;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\String\Slugger\AsciiSlugger;
use function Symfony\Component\String\u;


class ActiviteFixtures extends Fixture
{
    public function loadLoremIpsumFromFile()
    {
        $ipsumFile    = new File(__DIR__ . '/../../snippets/ipsum.txt');
        $ipsumContent = $ipsumFile->getContent();
        $ipsumLines   = u( $ipsumContent )->split('.');
        $ipsumResult  = [];

        foreach ( $ipsumLines as $value ) {

            $line = $value->trim()->toString();
            if ( !empty($line) ) {

                array_push($ipsumResult, $line);
            }
        }

        array_unique( $ipsumResult );

        return $ipsumResult;
    }

    public function load(ObjectManager $manager): void
    {
        $loremIpsum = $this->loadLoremIpsumFromFile();
        $ipsumCount = sizeof( $loremIpsum );
        $dateNow    = new DateTime();
        $slugger    = new AsciiSlugger();

        for ($i = 0; $i < 100; $i++) {

            $activiteId  = Uuid::uuid4();
            $titre       = 'Activité #' . random_int(100, 999);
            $description = $loremIpsum[ random_int(0, $ipsumCount-1) ];
            $image       = 'img/noimage.jpg';
            $slug        = $slugger->slug( strtolower( $titre ), '-' );
            $dateDebut   = new DateTime();
            $dateFin     = new DateTime();

            $dateDebut->add( new DateInterval('P7D') );
            $dateFin->add( new DateInterval('P21D') );

            $activite = new Activite();

            $activite->setTitre( $titre );
            $activite->setImage( $image );
            $activite->setDescription( $description );
            $activite->setDateDebut( $dateDebut );
            $activite->setDateFin( $dateFin );

            $activite->setSlug( $slug );
            $activite->setActiviteId( $activiteId );
            $activite->setDateCreation( $dateNow );
            $activite->setDateModification( $dateNow );

            $manager->persist($activite);
        }

        $manager->flush();
    }
}
