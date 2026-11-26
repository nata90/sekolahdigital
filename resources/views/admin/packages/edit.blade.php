<x-admin-layout>
    <h1 class="font-display font-bold text-2xl mb-6">Edit Paket: {{ $package->name }}</h1>

    <form method="POST" action="{{ route('admin.packages.update', $package) }}" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 grid gap-5 max-w-2xl">
        @csrf
        @method('PATCH')

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="name" value="Nama Paket" />
                <x-text-input id="name" name="name" class="mt-1 w-full" :value="old('name', $package->name)" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="price_display" value="Tampilan Harga" />
                <x-text-input id="price_display" name="price_display" class="mt-1 w-full" :value="old('price_display', $package->price_display)" placeholder="Contoh: Rp 12.000.000" required />
                <x-input-error :messages="$errors->get('price_display')" class="mt-2" />
            </div>
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="timeline" value="Timeline" />
                <x-text-input id="timeline" name="timeline" class="mt-1 w-full" :value="old('timeline', $package->timeline)" placeholder="Contoh: 4–6 minggu" />
                <x-input-error :messages="$errors->get('timeline')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="highlight" value="Highlight (opsional)" />
                <x-text-input id="highlight" name="highlight" class="mt-1 w-full" :value="old('highlight', $package->highlight)" />
                <x-input-error :messages="$errors->get('highlight')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input-label for="description" value="Deskripsi Paket" />
            <textarea id="description" name="description" rows="2" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('description', $package->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="cta_text" value="Teks Tombol (opsional)" />
            <x-text-input id="cta_text" name="cta_text" class="mt-1 w-full" :value="old('cta_text', $package->cta_text)" placeholder="Contoh: Tanya Paket Ini" />
            <x-input-error :messages="$errors->get('cta_text')" class="mt-2" />
        </div>

        <div>
            <x-input-label value="Termasuk (satu fitur per baris)" />
            <textarea name="included" rows="10" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('included', is_array($package->included) ? implode("\n", $package->included) : '') }}</textarea>
            <x-input-error :messages="$errors->get('included')" class="mt-2" />
        </div>

        <div>
            <x-input-label value="Tidak Termasuk (satu fitur per baris)" />
            <textarea name="not_included" rows="4" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('not_included', is_array($package->not_included) ? implode("\n", $package->not_included) : '') }}</textarea>
            <x-input-error :messages="$errors->get('not_included')" class="mt-2" />
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <label class="flex items-center gap-2">
                <input name="is_popular" type="checkbox" value="1" @checked(old('is_popular', $package->is_popular)) class="rounded border-gray-300 dark:border-gray-700 text-board focus:ring-board" />
                <span class="text-sm text-gray-700 dark:text-gray-300">Tandai paling populer</span>
            </label>
            <label class="flex items-center gap-2">
                <input name="is_active" type="checkbox" value="1" @checked(old('is_active', $package->is_active)) class="rounded border-gray-300 dark:border-gray-700 text-board focus:ring-board" />
                <span class="text-sm text-gray-700 dark:text-gray-300">Aktif di halaman publik</span>
            </label>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="inline-flex items-center bg-board text-chalk font-semibold px-6 py-2.5 rounded-lg hover:bg-board-deep transition-colors">Simpan Perubahan</button>
            <a href="{{ route('admin.packages.index') }}" class="text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">Batal</a>
        </div>
    </form>
</x-admin-layout>