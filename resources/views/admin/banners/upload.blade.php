@extends('admin.layout')
@section('content')
    <div class="container my-4">
        <form action="{{ route('add_image', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Ảnh banner</label>
                <input type="file" multiple class="form-control" name="img_banner[]" id="" placeholder="" />
                @error('img_banner')
                    <p class="text-danger font-weight-bold">{{ $message }}</p>
                @enderror
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary " name="submit">Thêm banner</button>
            </div>
        </form>
    </div>
@endsection
