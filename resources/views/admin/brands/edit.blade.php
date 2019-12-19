@extends('admin.layout.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش برند {{$brand->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/brands/{{$brand->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label for="name">تصویر برند</label>
                                <img src="{{$brand->photo->path}}">
                            </div>

                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="title" class="form-control" value="{{$brand->title}}" placeholder="نام برند را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea type="text" name="description" class="form-control" placeholder="توضیحات برند را وارد کنید...">{{$brand->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="photo">تصویر</label>
                                <input type="hidden" name="photo_id" id="brand-photo" value="{{$brand->photo_id}}">
                                <div id="photo" class="dropzone"></div>
                            </div>

                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
    <script>
      var drop = new Dropzone('#photo', {
        addRemoveLinks: true,
        maxFiles: 1,
        url: "{{ route('photos.upload') }}",
        sending: function(file, xhr, formData){
          formData.append("_token","{{csrf_token()}}")
        },
        success: function(file, response){
          document.getElementById('brand-photo').value = response.photo_id
        }
      });
    </script>
@endsection