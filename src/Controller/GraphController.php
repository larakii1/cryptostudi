<?php

namespace App\Controller;

use App\Entity\PriceVariation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class GraphController extends AbstractController
{
    #[Route('/graph', name: 'graph')]
    public function index(ChartBuilderInterface $chartBuilder, PriceVariation $priceVariation): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',

                ],
            ],
        ]);

        $chart->setOptions([/* ... */]);

        return $this->render('graph/index.html.twig', [
            'chart' => $chart,
        ]);
    }
}
