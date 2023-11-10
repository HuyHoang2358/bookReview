@extends("layout.adminLayoutPage")
@section('content')
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Danh sách danh mục:</h4>
            <a href="{{route('admin.category.add')}}"><button type="button" class="btn btn-success">Thêm danh mục</button></a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>URL</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $item)
                        <tr>
                            <th scope="row">{{$item->id }}</th>
                            <td>{{$item->category_name}}</td>
                            <td>{{$item->category_slug}}</td>

                            <td>
                                <a href="{{route('admin.category.edit',$item->id )}}">Sửa</a>
                                <a href="{{route('admin.category.destroy',$item->id )}}"
                                   onclick="return confirm('Bạn có muốn xóa không?');">Xóa</a>
                            </td>
                        </tr>
                        @foreach($sub_categories as $sub_category)
                            @if($sub_category->category_parent_id == $item->id)
                                <tr>
                                    <th scope="row">{{$sub_category->id }}</th>
                                    <td>---- {{$sub_category->category_name}}</td>
                                    <td>{{$sub_category->category_slug}}</td>
                                    <td>
                                        <a href="{{route('admin.category.edit',$sub_category->id )}}">Sửa</a>
                                        <a href="{{route('admin.category.destroy',$sub_category->id )}}"
                                           onclick="return confirm('Bạn có muốn xóa không?');"
                                        >Xóa</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
    </div>
@endsection
