{{--@props(['active' => false])--}}


{{--<a href="/" class="{{ $active ? 'bg-gray-900 text-white':'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium "--}}
{{--aria-current="{{ $active ? "page" : 'false' }}"--}}
{{--    {{$attributes}}--}}
{{--    >{{ $slot }}</a>--}}


@props(['active' => false])

<a href="{{ $attributes->get('href') }}" class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</a>

<!--
<a href="/" class="{{ request()->is('/') ? 'bg-gray-900 text-white':'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium " aria-current="page">Home</a>
<a href="/about" class="{{ request()->is('about') ? 'bg-gray-900 text-white':'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium ">About</a>
<a href="/contact" class="{{ request()->is('contact') ? 'bg-gray-900 text-white':'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium ">Contact</a>
-->
