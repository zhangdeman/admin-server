@include('common/header');
@include('common/left');
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>添加权限</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i>添加权限</h4>
                <form class="form-horizontal style-form" method="post" action="/permission/add">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">是否侧边栏展示</label>
                        <div class="col-sm-10">
                            <select name="is_show_left" class="form-control col-sm-10">
                                <option value="0">是</option>
                                <option value="1">否</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">父级ID</label>
                        <div class="col-sm-10">
                            <select name="parent_id" class="form-control col-sm-10">
                                @foreach($parent_permission as $item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">真实控制器</label>
                        <div class="col-sm-10">
                            <input type="text" name="real_controller" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">真实方法</label>
                        <div class="col-sm-10">
                            <input type="text" name="real_action" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">访问的uri</label>
                        <div class="col-sm-10">
                            <input type="text" name="request_uri" class="form-control">
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-theme">添加</button>
                </form>
            </div>
        </div><!-- col-lg-12-->
    </div><!-- /row -->


</section><! --/wrapper -->

@include('common/footer');
