
@if($errors->any())
    <ul class="alert alert-danger ps-4 text-start" role="alert">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
