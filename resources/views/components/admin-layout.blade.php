@props(['header' => null])

<x-app-layout>
    @if ($header)
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[220px_1fr]">
                <aside class="lg:sticky lg:top-6 self-start">
                    <nav class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-4 space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-board text-chalk' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.portfolio.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.portfolio.*') ? 'bg-board text-chalk' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            Portfolio
                        </a>
                        <a href="{{ route('admin.packages.index') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.packages.*') ? 'bg-board text-chalk' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            Paket
                        </a>
                        <a href="{{ route('admin.settings.edit') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.settings.*') ? 'bg-board text-chalk' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                            Pengaturan
                        </a>
                        <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                            Lihat Situs →
                        </a>
                    </nav>
                </aside>

                <div>
                    @if (session('success'))
                        <div class="mb-6 rounded-xl border border-green-600 bg-green-100 dark:bg-green-900 px-5 py-4 text-sm text-green-800 dark:text-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>