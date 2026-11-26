<x-admin-layout>
    <h1 class="font-display font-bold text-2xl mb-6">Edit Portfolio</h1>

    <form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 grid gap-5 max-w-2xl">
        @csrf
        @method('PATCH')

        <div>
            <x-input-label for="name" value="Nama Sekolah" />
            <x-text-input id="name" name="name" class="mt-1 w-full" :value="old('name', $portfolio->name)" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="school_type" value="Jenis Sekolah" />
                <select id="school_type" name="school_type" required class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                    @foreach (['SD', 'SMP', 'SMA', 'SMK', 'Sekolah Luar Biasa', 'Yayasan'] as $type)
                        <option value="{{ $type }}" @selected(old('school_type', $portfolio->school_type) === $type)>{{ $type }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('school_type')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="region" value="Wilayah" />
                <x-text-input id="region" name="region" class="mt-1 w-full" :value="old('region', $portfolio->region)" />
                <x-input-error :messages="$errors->get('region')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input-label for="description" value="Deskripsi Singkat" />
            <textarea id="description" name="description" rows="3" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('description', $portfolio->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="features" value="Fitur (pisahkan dengan koma)" />
            <x-text-input id="features" name="features" class="mt-1 w-full" :value="old('features', is_array($portfolio->features) ? implode(', ', $portfolio->features) : $portfolio->features)" />
            <x-input-error :messages="$errors->get('features')" class="mt-2" />
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="live_url" value="URL Website (opsional)" />
                <x-text-input id="live_url" name="live_url" class="mt-1 w-full" :value="old('live_url', $portfolio->live_url)" placeholder="https://..." />
                <x-input-error :messages="$errors->get('live_url')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="thumbnail" value="Thumbnail (opsional)" />
                <input id="thumbnail" name="thumbnail" type="file" accept="image/*" class="mt-1 w-full text-sm text-gray-500 dark:text-gray-400 file:mr-3 file:rounded-lg file:border-0 file:bg-board file:px-4 file:py-2 file:text-sm file:font-semibold file:text-chalk hover:file:bg-board-deep">
                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-2">
            <input id="is_published" name="is_published" type="checkbox" value="1" @checked(old('is_published', $portfolio->is_published)) class="rounded border-gray-300 dark:border-gray-700 text-board focus:ring-board" />
            <x-input-label for="is_published" value="Tampilkan di halaman publik" />
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="inline-flex items-center bg-board text-chalk font-semibold px-6 py-2.5 rounded-lg hover:bg-board-deep transition-colors">Simpan Perubahan</button>
            <a href="{{ route('admin.portfolio.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">Batal</a>
        </div>
    </form>
</x-admin-layout>