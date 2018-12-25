@extends('admin.master1')

@section('content')
    <form class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>分类名字</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="" id="name" name="categoryname" datatype="*" nullmsg=分类名不能为空">
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>分类排序</label>
            <div class="formControls col-5">
                <input type="text" class="input-text" value="" placeholder="" id="no" name="categoryno" datatype="*" nullmsg="分类排序不能为空">
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>分类描述</label>
            <div class="formControls col-5">
                <input type="textarea" class="input-text" value="" placeholder="" id="description" name="description" datatype="*" nullmsg="分类描述不能为空">
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-3"><span class="c-red">*</span>父类名字</label>
            <div class="formControls col-5">
                <select class="select" id="parent_id" name="parent_id">
                    <option value="">无</option>
                    @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4"> </div>
        </div>
        <div class="row cl">
            <div class="col-9 col-offset-3">
                <input class="btn btn-primary radius" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="onCategoryAdd()">
            </div>
        </div>
    </form>
@endsection

@section('my-js')
    <script type="text/javascript">
        function onCategoryAdd() {
            var categoryname = $('input[name=categoryname]').val();
            var categoryno = $('input[name=categorynno]').val();
            var description = $('input[name=description]').val();
            var parent_id = $('select[name=parent_id] option:selected').val();
            if(categoryname =='' ||categoryno ==''){
                layer.msg("其中一项为空",{icon:2,time:2000})
                setTimeout(retrun,2000);
            }
            $.ajax({
                url:'/service/categoryadd',
                dataType:'json',
                cache:false,
                type:'POST',
                data:{_token:'{{csrf_token()}}',name:categoryname,parent_id:parent_id,categoryno:categoryno,description:description},
                success:function (data) {
                    alert(data.status+data.message);
                }
            });
        }
    </script>
@endsection