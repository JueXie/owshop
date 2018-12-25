@extends('admin.master1')

@section('my-css')

@endsection


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
                        @if($categorys[$i]->status == 0)
                            <td class="td-status"><span class="label label-success radius">已启用</span></td>
                        @else
                            <td class="td-status"><span class="label label-defaunt radius">已停用</span></td>
                        @endif
                        <td class="td-manage">
                            @if($categorys[$i]->status == 0)
                                <a style="text-decoration:none" onClick="category_stop(this,'{{$categorys[$i]->id}}')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
                            @else
                                <a style="text-decoration:none" onClick="category_start(this,'{{$categorys[$i]->id}}')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>
                            @endif
                            <a title="编辑" href="javascript:;" onclick="category_edit('编辑','/admin/categoryedit/'+'{{$categorys[$i]->id}}','400','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                            <a title="删除" href="javascript:;" onclick="category_del(this,'{{$categorys[$i]->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('my-js')

    <script type="text/javascript">
        function category_add(title,url,w,h){
            layer_show(title,url,w,h);
        }
        function category_edit(title,url,w,h) {
            layer_show(title,url,w,h);
        }
        function category_stop(obj,id){
            layer.confirm('确认要停用吗？',function(index){
                $.ajax({
                    url:'/service/categorystatus',
                    dataType:'json',
                    cache:false,
                    type:'POST',
                    data:{_token:'{{csrf_token()}}',id:id,status:0},
                    success:function (data) {
                        layer.msg('已停用!',{icon: 5,time:1000});
                        window.location.reload();
                    },
                    error:function (xhr,error,status) {
                        console.log(xhr);
                        console.log(error);
                        console.log(status);
                    }
                });
            });
        }
        function category_start(obj,id){
            layer.confirm('确认要启用吗？',function(index){
                $.ajax({
                    url:'/service/categorystatus',
                    dataType:'json',
                    cache:false,
                    type:'POST',
                    data:{_token:'{{csrf_token()}}',id:id,status:1},
                    success:function (data) {
                        layer.msg('已启用!',{icon: 6,time:1000});
                        window.location.reload();
                    },
                    error:function (xhr,error,status) {
                        console.log(xhr);
                        console.log(error);
                        console.log(status);
                    }
                });
            });
        }
        function category_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    url:'/service/categorystatus',
                    dataType:'json',
                    cache:false,
                    type:'POST',
                    data:{_token:'{{csrf_token()}}',id:id,status:2},
                    success:function (data) {
                        layer.msg('删除成功',{icon:1,time:2000});
                        window.location.reload()
                    },
                    error:function (xhr,error,status) {
                        console.log(xhr);
                        console.log(error);
                        console.log(status);
                    }
                });
            });
        }
    </script>
@endsection