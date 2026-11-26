<x-admin-layout>
    <h1 class="font-display font-bold text-2xl mb-6">Dashboard</h1>

    <div class="grid gap-4 sm:grid-cols-3">
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">Total Portfolio</p>
            <p class="mt-1 font-display font-bold text-3xl text-gray-900 dark:text-gray-100">{{ $stats['portfolios'] }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">Portfolio Tayang</p>
            <p class="mt-1 font-display font-bold text-3xl text-gray-900 dark:text-gray-100">{{ $stats['published'] }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6">
            <p class="text-sm text-gray-500 dark:text-gray-400">Paket Aktif</p>
            <p class="mt-1 font-display font-bold text-3xl text-gray-900 dark:text-gray-100">{{ $stats['packages'] }}</p>
        </div>
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-2">
        <a href="{{ route('admin.portfolio.create') }}" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 hover:border-leaf transition-colors">
            <p class="font-display font-semibold text-lg">Tambah Portfolio</p>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Tambahkan sekolah klien ke halaman portfolio.</p>
        </a>
        <a href="{{ route('admin.settings.edit') }}" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 hover:border-leaf transition-colors">
            <p class="font-display font-semibold text-lg">Pengaturan Situs</p>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola nomor WhatsApp, teks hero, dan deskripsi SEO.</p>
        </a>
    </div>
</x-admin-layout>