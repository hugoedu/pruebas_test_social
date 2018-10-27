@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card border-0" >
                <form action="{{ route("statuses.store") }}" method="post">
                    @csrf
                    <div class="card-body">
                    <textarea name="body" cols="30" rows="10" class="form-control border-0" placeholder="¿Que estas pensando?"></textarea>
                    </div>
                    <div class="card-footer">
                    <button id="create-status" class="btn btn-primary">Publicar Estado</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection