@include('common/header');
@include('common/left');
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>权限列表</h3>
    <div class="row">
        <div class="col-md-12 mt">
            <div class="content-panel">
                <table class="table table-hover" id="article-list">
                    <h4><i class="fa fa-angle-right"></i>列表</h4>
                    <hr>
                    <thead>
                    <tr>
                        <th>权限id</th>
                        <th>权限标题</th>
                        <th>权限描述</th>
                        <th>真实控制器</th>
                        <th>真实方法</th>
                        <th>请求uri</th>
                        <th>父级权限ID</th>
                        <th>创建时间</th>
                        <th>更新时间</th>
                        <th>创建的管理员</th>
                        <th>更新的管理员</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($permission['list'] as $singlePermission)
                        <tr>
                            <td>{{$singlePermission['id']}}</td>
                            <td>{{$singlePermission['name']}}</td>
                            <td>{{$singlePermission['desc']}}</td>
                            <td>{{$singlePermission['real_controller']}}</td>
                            <td>{{$singlePermission['real_action']}}</td>
                            <td>{{$singlePermission['request_uri']}}</td>
                            <td>{{$singlePermission['parent_id']}}</td>
                            <td>{{$singlePermission['create_time']}}</td>
                            <td>{{$singlePermission['update_time']}}</td>
                            <td>{{$singlePermission['create_admin_id']}}</td>
                            <td>{{$singlePermission['update_admin_id']}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><! --/content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- row -->
</section><! --/wrapper -->

<script type="text/javascript" src="{{URL::asset('js/article/article-kind.js')}}"></script>
@include('common/footer');