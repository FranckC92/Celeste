<?php

namespace App\Controller\Admin;

use App\Service\Admin\EntityViewer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LayoutController extends AbstractController
{
    #[Route('/admin/meta/entities', name: 'admin_meta_entities')]
    public function getAllEntities(EntityViewer $entities): Response
    {
        return $this->render('admin/meta/_entities.html.twig', [
            'allEntities' => $entities->getAllNames(),
        ]);
    }
}
