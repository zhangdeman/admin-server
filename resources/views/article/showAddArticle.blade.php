@include('common/header');
@include('common/left');
<section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> 发布文章</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i>发布文章</h4>
                        <form class="form-horizontal style-form" method="get">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">文章标题</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">文章模块</label>
                                <div class="col-sm-10">
                                    <select class="form-control col-sm-10" id="parent-kind">
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">文章类型</label>
                                <div class="col-sm-10">
                                    <select class="form-control col-sm-10" id="son-kind">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">文章正文</label>
                                <div class="col-sm-10">
                                        <!-- 加载编辑器的容器 -->
                                        <script id="article-content" name="article-content" type="text/plain">

                                        </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-theme">发布</button>
                        </form>
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->



        </section><! --/wrapper -->
@include('common/footer');
<script>
    //custom select box

    $(function(){
        //$('select.styled').customSelect();
    });

</script>

<!-- 配置文件 -->
<script type="text/javascript" src="{{URL::asset('ueditor/ueditor.config.js')}}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{URL::asset('ueditor/ueditor.all.js')}}"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('article-content');
</script>
<script type="text/javascript" src="{{URL::asset('js/article/add-article.js')}}"></script>
