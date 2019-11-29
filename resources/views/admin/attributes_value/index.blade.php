@extends('admin.layout.master')

@section('content');

<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title pull-right">مقادیر ویژگی</h3>

            <div class=" text-left">
                <a class="btn btn-app" href="{{route('attributes-value.create')}}">
                    <i class="fa fa-plus"></i> جدید
                </a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(Session::has('value'))
                <div class="alert alert-success">
                    <div>{{session('value')}}</div>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                    <tr>
                        <th class="text-center">شناسه</th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">ویژگی</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attribute_value as $attribute)
                        <tr>
                            <td class="text-center">{{$attribute->id}}</td>
                            <td class="text-center">{{$attribute->title}}
                            <td class="text-center">{{$attribute->attributeGroup->title}}</td>
                            <td class="text-center">
                                <a class="btn btn-warning"
                                   href="{{route('attributes-value.edit',$attribute->id)}}">ویرایش</a>
                                <div class="display-inline-block">
                                    <form method="post" action="/administrator/attributes-value/{{$attribute->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>

    </div>
</section>
@endsection
