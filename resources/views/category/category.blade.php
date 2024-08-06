@extends('layouts.app')
@section('title', ' ادارة الاقسام')
@section('style')
    <style>
        table {
            width: 100%;
            display: block;
        }
        table tr{
            width: 100%!important;
        }
        table tr td,th{
            display: inline-block;
            width: 20%;
            padding: 10px 85px;
        }
    </style>
@endsection
@section('content')
<div class="center-text">
    <a href="{{ route('cat.create') }}" class="normal"> اضافة قسم</a>
</div>
    <table>
            <tr>
                <th>
                    #
                </th>
                <th>name</th>
                <th>image</th>
                <th>تحديث</th>
                <th>حذف</th>
            </tr>
            @foreach($category as $key)
                <tr>
                    <td>{{$key->cat_id}}</td>
                    <td>{{$key->cat_name}}</td>
                    <td><img style="width: 60px" src="{{asset('storage/'.$key->cat_image)}}" alt=""></td>
                    <td>
                        <a href="{{route('cat.edit',$key)}}" style="color: blue; text-decoration: underline">تعديل</a>
                    </td>
                    <td>
                        <form action="{{route('cat.delete',['id'=>$key->cat_id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
    </table>
@endsection
