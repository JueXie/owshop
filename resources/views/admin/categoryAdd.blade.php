@extends('admin.master1')

@section('content')
    <div class="pd-20">
        <form action="" method="post" class="form form-horizontal" id="form-user-add">
            <div class="row cl">
                <label class="form-label col-2"><span class="c-red">*</span>分类名称：</label>
                <div class="formControls col-5">
                    <input type="text" class="input-text" value="" placeholder="" id="user-name" name="product-category-name">
                </div>
                <div class="col-5"> </div>
            </div>
            <div class="row cl">
                <label class="form-label col-2">备注：</label>
                <div class="formControls col-5">
                    <textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,100)"></textarea>
                    <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                </div>
                <div class="col-5"> </div>
            </div>
            <div class="row cl">
                <div class="col-9 col-offset-2">
                    <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('my-js')
    <script type="text/javascript" src="/adminasset/lib/icheck/jquery.icheck.min.js"></script>
    <script type="text/javascript" src="/adminasset/lib/Validform/5.3.2/Validform.min.js"></script>
@endsection