@include('common/header');
@include('common/left');
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>文章类别列表</h3>
    <div class="row">
        <div class="col-md-12 mt">
            <div class="content-panel">
                <table class="table table-hover" id="article-list">
                    <h4><i class="fa fa-angle-right"></i>列表</h4>
                    <hr>
                    <thead>
                    <tr>
                        <th>类别id</th>
                        <th>类别标题</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th>父级类别ID</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($list['article_kind_list'] as $singleKind)
                    <tr>
                        <td>{{$singleKind['id']}}</td>
                        <td>{{$singleKind['title']}}</td>
                        <td>{{$singleKind['status']}}</td>
                        <td>{{$singleKind['create_time']}}</td>
                        <td>{{$singleKind['parent_id']}}</td>
                        <td>
                            <button class="btn btn-success btn-xs" name="kindDetail" data-toggle="modal" href="#kindDetail">详情</button>
                            <button class="btn btn-primary btn-xs" data-toggle="modal" href="#editKind">编辑</button>
                            <button class="btn btn-danger btn-xs"  data-toggle="modal" href="#deleteKind">删除</button>
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
<div aria-hidden="true" aria-labelledby="kindDetailLabel" id="kindDetail" role="dialog" tabindex="-1" id="kindDetail" class="modal fade">

</div>
<!-- modal -->

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="editKindLabel" id="editKind" role="dialog" tabindex="-1" id="editKind" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">编辑详情</h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="deleteKindLabel" id="deleteKind" role="dialog" tabindex="-1" id="deleteKind" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">删除类别</h4>
            </div>
            <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<script type="text/javascript" src="{{URL::asset('js/article/article-kind.js')}}"></script>
@include('common/footer');