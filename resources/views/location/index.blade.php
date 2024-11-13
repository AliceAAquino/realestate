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
            <div class="card-header">Location List</div>
            <div class="card-body">
                <a href="{{ route('location.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Location</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Location Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($location as $location)
                        <tr>
                            <td>{{ $location->location }}</td>
                            <td>
                                <form action="{{ route('location.destroy', $location->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('location.edit', $location->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this location?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Location Found!</strong>
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
