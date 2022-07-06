@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    {{ session('success') }}
                </div>
            @endif

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
                                            <a href="{{ route('products.page.edit', $product->id) }}"
                                                class="btn btn-warning d-inline-block">Edit</a>
                                            <a href="{{ route('products.page.edit-stock', $product->id) }}"
                                                class="btn btn-info d-inline-block">Stock</a>
                                            <form class="d-inline-block" action="{{ route('products.delete') }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-danger"
                                                    id="btn_delete_product">Delete</button>
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

    <script>
        $(document).on("click", "#btn_delete_product", function(e) {
            e.preventDefault();

            if (confirm('Confirm to delete this product?')) {
                $(this).closest('form').submit();
            }
        });
    </script>
@endsection
