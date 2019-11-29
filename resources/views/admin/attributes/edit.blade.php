@extends('admin.layout.master')

@section('content');
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title pull-right">ویرایش ویژگی{{$attributesGroup->title}}</h3>

            {{--            <div class=" text-left">--}}
            {{--                <a class="btn btn-app" href="{{route('categories.create')}}">--}}
            {{--                    <i class="fa fa-plus"></i> جدید--}}
            {{--                </a>--}}
            {{--            </div>--}}
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-8 col-md-offset-3">
                <form method="post" action="/administrator/attributes-group/{{$attributesGroup->id}}">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="name">عنوان</label>
                        <input type="text" name="title" class="form-control"
                               value="{{$attributesGroup->title}}"
                               placeholder="عنوان ویژگی را وارد کنید">
                    </div>

                    <div class="form-group">
                        <label for="category_parent">دسته والد</label>
                        <select name="type" id="" class="form-control">
                            @if( $attributesGroup->type == "select")
                            <option value="select" selected="selected" >لیست تکی</option>
                            @else
                            <option value="multiple" selected="selected">لیست چند تایی</option>
                                @endif

                        </select>
                    </div>


                    <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
