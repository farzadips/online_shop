@foreach($categories as $sub_category)

    <tr>
        <td >{{$sub_category->id}}</td>
        <td >{{str_repeat('--',$level)}}{{$sub_category->name}}</td>
        <td class="text-center">
            <a class="btn btn-warning"
               href="{{route('categories.edit',$sub_category->id)}}">ویرایش</a>
            <a class="btn btn-danger"
               href="{{route('categories.destroy',$sub_category->id)}}">حذف</a>
        </td>
    </tr>

    @if(count($category->childrenRecursive) > 0)
        @include('admin.partial.category_list',
        ['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
    @endif
@endforeach
