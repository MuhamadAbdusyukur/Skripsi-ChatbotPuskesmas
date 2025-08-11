<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kritik dan Saran</title>
    <style>
        /* CSS sederhana untuk tabel di PDF */
        body { 
            font-family: sans-serif; 
            margin: 0;
            padding: 0;
        }

        /* CSS untuk HEADER (tabel 3 kolom) - TANPA GARIS */
        table.header-table { 
            width: 100%; 
            border-collapse: collapse; 
            border: none;
            margin-bottom: 10px; 
        }
        .header-table td { 
            padding: 0; 
            border: none;
        }
        
        /* CSS untuk TABEL DATA - DENGAN GARIS */
        table.data-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        .data-table, .data-table th, .data-table td { 
            border: 1px solid black;
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
    {{-- BAGIAN HEADER --}}
    <table class="header-table">
        <tr>
            <td style="width: 20%; text-align: left; padding: 0 0 0 20px;">
                <img src="{{ public_path('dashboard/img/Logo_Puskesmas.jpg') }}" style="width: 60px; height: auto;">
            </td>
            
            <td style="width: 60%; text-align: center; padding: 0;">
                <h3 style="margin: 0; font-size: 18px; color: #333;">PUSKESMAS BANJARWANGI</h3>
                <h4 style="margin-top: 5px; font-size: 12px; color: #666; font-weight: normal;">Banjarwangi, Kec. Banjarwangi, Kabupaten Garut, Jawa Barat 44172</h4>
            </td>
            
            <td style="width: 20%; text-align: right; padding: 0 20px 0 0;">
                <img src="{{ public_path('dashboard/img/Logo_Kemenkes.png') }}" style="width: 60px; height: auto;">
            </td>
        </tr>
    </table>

    {{-- BAGIAN JUDUL LAPORAN --}}
    <div style="text-align: center; margin-bottom: 20px;">
        <h4 style="margin: 0; font-size: 16px; color: #333;">LAPORAN KRITIK DAN SARAN</h4>
        {{-- Tanggal laporan --}}
        @if (isset($periode))
            <h5 style="margin: 0; font-size: 14px; color: #666; font-weight: normal;">Periode: {{ $periode }}</h5>
        @endif
    </div>
    
    {{-- BAGIAN TABEL DATA --}}
    <table class="data-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Layanan</th>
                <th>Pesan</th>
                <th>Tanggal Kirim</th>
            </tr>
        </thead>
        <tbody>
            {{-- Menggunakan $feedbacks yang dikirim dari controller --}}
            @foreach ($feedbacks as $feedback)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $feedback->nama }}</td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->layanan }}</td>
                <td>{{ $feedback->pesan }}</td>
                <td>{{ $feedback->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 