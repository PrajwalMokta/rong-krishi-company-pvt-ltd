@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add New Blog Category</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card card-primary">
            <form action="" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('name')}}" name="name" required
                            placeholder="Enter category name">
                    </div>

                    <div class="form-group">
                        <label>Slug <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('slug')}}" name="slug" required
                            placeholder="Enter slug Ex. URL">
                    </div>
                    <div style="color: red;">{{$errors->first('slug')}}</div>

                    <div class="form-group">
                        <label>Status <span style="color: red;">*</span></label>
                        <select class="form-control" name="status">
                            <option {{(old('status') == 0) ? 'selected' : ''}} value="0">Active</option>
                            <option {{(old('status') == 1) ? 'selected' : ''}} value="1">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Meta Title <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{old('meta_title')}}" name="meta_title" required
                            placeholder="Meta title">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea class="form-control" name="meta_description"
                            placeholder="Meta description">{{old('meta_description')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" class="form-control" value="{{old('meta_keywords')}}" name="meta_keywords"
                            placeholder="Meta keywords">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
    var shownPopup = false;
    $("form").submit(function (event) {
        if (shownPopup === false) {
            event.preventDefault();
            shownPopup = true;
            var form = $(this);
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Blog category created.'
            }).then(function() {
                form.trigger('submit');
            });
        }
    });
});
</script>
@endsection