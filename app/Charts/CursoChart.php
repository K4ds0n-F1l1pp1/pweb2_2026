<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class CursoChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return (new LarapexChart)->pieChart()
            ->setTitle('Cursos Disponíveis')
            ->setSubtitle('Semestre 2026.2')
            ->addData([40, 50, 30])
            ->setLabels(['TDS', 'SER', 'TI']);
    }
}
