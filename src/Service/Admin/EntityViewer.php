<?php

namespace App\Service\Admin;

use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;

class EntityViewer
{
    private EntityManager $em;

    public function __construct(ManagerRegistry $doctrine) {
        $this->em = $doctrine->getManager();
    }


    public function getAllNames(): ?array
    {
        $metadataFactory = $this->em->getMetadataFactory();
        $allMetadata = $metadataFactory->getAllMetadata();
        $allEntities = [];

        foreach ( $allMetadata as $entityMetadata ) {
            array_push( $allEntities, substr(
                $entityMetadata->name,
                strlen( $entityMetadata->namespace ) + 1
            ));
        }

        return $allEntities;
    }
}
