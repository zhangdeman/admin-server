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
                                <button class="btn btn-success btn-xs"  name="rolePermissionDetail" data-toggle="modal"  href="#rolePermissionDetail">授权</button>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">授权</h4>
            </div>
            <section>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i>角色授权</h4>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    授权
                                </label>
                            </div>
                        </div><!-- /form-panel -->
                    </div><!-- /col-lg-12 -->
                </div><!-- /row -->
            </section><! --/wrapper -->
        </div>
    </div>
</div>
<!-- modal -->

@include('common/footer');