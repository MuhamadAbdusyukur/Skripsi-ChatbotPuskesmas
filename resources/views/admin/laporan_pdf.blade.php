<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pengunjung Tanggal {{ \Carbon\Carbon::parse($tgl_kunjung)->format('d F Y') }}</title>
    <style>
        /* CSS sederhana untuk tabel di PDF */
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; font-size: 10px; }
        th { background-color: #f2f2f2; }

        body { font-family: sans-serif; }
    
    /* * CSS untuk HEADER (tabel 3 kolom) - TANPA GARIS
     */
    table.header-table { 
        width: 100%; 
        border-collapse: collapse; 
        border: none; /* Hilangkan border pada tabel header */
        margin-bottom: 10px; 
    }
    .header-table td { 
        padding: 0; 
        border: none; /* Hilangkan border pada sel (kolom) di header */
    }
    
    /* * CSS untuk TABEL DATA - DENGAN GARIS
     */
    table.data-table { 
        width: 100%; 
        border-collapse: collapse; 
        margin-top: 20px; 
    }
    .data-table, .data-table th, .data-table td { 
        border: 1px solid black; /* Berikan border HANYA pada tabel data */
    }
    .data-table th, .data-table td { 
        padding: 8px; 
        text-align: left; 
        font-size: 10px; 
    }
    .data-table th { 
        background-color: #f2f2f2; 
    }
    </style>
</head>
<body>
    <table style="width: 100%; border-collapse: collapse; border: none !important;">
        <tr>
            <td style="width: 20%; text-align: left; padding: 0 0 0 20px; border: none !important;">
                <img src="{{ public_path('dashboard/img/Logo_Puskesmas.jpg') }}" style="width: 60px; height: auto;">
            </td>
            
            <td style="width: 60%; text-align: center; padding: 0; border: none !important;">
                <h3 style="margin: 0; font-size: 18px; color: #333;">PUSKESMAS BANJARWANGI</h3>
                <h4 style="margin-top: 5px; font-size: 12px; color: #666; font-weight: normal;">Banjarwangi, Kec. Banjarwangi, Kabupaten Garut, Jawa Barat 44172</h4>
            </td>
            
            <td style="width: 20%; text-align: right; padding: 0 20px 0 0; border: none !important;">
                <img src="{{ public_path('dashboard/img/Logo_Kemenkes.png') }}" style="width: 60px; height: auto;">
            </td>
        </tr>
    </table>

    
    <div style="text-align: center; margin-bottom: 20px;">
        <h4 style="margin: 0; font-size: 16px; color: #333;">LAPORAN DATA PENGUNJUNG</h4>
        <h5 style="margin: 0; font-size: 14px; color: #666; font-weight: normal;">TANGGAL {{ \Carbon\Carbon::parse($tgl_kunjung)->format('d F Y') }}</h5>
    </div>
    
    <table class="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>TELEPON</th>
                <th>JENIS POLI</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPengunjung as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->telepon }}</td>
                <td>{{ $item->poli->nama ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>