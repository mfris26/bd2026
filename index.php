<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SIAKAD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col justify-between">

    <header class="w-full bg-white border-b border-slate-200 shadow-sm sticky top-0 z-50">
        <?php include "atas.php"; ?>
    </header>

    <div class="max-w-7xl w-full mx-auto px-4 py-8 flex-1 flex flex-col md:flex-row gap-6">
        
        <aside class="w-full md:w-64 shrink-0 bg-white p-4 rounded-xl border border-slate-200/60 shadow-sm h-fit">
            <?php include "menu_kiri.php"; ?>
        </aside>
        
        <main class="flex-1 bg-white p-8 rounded-xl border border-slate-200/60 shadow-sm flex flex-col justify-between min-h-[450px]">
            
            <div class="bg-emerald-50 border-l-4 border-emerald-700 p-6 rounded-r-xl shadow-sm">
                <h2 class="text-2xl font-bold text-emerald-900 tracking-tight">Selamat Datang !</h2>
                <p class="mt-1 text-sm text-emerald-700 font-medium">Sistem Informasi Academic Universitas Djuanda</p>
            </div>

            <div class="flex-1 flex items-center justify-center py-12">
                <div class="p-6 bg-slate-50/50 border border-slate-100 rounded-full shadow-inner hover:scale-105 transition-transform duration-300">
                    <img src="Unida.png" width="180" alt="Logo Unida" class="object-contain filter drop-shadow-md">
                </div>
            </div>

            <div class="border-t border-slate-100 pt-4 flex items-center justify-between text-xs text-slate-400 font-medium">
                <span>Status Koneksi: <span class="text-emerald-500 font-bold">● Terhubung</span></span>
                <span>SIAKAD Portal v2.0</span>
            </div>

        </main>
    </div>

    <footer class="w-full bg-white border-t border-slate-200 py-4 mt-8">
        <div class="max-w-7xl mx-auto px-6">
            <?php include "bawah.php"; ?>
        </div>
    </footer>

</body>
</html>