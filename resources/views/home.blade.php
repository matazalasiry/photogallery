@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload image') }}</div>

                <div class="card-body">
                    <form action="/image" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="image[]" class="form-control-image" multiple>
                        </div>
                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
