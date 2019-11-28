    @foreach($categories as $sub_category)
        <option value="{{$sub_category->id}}">{{str_repeat('----',$level)}}{{$sub_category->name}} </option>
        @if(count($category->childrenRecursive) > 0)
            @include('admin.partial.category',
            ['categories'=>$sub_category->childrenRecursive,'level'=>$level+1])
        @endif
    @endforeach
