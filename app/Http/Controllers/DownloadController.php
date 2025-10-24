<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class DownloadController extends Controller
{
    // Data dummy global untuk modal, PDF, Excel
    private $dummyData = [
        [
            'no' => 1,
            'tahun' => 2025,
            'sasaranStrategis' => 'Sasaran Strategis 1',
            'indikatorKinerja' => 'Indikator 1',
            'target2025' => '100',
            'satuan' => 'Unit',
            'program' => 'Program A',
            'analisisEvaluasi' => 'Analisis A',
            'penanggungJawab' => 'Admin',
            'targetTW1' => 25,
            'realisasiTW1' => 20,
            'paguAnggaranTW1' => 5000000,
            'realisasiAnggaranTW1' => 4500000,
            'targetTW2' => 25,
            'realisasiTW2' => 22,
            'paguAnggaranTW2' => 5000000,
            'realisasiAnggaranTW2' => 4700000,
            'targetTW3' => 25,
            'realisasiTW3' => 24,
            'paguAnggaranTW3' => 5000000,
            'realisasiAnggaranTW3' => 4800000,
            'targetTW4' => 25,
            'realisasiTW4' => 25,
            'paguAnggaranTW4' => 5000000,
            'realisasiAnggaranTW4' => 5000000,
        ],
        [
            'no' => 2,
            'tahun' => 2025,
            'sasaranStrategis' => 'Sasaran Strategis 2',
            'indikatorKinerja' => 'Indikator 2',
            'target2025' => '200',
            'satuan' => 'Unit',
            'program' => 'Program B',
            'analisisEvaluasi' => 'Analisis B',
            'penanggungJawab' => 'Admin',
            'targetTW1' => 50,
            'realisasiTW1' => 45,
            'paguAnggaranTW1' => 10000000,
            'realisasiAnggaranTW1' => 9000000,
            'targetTW2' => 50,
            'realisasiTW2' => 48,
            'paguAnggaranTW2' => 10000000,
            'realisasiAnggaranTW2' => 9500000,
            'targetTW3' => 50,
            'realisasiTW3' => 49,
            'paguAnggaranTW3' => 10000000,
            'realisasiAnggaranTW3' => 9800000,
            'targetTW4' => 50,
            'realisasiTW4' => 50,
            'paguAnggaranTW4' => 10000000,
            'realisasiAnggaranTW4' => 10000000,
        ],
    ];

    /**
     * Ambil semua data dummy untuk modal (JSON)
     */
    public function getAllDummyData()
    {
        return response()->json($this->dummyData);
    }

    /**
     * Download PK Bupati sebagai PDF (Dummy)
     */
    public function downloadPKPdf(Request $request)
    {
        $year = $request->get('year', 2025);
        $data = $this->dummyData;

        $pdf = Pdf::loadView('export.pk-bupati-pdf', [
            'data' => $data,
            'year' => $year
        ])->setPaper('A4', 'landscape');

        $filename = 'pk_bupati_dummy_' . date('Y-m-d_H-i-s') . '.pdf';
        return $pdf->download($filename);
    }

    /**
     * Download PK Bupati sebagai Excel (Dummy)
     */
    public function downloadPKExcel(Request $request)
    {
        $year = $request->get('year', date('Y'));

        // Data dummy sesuai struktur detail modal
        $data = [
            (object) [
                'no' => 1,
                'tahun' => $year,
                'sasaran_strategis' => 'Sasaran Strategis 1',
                'indikator_kinerja' => 'Indikator 1',
                'target_2025' => '100',
                'satuan' => 'Unit',

                // TW1
                'targetTW1' => 25,
                'realisasiTW1' => 20,
                'paguAnggaranTW1' => 5000000,
                'realisasiAnggaranTW1' => 4500000,

                // TW2
                'targetTW2' => 25,
                'realisasiTW2' => 22,
                'paguAnggaranTW2' => 6000000,
                'realisasiAnggaranTW2' => 5800000,

                // TW3
                'targetTW3' => 25,
                'realisasiTW3' => 24,
                'paguAnggaranTW3' => 7000000,
                'realisasiAnggaranTW3' => 6800000,

                // TW4
                'targetTW4' => 25,
                'realisasiTW4' => 25,
                'paguAnggaranTW4' => 8000000,
                'realisasiAnggaranTW4' => 7900000,

                'program' => 'Program Pembangunan Daerah',
                'analisisEvaluasi' => 'Realisasi cukup baik, hanya ada kendala di TW1',
                'penanggung_jawab' => 'Admin'
            ],
            (object) [
                'no' => 2,
                'tahun' => $year,
                'sasaran_strategis' => 'Sasaran Strategis 2',
                'indikator_kinerja' => 'Indikator 2',
                'target_2025' => '200',
                'satuan' => 'Unit',

                // TW1
                'targetTW1' => 50,
                'realisasiTW1' => 40,
                'paguAnggaranTW1' => 10000000,
                'realisasiAnggaranTW1' => 9500000,

                // TW2
                'targetTW2' => 50,
                'realisasiTW2' => 48,
                'paguAnggaranTW2' => 11000000,
                'realisasiAnggaranTW2' => 10800000,

                // TW3
                'targetTW3' => 50,
                'realisasiTW3' => 49,
                'paguAnggaranTW3' => 12000000,
                'realisasiAnggaranTW3' => 11800000,

                // TW4
                'targetTW4' => 50,
                'realisasiTW4' => 50,
                'paguAnggaranTW4' => 13000000,
                'realisasiAnggaranTW4' => 12900000,

                'program' => 'Program Penguatan Infrastruktur',
                'analisisEvaluasi' => 'Realisasi maksimal, sesuai target',
                'penanggung_jawab' => 'Admin'
            ],
        ];

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul
        $sheet->setCellValue('A1', 'LAPORAN DETAIL PK BUPATI ' . $year);
        $sheet->mergeCells('A1:Z1');
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Header tabel
        $headers = [
            'No',
            'Tahun',
            'Sasaran Strategis',
            'Indikator Kinerja',
            'Target 2025',
            'Satuan',
            'Target TW1',
            'Realisasi TW1',
            'Pagu TW1',
            'Realisasi Anggaran TW1',
            'Target TW2',
            'Realisasi TW2',
            'Pagu TW2',
            'Realisasi Anggaran TW2',
            'Target TW3',
            'Realisasi TW3',
            'Pagu TW3',
            'Realisasi Anggaran TW3',
            'Target TW4',
            'Realisasi TW4',
            'Pagu TW4',
            'Realisasi Anggaran TW4',
            'Program',
            'Analisis Evaluasi',
            'Penanggung Jawab'
        ];

        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '3', $header);
            $sheet->getStyle($col . '3')->getFont()->setBold(true);
            $col++;
        }

        // Isi data
        $row = 4;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item->no);
            $sheet->setCellValue('B' . $row, $item->tahun);
            $sheet->setCellValue('C' . $row, $item->sasaran_strategis);
            $sheet->setCellValue('D' . $row, $item->indikator_kinerja);
            $sheet->setCellValue('E' . $row, $item->target_2025);
            $sheet->setCellValue('F' . $row, $item->satuan);

            $sheet->setCellValue('G' . $row, $item->targetTW1);
            $sheet->setCellValue('H' . $row, $item->realisasiTW1);
            $sheet->setCellValue('I' . $row, $item->paguAnggaranTW1);
            $sheet->setCellValue('J' . $row, $item->realisasiAnggaranTW1);

            $sheet->setCellValue('K' . $row, $item->targetTW2);
            $sheet->setCellValue('L' . $row, $item->realisasiTW2);
            $sheet->setCellValue('M' . $row, $item->paguAnggaranTW2);
            $sheet->setCellValue('N' . $row, $item->realisasiAnggaranTW2);

            $sheet->setCellValue('O' . $row, $item->targetTW3);
            $sheet->setCellValue('P' . $row, $item->realisasiTW3);
            $sheet->setCellValue('Q' . $row, $item->paguAnggaranTW3);
            $sheet->setCellValue('R' . $row, $item->realisasiAnggaranTW3);

            $sheet->setCellValue('S' . $row, $item->targetTW4);
            $sheet->setCellValue('T' . $row, $item->realisasiTW4);
            $sheet->setCellValue('U' . $row, $item->paguAnggaranTW4);
            $sheet->setCellValue('V' . $row, $item->realisasiAnggaranTW4);

            $sheet->setCellValue('W' . $row, $item->program);
            $sheet->setCellValue('X' . $row, $item->analisisEvaluasi);
            $sheet->setCellValue('Y' . $row, $item->penanggung_jawab);

            $row++;
        }

        // Auto width kolom
        foreach (range('A', 'Y') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'pk_bupati_detail_' . date('Y-m-d_H-i-s') . '.xlsx';

        return response()->streamDownload(function () use ($writer) {
            $writer->save('php://output');
        }, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }

}
