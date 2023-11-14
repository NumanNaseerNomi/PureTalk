@include('layouts.header')
@include('components.navbar')
<div class="container">
    <div class="row">
        @foreach (range(1, 10) as $number)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">==Word==</h5>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')
