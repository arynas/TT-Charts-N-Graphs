<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lava;

use App\Http\Requests;

class DemosController extends Controller
{
    public function sample()
    {
        //AreaChart
        $population = Lava::DataTable();

        $population->addDateColumn('Year')
            ->addNumberColumn('Number of People')
            ->addRow(['2006', 623452])
            ->addRow(['2007', 685034])
            ->addRow(['2008', 716845])
            ->addRow(['2009', 757254])
            ->addRow(['2010', 778034])
            ->addRow(['2011', 792353])
            ->addRow(['2012', 839657])
            ->addRow(['2013', 842367])
            ->addRow(['2014', 873490]);
        
        Lava::AreaChart('Population', $population, [
            'title' => 'Population Growth',
            'legend' => [
                'position' => 'in'
            ],
        ]);

        //AreaChart
        $reasons = Lava::DataTable();

        $reasons->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['Check Reviews', 5])
            ->addRow(['Watch Trailers', 2])
            ->addRow(['See Actors Other Work', 4])
            ->addRow(['Settle Argument', 89]);

        Lava::DonutChart('IMDB', $reasons, [
            'title' => 'Reasons I visit IMDB',
        ]);
        
        return view('demos.sample', compact('areachart','population','donutchart','imdb'));
    }

    public function practice()
    {
        $population = Lava::DataTable();

        $population->addDateColumn('Year')
            ->addNumberColumn('Data Mahasiswa')
            ->addRow(['2010', 4000])
            ->addRow(['2011', 5000])
            ->addRow(['2012', 3000])
            ->addRow(['2013', 6000]);

        Lava::AreaChart('Population', $population, [
            'title' => 'Population Growth',
            'legend' => [
                'position' => 'in'
            ],
            'width' => 600,
            'height' => 300
        ]);

        $temps = Lava::DataTable();

        $temps->addStringColumn('Type')
            ->addNumberColumn('Value')
            ->addRow(['CPU', rand(0,100)])
            ->addRow(['Case', rand(0,100)])
            ->addRow(['Graphics', rand(0,100)]);

        Lava::GaugeChart('Temps', $temps, [
            'width'      => 400,
            'greenFrom'  => 0,
            'greenTo'    => 69,
            'yellowFrom' => 70,
            'yellowTo'   => 89,
            'redFrom'    => 90,
            'redTo'      => 100,
            'majorTicks' => [
                'Safe',
                'Critical'
            ]
        ]);

        return view('demos.practice',compact('areachart','population','gaugechart','temps'));
    }
}
