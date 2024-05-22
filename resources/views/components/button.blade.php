<!-- resources/views/components/button.blade.php -->
<button {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
</button>