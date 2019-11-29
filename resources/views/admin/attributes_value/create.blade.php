@extends('admin.layout.master')

@section('content');
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title pull-right">ایجاد مقدار ویژگی جدید</h3>

            {{--            <div class=" text-left">--}}
            {{--                <a class="btn btn-app" href="{{route('categories.create')}}">--}}
            {{--                    <i class="fa fa-plus"></i> جدید--}}
            {{--                </a>--}}
            {{--            </div>--}}
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-8 col-md-offset-3">
                <form method="post" action="/administrator/attributes-value">
                    @csrf

                    <div class="form-group">
                        <label for="attribute_group">انتخاب ویژگی</label>
                        <select name="group"
                                class="form-control" id="">
                            @foreach($attributes_group as $attribute )
                                <option value="{{$attribute->id}}">{{$attribute->title}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="name">عنوان</label>
                        <input type="text" name="title" class="form-control"
                               placeholder=" مقدار ویژگی را وارد کنید">
                    </div>





                    <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
