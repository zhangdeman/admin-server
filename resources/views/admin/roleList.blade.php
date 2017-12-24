@include('common/header');
@include('common/left');
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>管理员角色列表</h3>
    <div class="row">
        <div class="col-md-12 mt">
            <div class="content-panel">
                <table class="table table-hover" id="article-list">
                    <h4><i class="fa fa-angle-right"></i>管理员角色列表</h4>
                    <hr>
                    <thead>
                    <tr>
                        <th>角色id</th>
                        <th>角色描述</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($adminRole as $roleId => $roleTitle)
                        <tr>
                            <td>{{$roleId}}</td>
                            <td>{{$roleTitle}}</td>
                            <td>
                                <button class="btn btn-success btn-xs"  name="rolePermissionDetail" data-toggle="modal"  href="#rolePermissionDetail" onclick="runRolePermission({{$roleId}})">授权</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><! --/content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- row -->
</section><! --/wrapper -->

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="rolePermissionDetail" id="rolePermissionDetail" role="dialog" tabindex="-1" class="modal fade">

</div>
<!-- modal -->

<script type="text/javascript" src="{{URL::asset('js/permission/role-permission.js')}}"></script>
@include('common/footer');