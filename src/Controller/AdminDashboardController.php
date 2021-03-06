<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Service\StatsService;

class AdminDashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(ObjectManager $manager, StatsService $statservice)
    {

        $stats = $statservice->getStats();
        $bestAds = $statservice->getAdsStats('DESC');
        $worstAds = $statservice->getAdsStats('ASC');
        return $this->render('admin/dashboard/index.html.twig', [
            'stat' => $stats,
            'bestAds' => $bestAds,
            'worstAds' => $worstAds

        ]);
    }
}
