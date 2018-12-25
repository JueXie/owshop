@extends('admin.master1')

@section('content')
    <div class="pd-20">
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
                <a href="javascript:;" onclick="category_add('添加分类','/admin/categoryadd','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加分类</a></span>
            <span class="r">共有数据：<strong>{{count($categorys)}}</strong> 条</span>
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-hover table-bg table-sort">
                <thead>
                <tr class="text-c">
                    <th width="25"><input type="checkbox" name="" value=""></th>
                    <th width="80">ID</th>
                    <th width="100">分类名</th>
                    <th width="90">父类名</th>
                    <th width="">分类描述</th>
                    <th width="130">状态</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @for($i=0;$i<count($categorys);$i++)
                    <tr class="text-c">
                        <td><input type="checkbox" value="{{$i}}" name=""></td>
                        <td>{{$categorys[$i]->id}}</td>
                        <td>{{$categorys[$i]->name}}</td>
                        <td>@if($categorys[$i]->parent != null){{$categorys[$i]->parent->name}}@endif</td>
                        <td>{{$categorys[$i]->description}}</td>
                        <td class="td-status"><span class="label label-defaunt radius">已删除</span></td>
                        <td class="td-manage">
                            <a style="text-decoration:none" onClick="member_start(this,'{{$categorys[$i]->id}}')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>
                            <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','/admin/changePassword/'+'{{$categorys[$i]->id}}','{{$categorys[$i]->id}}','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
                            <a title="删除" href="javascript:;" onclick="member_del(this,'{{$categorys[$i]->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection



@section('my-js')

@endsection