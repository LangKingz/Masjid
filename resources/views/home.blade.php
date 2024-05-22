<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Masjid</title>
    @livewireStyles
</head>
<body>
    @if (Route::has('login'))
        <livewire:welcome.navigation/>     
    @endif
    @livewireScripts
    @livewire('countdown')
    @livewire('jadwal')
    @livewire('runtext')
    @livewire('keuangan')
    @livewire('homelive')
</body>
</html>