@extends('layouts.app')
@section('title', 'Edit Item Item')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.partial.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit Item Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('item.update', $item->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Name</label>
                                            <input type="text" value="{{ $item->name }}" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Category</label>
                                            <select class="form-control" name="category" id="">
                                                @foreach($categories as $category)
                                                    <option {{ $category->id == $item->category->id ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Item Price</label>
                                            <input type="text" value="{{ $item->price }}" class="form-control" name="price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="" class="bmd-label-floating">Item Description</label>
                                            <textarea class=" form-control" rows="5"  name="description" >{{ $item->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label  class="control-label" >Image</label><br>
                                        <input  type="file" name="image">
                                    </div>
                                </div>

                                <a href="{{ route('item.index') }}" class=" btn btn-danger"> Back</a>
                                <button type="submit" class=" mt-2 btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@endpush
