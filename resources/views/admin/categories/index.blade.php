@extends('admin.layout.master')

@section('content');
<section class="content">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title pull-right">دسته بندی</h3>

        <div class=" text-left">
            <a class="btn btn-app" href="{{route('categories.create')}}">
                <i class="fa fa-plus"></i> جدید
            </a>
            </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>نام</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
    </div>
    <!-- /.box-footer -->
</div>
</section>
    @endsection
