@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    {{ __('Products') }}
                    <div style="text-align: right;">
                        <a class="btn btn-primary" href="{{ route('products.index') }}">Products</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-{{ session('alert-type') }}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('import') }}" method="post" enctype="multipart/form-data" style="display:inline-block">
                        @csrf
                        <div class="custom-file">
                            <input type="file" name="attatchement" class="custom-file-input" id="validateCustomFile" />
                            <label class="custom-file-label" id="validateCustomFile">Choose Excel File ...</label>
                            @error('attatchement') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="pt-4">
                            <input type="submit" class="btn btn-primary" value="Import" >
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
