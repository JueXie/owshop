@extends('admin.master1')


@section('content')
    <form class="form form-horizontal" id="form-change-password">
        <div class="row cl">
            <label class="form-label col-4"><span class="c-red">*</span>账户：</label>
            <div class="formControls col-4"> {{$membername}} </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-4"><span class="c-red">*</span>新密码：</label>
            <div class="formControls col-4">
                <input type="password" class="input-text" autocomplete="off" placeholder="不修改请留空" name="password" id="new-password" datatype="*6-18" ignore="ignore" >
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-4"><span class="c-red">*</span>确认密码：</label>
            <div class="formControls col-4">
                <input type="password" class="input-text" autocomplete="off" placeholder="不修改请留空" name="password_cfm" id="new-password2" recheck="new-password" datatype="*6-18" errormsg="您两次输入的密码不一致！" ignore="ignore" >
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <div class="col-8 col-offset-4">
                <input class="btn btn-primary radius" onclick="onChangePw();" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
            </div>
        </div>
    </form>
@endsection


@section('my-js')
    <script>
        function onChangePw() {
            var password = $('input[name=password]').val();
            var password_cfm = $('input[name=password_cfm]').val();
            if (password != password_cfm){
                layer.msg('两次密码不一致',{icon:2,time:1000});
                return;
            }
            $.ajax({
                url:'/service/changepassword',
                dataType:'json',
                cache:false,
                type:'POST',
                data:{_token:'{{csrf_token()}}',password:password,id:'{{$id}}'},
                success:function (data) {
                    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                    parent.layer.close(index);
                }
            });
        }
    </script>
@endsection
