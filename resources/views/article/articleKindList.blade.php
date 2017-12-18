@include('common/header');
@include('common/left');
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>文章类别列表</h3>
    <div class="row">
        <div class="col-md-12 mt">
            <div class="content-panel">
                <table class="table table-hover">
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
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Simon</td>
                        <td>Mosa</td>
                        <td>@twitter</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    </tbody>
                </table>
            </div><! --/content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- row -->
</section><! --/wrapper -->
@include('common/footer');