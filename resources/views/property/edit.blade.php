@extends('category.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Category
                </div>
                <div class="float-end">
                    <a href="{{ route('property.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('property.update', $property->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="property_name" class="col-md-4 col-form-label text-md-end text-start">Property Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('property_name') is-invalid @enderror" id="property_name" name="property_name" value="{{ $property->property_name }}">
                           
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ $property->description }}">
                           
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-md-4 col-form-label text-md-end text-start">Image:</label>
                        <div class="col-md-4">
                          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ $property->description }}">
                        </div>
                        <div class="col-md-4">
                            <img src="/{{ $property->image }}" class="img-fluid img-thumbnail" width="150">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="cat_id" class="col-md-4 col-form-label text-md-end text-start">Category</label>
                        <div class="col-md-6">
                            <select name="cat_id" class="form-control dropdown select2" style="width: 100%;">
                                <option value="">-- Select Category --</option>
                                @foreach ($category as $data)
                                    <option value="{{$data->id}}" @if($data->id == $cat_id) selected @endif>
                                        {{$data->category}}
                                    </option>
                                @endforeach
                                </select>
                                @if ($errors->has('cat_id'))
                                    <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                                @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="loc_id" class="col-md-4 col-form-label text-md-end text-start">Location</label>
                        <div class="col-md-6">
                            <select name="loc_id" class="form-control dropdown select2" style="width: 100%;">
                                <option value="">-- Select Location --</option>
                                @foreach ($location as $data1)
                                    <option value="{{$data1->id}}" @if($data1->id == $loc_id) selected @endif>
                                        {{$data1->location}}
                                    </option>
                                @endforeach
                                </select>
                                @if ($errors->has('loc_id'))
                                    <span class="text-danger">{{ $errors->first('loc_id') }}</span>
                                @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="type_id" class="col-md-4 col-form-label text-md-end text-start">Property Type</label>
                        <div class="col-md-6">
                            <select name="type_id" class="form-control dropdown select2" style="width: 100%;">
                                <option value="">-- Select Type --</option>
                                @foreach ($type as $data2)
                                    <option value="{{$data2->id}}" @if($data2->id == $type_id) selected @endif>
                                        {{$data2->type}}
                                    </option>
                                @endforeach
                                </select>
                                @if ($errors->has('type_id'))
                                    <span class="text-danger">{{ $errors->first('type_id') }}</span>
                                @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Price</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $property->price }}">
                           
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection