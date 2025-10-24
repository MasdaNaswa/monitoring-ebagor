<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PK Bupati {{ $year }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        td.text-left {
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>LAPORAN PK BUPATI {{ $year }}</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Sasaran Strategis</th>
                <th>Indikator Kinerja</th>
                <th>Target 2025</th>
                <th>Satuan</th>
                <th>Penanggung Jawab</th>
                <th>TW I</th>
                <th>TW II</th>
                <th>TW III</th>
                <th>TW IV</th>
                <th>Realisasi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td class="text-left">{{ $item->sasaran_strategis ?? '-' }}</td>
                    <td class="text-left">{{ $item->indikator_kinerja ?? '-' }}</td>
                    <td>{{ $item->target_2025 ?? '-' }}</td>
                    <td>{{ $item->satuan ?? '-' }}</td>
                    <td class="text-left">{{ $item->penanggung_jawab ?? '-' }}</td>
                    <td>{{ $item->tw1 ?? '-' }}</td>
                    <td>{{ $item->tw2 ?? '-' }}</td>
                    <td>{{ $item->tw3 ?? '-' }}</td>
                    <td>{{ $item->tw4 ?? '-' }}</td>
                    <td>{{ $item->realisasi ?? '-' }}</td>
                    <td class="text-left">{{ $item->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
