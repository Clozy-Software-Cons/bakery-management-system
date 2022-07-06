@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h5 class="mb-4">Product List</h5>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Price (RM)</th>
                                    <th>Quantity</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="text-nowrap">
                                        <td>{{ $product->name }}
                                            @if ($product->quantity <= $product->warn_threshold)
                                                <span class="badge badge-danger ml-2 px-2"
                                                    title="Stock is running out!">!</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity . ' ' . $product->measure_unit }}</td>
                                        <td class="text-center" style="width: 200px">
                                            <a href="{{ route('products.page.edit') }}"
                                                class="btn btn-warning d-inline-block">Edit</a>
                                            <form class="d-inline-block" action="{{ route('products.delete') }}"
                                                method="post">
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">No result found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
