@extends('front/master')

@section('content')
    <form action="" method="post" class="form form-horizontal" id="form-category-add">
        {{csrf_field()}}
    <div class="row cl">
        <label class="form-label col-3">预览图：</label>
        <div class="formControls col-5">
            <img id="preview_id" src="/commo/img/icon-add.png" style="border: 1px solid #B8B9B9; width: 100px; height: 100px;" onclick="$('#input_id').click()" />
            <input type="file" name="file" id="input_id" style="display: none;" onchange="return uploadImageToServer('input_id','images', 'preview_id');" />
        </div>
        {{--<input type="file" name="file" id="demo" onchange="return uploadfiletest();">--}}
    </div>
    </form>
@endsection

@section('my-js')
    <script src="/commo/js/jquery.form.js"></script>
    <script src="/commo/js/uploadFile.js"></script>
    <script type="text/javascript" src="/adminasset/lib/layer/2.1/layer.js"></script>
    <script type="text/javascript" src="/adminasset/lib/Validform/5.3.2/Validform.min.js"></script>
    <script type="text/javascript">

    </script>

@endsection