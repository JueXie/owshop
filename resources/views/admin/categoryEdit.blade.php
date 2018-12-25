@extends('admin.master1')


@section('content')
    <form style="margin: 15px">
        <div class="row cl" style="margin-top: 16px">
            <label class="form-label col-3"><span class="c-red">*</span>分类id</label>
            <div class="formControls col-8">
                <input type="text" disabled class="input-text" value="{{$cate->id}}" placeholder="" id="no" name="id">
            </div>
        </div>
    <div class="row cl" style="margin-top: 16px">
        <label class="form-label col-3"><span class="c-red">*</span>分类名字</label>
        <div class="formControls col-8">
            <input type="text" class="input-text" id="name" name="categoryname" value="{{$cate->name}}">
        </div>
    </div>
    <div class="row cl" style="margin-top: 16px">
        <label class="form-label col-3"><span class="c-red">*</span>分类描述</label>
        <div class="formControls col-8">
            <input type="textarea" class="input-text" value="{{$cate->description}}" placeholder="" id="description" name="description">
        </div>
    </div>
    <div class="row cl" style="margin-top: 16px">
        <label class="form-label col-3"><span class="c-red">*</span>父类名字</label>
        <div class="formControls col-8">
            <select class="select" id="parent_id" name="parent_id">
                <option value="">无</option>
                @foreach($categorys as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="row cl" style="margin-top: 16px">
        <div class="col-9 col-offset-3">
            <input class="btn btn-primary radius" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="onCategoryEdit()">
        </div>
    </div>
    </form>
@endsection



@section('my-js')
    <script>
        function onCategoryEdit() {
            var id = $('input[name=id]').val();
            var categoryname = $('input[name=categoryname]').val();
            var description = $('input[name=description]').val();
            var parent_id = $('select[name=parent_id] option:selected').val();
            $.ajax({
                url:'/service/categoryedit',
                dataType:'json',
                cache:false,
                type:'POST',
                data:{_token:'{{csrf_token()}}',categoryname:categoryname,parent_id:parent_id,id:id,description:description},
                success:function (data) {
                    alert(data.status+data.message);
                }
            });
        }
    </script>
@endsection