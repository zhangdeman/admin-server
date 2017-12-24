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
                            <input type="text" name="name" class="form-control" value="{{$request_param['name']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">描述</label>
                        <div class="col-sm-10">
                            <input type="text" name="desc" class="form-control" value="{{$request_param['desc']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">是否侧边栏展示</label>
                        <div class="col-sm-10">
                            <select name="is_show_left" class="form-control col-sm-10">
                                @if($request_param['is_show_left'] == 1)
                                    <option value="1" selected>是</option>
                                    <option value="0">否</option>
                                @else
                                    <option value="1">是</option>
                                    <option value="0" selected>否</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">父级ID</label>
                        <div class="col-sm-10">
                            <select name="parent_id" class="form-control col-sm-10">
                                @foreach($parent_permission as $item)
                                    @if($item['id'] == $request_param['parent_id'])
                                        <option value="{{$item['id']}}" selected>{{$item['name']}}</option>
                                    @else
                                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">真实控制器</label>
                        <div class="col-sm-10">
                            <input type="text" name="real_controller" class="form-control" value="{{$request_param['real_controller']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">真实方法</label>
                        <div class="col-sm-10">
                            <input type="text" name="real_action" class="form-control" value="{{$request_param['real_action']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">访问的uri</label>
                        <div class="col-sm-10">
                            <input type="text" name="request_uri" class="form-control" value="{{$request_param['request_uri']}}">
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-theme">添加</button>

                    <p style="color: red">{{$request_param['error_msg']}}</p>

                </form>
            </div>
        </div><!-- col-lg-12-->
    </div><!-- /row -->


</section><! --/wrapper -->

@include('common/footer');
