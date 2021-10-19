<?php

namespace App\Controller;

use App\Entity\PriceVariation;
use App\Repository\PriceVariationRepository;
use Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class GraphController extends AbstractController
{
    #[Route('/graph', name: 'graph')]
    public function index(ChartBuilderInterface $chartBuilder, PriceVariationRepository $pre): Response
    {
        $data = [];
        $periode = [];
        $date = $pre->queryDate();
        $comprator = $pre->getTotalPriceVariation();
        foreach ($comprator as $comparatedata) {
            $data[] = (int) $comparatedata["total"];
        }

        foreach ($date as $dates) {

            $periode[] = $dates["date"];
        }


        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        /*$chart->setData([
            // 'labels' => $periode,
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(31,195,108)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $data
                ],
            ],
        ]);*/

        $chart->setOptions([/* ... */]);

        return $this->render('graph/index.html.twig', [
            //'chart' => $chart,
            'labels' => json_encode($periode),
            'data' => json_encode($data)

        ]);
    }
}
