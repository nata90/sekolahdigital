<x-admin-layout>
    <div class="flex items-center justify-between gap-4 mb-6">
        <h1 class="font-display font-bold text-2xl">Portfolio</h1>
        <a href="{{ route('admin.portfolio.create') }}" class="inline-flex items-center gap-2 bg-board text-chalk font-semibold text-sm px-4 py-2.5 rounded-lg hover:bg-board-deep transition-colors">
            + Tambah Portfolio
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">
        @if ($items->isEmpty())
            <p class="p-8 text-gray-500 dark:text-gray-400 text-sm">Belum ada portfolio. Tambahkan portfolio pertama.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Sekolah</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Jenis</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Wilayah</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold text-gray-500 dark:text-gray-300 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $item->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $item->school_type }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">{{ $item->region }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if ($item->is_published)
                                        <span class="inline-flex px-2.5 py-1 rounded-full bg-leaf/15 text-leaf-soft text-xs font-semibold">Tayang</span>
                                    @else
                                        <span class="inline-flex px-2.5 py-1 rounded-full bg-gray-200 dark:bg-gray-600 text-gray-600 dark:text-gray-300 text-xs font-semibold">Disembunyikan</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right text-sm space-x-3">
                                    <a href="{{ route('admin.portfolio.edit', $item) }}" class="font-medium text-leaf-soft hover:underline">Edit</a>
                                    <form method="POST" action="{{ route('admin.portfolio.destroy', $item) }}" class="inline" onsubmit="return confirm('Hapus portfolio ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-admin-layout>