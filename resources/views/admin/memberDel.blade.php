@extends('admin.master1')

@section('content')
    <div class="pd-20">
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 恢复</a></span></span> <span class="r">共有数据：<strong>{{count($members)}}</strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">ID</th>
                <th width="100">用户名</th>
                <th width="90">手机</th>
                <th width="">地址</th>
                <th width="130">加入时间</th>
                <th width="70">状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @for($i=0;$i<count($members);$i++)
                    <tr class="text-c">
                        <td><input type="checkbox" value="{{$i}}" name=""></td>
                        <td>{{$members[$i]->id}}</td>
                        <td><u style="cursor:pointer" class="text-primary" onclick="member_show('{{$members[$i]->nickname}}','/admin/memberShow/'+'{{$members[$i]->id}}','{{$members[$i]->id}}','360','400')">{{$members[$i]->nickname}}</u></td>
                        <td>{{$members[$i]->phone}}</td>
                        <td class="text-l">{{$members[$i]->address}}</td>
                        <td>{{$members[$i]->created_at}}</td>
                        <td class="td-status"><span class="label label-defaunt radius">已删除</span></td>
                        <td class="td-manage">
                            <a style="text-decoration:none" onClick="member_store(this,'{{$members[$i]->id}}')" href="javascript:;" title="真删除"><i class="Hui-iconfont">&#xe631;</i></a>
                        </td>
                    </tr>
            @endfor
            </tbody>
        </table>
    </div>
    </div>
@endsection


@section('my-js')
    <script>
        function member_store(obj,id){
            layer.confirm('确认要停用吗？',function(index){
                layer.msg('已停用!',{icon: 5,time:1000});
                $.ajax({
                    url:'/service/memberstatus',
                    dataType:'json',
                    cache:false,
                    type:'POST',
                    data:{_token:'{{csrf_token()}}',id:id,status:0},
                    success:function (data) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                        $(obj).remove();
                    }
                });
            });
        }

        function member_show(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
    </script>
@endsection