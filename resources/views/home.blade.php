@include('layouts.header')
@include('components.navbar')
<div class="container">
    @include('components.postCreate')
    <br/>
    @foreach ($posts as $post)
        @include('components.post')
        <br/>
    @endforeach
</div>
@include('layouts.footer')
