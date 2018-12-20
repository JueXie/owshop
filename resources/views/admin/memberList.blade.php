@extends('admin.master1')

@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="pd-20">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
            -
            <input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','/admin/member-add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>{{count($members)}}</strong> 条</span> </div>
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
                    @if($members[$i]->status == 0)
                        <td class="td-status"><span class="label label-success radius">已启用</span></td>
                    @else
                        <td class="td-status"><span class="label label-defaunt radius">已停用</span></td>
                    @endif
                    <td class="td-manage">
                        @if($members[$i]->status == 0)
                            <a style="text-decoration:none" onClick="member_stop(this,'{{$members[$i]->id}}')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
                        @else
                            <a style="text-decoration:none" onClick="member_start(this,'{{$members[$i]->id}}')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>
                        @endif
                        <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','/admin/changePassword/'+'{{$members[$i]->id}}','{{$members[$i]->id}}','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
                        <a title="删除" href="javascript:;" onclick="member_del(this,'{{$members[$i]->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    </td>
                </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('my-js')
    <script type="text/javascript" src="/adminasset/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript" src="/adminasset/lib/My97DatePicker/WdatePicker.js"></script>
    <script type="text/javascript" src="/adminasset/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script>
        function member_add(title,url,w,h){
            layer_show(title,url,w,h);
        }

        function member_show(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        function member_stop(obj,id){
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
        function member_start(obj,id){
            layer.confirm('确认要启用吗？',function(index){
                layer.msg('已启用!',{icon: 6,time:1000});
                $.ajax({
                    url:'/service/memberstatus',
                    dataType:'json',
                    cache:false,
                    type:'POST',
                    data:{_token:'{{csrf_token()}}',id:id,status:1},
                    success:function (data) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                        $(obj).remove();
                    }
                });
            });
        }

        // function member_edit(title,url,id,w,h){
        //     layer_show(title,url,w,h);
        // }
        function change_password(title,url,id,w,h){
            layer_show(title,url,w,h);
        }
        function member_del(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                $.ajax({
                    url:'/service/memberdel',
                    dataType:'json',
                    cache:false,
                    type:'POST',
                    data:{_token:'{{csrf_token()}}',id:id},
                    success:function (data) {
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }
                });
            });
        }
    </script>
@endsection