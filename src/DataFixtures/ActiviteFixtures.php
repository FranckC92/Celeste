<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use App\Entity\Commentaire;
use App\Service\LoremGenerator;
use DateInterval;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\String\Slugger\AsciiSlugger;


class ActiviteFixtures extends Fixture
{
    private LoremGenerator $lorem;

    public function __construct(LoremGenerator $lorem)
    {
        $this->lorem = $lorem;
    }

    public function load(ObjectManager $manager, ): void
    {
        $dateNow    = new DateTime();
        $slugger    = new AsciiSlugger();
        $auteurs    = [ 'Humain', 'Elfe', 'Troll', 'Gobelin' ];

        $activites = [];
        for ( $i=0; $i<6; $i++ ) {
            $titre       = 'Activité #' . random_int( 100, 999 );
            $description = $this->lorem->generate( 'lg' );
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
            $activite->setDateCreation( $dateNow );
            $activite->setDateModification( $dateNow );

            $manager->persist( $activite );

            $activites[] = $activite;
        }

        $manager->flush();

        foreach ( $activites as $activite ) {
            for ( $i=0; $i<3; $i++ ) {
                $commentaire = new Commentaire();

                $commentaire->setAuteur( $auteurs[ random_int( 0, (sizeof( $auteurs ) - 1) ) ] );
                $commentaire->setContenu( $this->lorem->generate( 'lg' ) );
                $commentaire->setSlug( (Uuid::uuid4())->toString() );

                $commentaireCreeLe  = new DateTime();
                $commentaireModifie = new DateTime();

                $commentaireCreeLe->add( new DateInterval('PT3H') );
                $commentaireModifie->add( new DateInterval('PT10M') );

                $commentaire->setDateCreation( $commentaireCreeLe );
                $commentaire->setDateModification( $commentaireModifie );

                $commentaire->setActivite( $activite );

                $manager->persist( $commentaire );
            }
        }

        $manager->flush();
    }
}
