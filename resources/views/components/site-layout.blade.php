@props(['pageTitle' => null])

<x-public-layout :pageTitle="$pageTitle">
    {{ $slot }}
</x-public-layout>