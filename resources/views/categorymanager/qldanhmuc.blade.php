@extends('layout.layout')
@section('namebuttonadd')
<form action="{{route('qldanhmuc.find')}}" method="GET">
    @csrf
    <input type="text" name="name" placeholder="Nhập tên danh mục" required>
    <button class="btn-search">Tìm kiếm</button>
</form>
<form action="{{route('category.create')}}" method="GET">
    <button class="btn-green">+ Thêm danh mục mới</button>
</form>
@endsection
@section('content')
    <thead>
                <tr>
                    <th>Name</th>
                    <th>Desciption</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->describe}}</td>
                    <td><img style="max-width: 150px;height: auto;display: block;margin: auto;"src="{{asset('storage/imgcategories/'.$value->img)}}" alt=""></td>
                    <td>{{$value->status}}</td>
                    <td>
                        <form action="{{route('category.edit',$value)}}" method="GET">
                            @csrf
                            <button class="btn-blue">Edit</button> 
                        </form>
                        <form action="{{route('category.destroy', $value)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="margin-top: 5px" class="btn-red">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
@endsection