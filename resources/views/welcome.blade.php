<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporDesa - Portal Pengaduan Infrastruktur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 font-sans antialiased p-6">

    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <header class="mb-8 text-center">
            <h1 class="text-4xl font-bold text-blue-700 mb-2">LaporDesa</h1>
            <p class="text-slate-500">Portal Digitalisasi & Pengaduan Warga Desa Jimbaran Wetan</p>
        </header>

        <!-- Pesan Sukses -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Form Laporan -->
            <div class="col-span-1 bg-white p-6 rounded-lg shadow-md h-fit">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">Buat Laporan Baru</h2>
                <form action="{{ route('lapor.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Judul Laporan</label>
                        <input type="text" name="title" required placeholder="Contoh: Saluran Air RT 02 Mampet" 
                            class="w-full border-slate-300 border rounded-md p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-1">Deskripsi & Lokasi</label>
                        <textarea name="description" rows="4" required placeholder="Jelaskan detail masalah dan lokasi spesifiknya..." 
                            class="w-full border-slate-300 border rounded-md p-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
                        Kirim Laporan
                    </button>
                </form>
            </div>

            <!-- Daftar Laporan -->
            <div class="col-span-1 md:col-span-2">
                <h2 class="text-xl font-semibold mb-4">Daftar Laporan Warga</h2>
                
                @if($reports->isEmpty())
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center text-slate-500">
                        Belum ada laporan masuk.
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($reports as $report)
                            <div class="bg-white p-5 rounded-lg shadow-sm border-l-4 {{ $report->status == 'resolved' ? 'border-green-500' : 'border-yellow-400' }}">
                                <div class="flex justify-between items-start mb-2">
                                    <h3 class="font-bold text-lg">{{ $report->title }}</h3>
                                    <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $report->status == 'resolved' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ strtoupper($report->status) }}
                                    </span>
                                </div>
                                <p class="text-slate-600 mb-2">{{ $report->description }}</p>
                                <span class="text-xs text-slate-400">Dilaporkan pada: {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y, H:i') }}</span>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>
</html>