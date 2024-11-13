@extends('category.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Property List</div>
            <div class="card-body">
                <a href="{{ route('property.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Property</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Property Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Location</th>
                        <th scope="col">Type</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($property as $property)
                        <tr>
                            <td>{{ $property->property_name }}</td>
                            <td>{{ $property->description }}</td>
                            <td>{{ $property->category }}</td>
                            <td>{{ $property->location }}</td>
                            <td>{{ $property->type }}</td>
                            <td>{{ $property->price }}</td>
                            <td>
                                <form action="{{ route('property.destroy', $property->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('property.edit', $property->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Property?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="7">
                                <span class="text-danger">
                                    <strong>No property Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>


            </div>
        </div>
    </div>    
</div>
    
@endsection
