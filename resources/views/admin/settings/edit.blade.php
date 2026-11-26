<x-admin-layout>
    <h1 class="font-display font-bold text-2xl mb-6">Pengaturan Situs</h1>

    <form method="POST" action="{{ route('admin.settings.update') }}" class="bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 p-6 grid gap-5 max-w-2xl">
        @csrf
        @method('PATCH')

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="wa_number" value="Nomor WhatsApp (format 62, tanpa + dan spasi)" />
                <x-text-input id="wa_number" name="wa_number" class="mt-1 w-full" :value="old('wa_number', $settings['wa_number'] ?? '')" required />
                <x-input-error :messages="$errors->get('wa_number')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="wa_message_default" value="Pesan WA Default" />
                <x-text-input id="wa_message_default" name="wa_message_default" class="mt-1 w-full" :value="old('wa_message_default', $settings['wa_message_default'] ?? '')" required />
                <x-input-error :messages="$errors->get('wa_message_default')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input-label for="hero_headline" value="Judul Hero (Beranda)" />
            <x-text-input id="hero_headline" name="hero_headline" class="mt-1 w-full" :value="old('hero_headline', $settings['hero_headline'] ?? '')" required />
            <x-input-error :messages="$errors->get('hero_headline')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hero_subheadline" value="Subjudul Hero" />
            <textarea id="hero_subheadline" name="hero_subheadline" rows="2" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('hero_subheadline', $settings['hero_subheadline'] ?? '') }}</textarea>
            <x-input-error :messages="$errors->get('hero_subheadline')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hero_badge" value="Badge Hero (opsional)" />
            <x-text-input id="hero_badge" name="hero_badge" class="mt-1 w-full" :value="old('hero_badge', $settings['hero_badge'] ?? '')" />
            <x-input-error :messages="$errors->get('hero_badge')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="about_intro" value="Intro Halaman Tentang" />
            <textarea id="about_intro" name="about_intro" rows="2" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('about_intro', $settings['about_intro'] ?? '') }}</textarea>
            <x-input-error :messages="$errors->get('about_intro')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="about_story" value="Cerita Halaman Tentang" />
            <textarea id="about_story" name="about_story" rows="4" class="mt-1 w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">{{ old('about_story', $settings['about_story'] ?? '') }}</textarea>
            <x-input-error :messages="$errors->get('about_story')" class="mt-2" />
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="meta_title" value="Judul SEO (Maks 60 karakter)" />
                <x-text-input id="meta_title" name="meta_title" class="mt-1 w-full" :value="old('meta_title', $settings['meta_title'] ?? '')" maxlength="60" />
                <x-input-error :messages="$errors->get('meta_title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="meta_description" value="Deskripsi SEO (Maks 160 karakter)" />
                <x-text-input id="meta_description" name="meta_description" class="mt-1 w-full" :value="old('meta_description', $settings['meta_description'] ?? '')" maxlength="160" />
                <x-input-error :messages="$errors->get('meta_description')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" class="inline-flex items-center bg-board text-chalk font-semibold px-6 py-2.5 rounded-lg hover:bg-board-deep transition-colors">Simpan Pengaturan</button>
        </div>
    </form>
</x-admin-layout>