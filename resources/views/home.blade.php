@include('layouts.header')
@include('components.navbar')
<div class="container">
    @foreach (range(1, 10) as $number)
        @include('components.post')
        <br/>
    @endforeach
</div>
@include('layouts.footer')
