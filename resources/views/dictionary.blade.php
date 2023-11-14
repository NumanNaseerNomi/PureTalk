@include('layouts.header')
@include('components.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-center">
                <div class="card-header">Add Word</div>
                <div class="card-body">
                    <form class="input-group input-group-sm" method="POST" action="/">
                        <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon1">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Save</button>
                    </form>
                </div>
            </div>
        </div>
        @foreach (range(1, 10) as $number)
            <div class="col-md-3 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">==Word==</h5>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                            <button type="button" class="btn btn-outline-primary">Block</button>
                            <button type="button" class="btn btn-outline-primary">Unblock</button>
                            <button type="button" class="btn btn-outline-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@include('layouts.footer')
