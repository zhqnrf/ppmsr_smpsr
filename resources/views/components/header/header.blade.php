@if (Request::is('admin/*'))
    @include('components.header.admin')
@elseif (Request::is('daftar/*'))
    @include('components.header.landing')
@endif
