@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    {{ __('Products') }}
                    <div style="text-align: right;">
                        <form action="{{ route('export') }}" method="post" style="display:inline-block">
                            @csrf
                            <input type="submit" class="btn btn-success" value="Export">
                        </form>

                        <a class="btn btn-primary" href="{{ route('upload') }}">Import</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-{{'alert-type'}}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Type code</td>
                                <td>Quantity</td>
                                <td>Price</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->type_code }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- Pagination --}}
                    <div class="pagination justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
