@extends("layout.adminLayoutPage")
@section('content')
    <div class="tables">
        <div class="table-responsive bs-example widget-shadow">
            <h4>Danh sách danh mục:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên danh mục</th>
                        <th>Slug</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $item)
                        <tr>
                            <th scope="row">{{$item["id"]}}</th>
                            <td>{{$item["name"]}}</td>
                            <td>{{$item["slug"]}}</td>
                            <td>
                                <a href="#">Sửa</a>
                                <a href="#">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
