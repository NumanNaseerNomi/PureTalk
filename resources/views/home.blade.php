@include('layouts.header')
@include('components.navbar')
<div class="container">
    @include('components.alerts')
    @if(Auth::check())
        @include('components.postCreate')
        <br/>
    @endif
    @foreach ($posts as $post)
        @include('components.post')
        <br/>
    @endforeach
</div>
@include('layouts.footer')
