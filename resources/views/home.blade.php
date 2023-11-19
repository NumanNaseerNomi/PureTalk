@include('layouts.header')
@include('components.navbar')
<div class="container">
    @include('components.postCreate')
    <br/>
    @foreach (range(1, 10) as $number)
        @include('components.post')
        <br/>
    @endforeach
    <div class="d-grid gap-2 col-1 mx-auto">
        <button class="btn btn-outline-primary" type="button">Load More</button>
    </div>
    <br/>
</div>
@include('layouts.footer')
