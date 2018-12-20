@extends('admin.master1')


@section('content')
    <form class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="" id="member-name" name="nickname" datatype="*2-16" nullmsg="用户名不能为空">
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="" id="member-tel" name="phone"  datatype="m" nullmsg="手机不能为空">
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>密码：</label>
            <div class="formControls col-5">
                <input type="password" class="input-text" value="" placeholder="" id="member-tel" name="password"  datatype="m" nullmsg="密码不能为空">
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <div class="col-9 col-offset-3">
                <input class="btn btn-primary radius" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="onMemberAdd()">
            </div>
        </div>
    </form>
@endsection


@section('my-js')
    <script>
        function onMemberAdd() {
            var nickname = $('input[name=nickname]').val();
            var password = $('input[name=password]').val();
            var phone = $('input[name=phone]').val();

            $.ajax({
                url:'/service/memberadd',
                dataType:'json',
                cache:false,
                type:'POST',
                data:{nickname:nickname,password:password,phone:phone,_token:'{{csrf_token()}}'},
                success:function (data) {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
