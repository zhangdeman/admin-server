@include('common/header');
@include('common/left');
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i>添加类别</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i>添加类别</h4>
                        <form class="form-horizontal style-form" method="post" action="/article/addArticleKind">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">标题</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">父分类</label>
                                <div class="col-sm-10">
                                    <select name="parent_id" class="form-control col-sm-10">
                                        <option value="{{$article_kind['id']}}">{{$article_kind['title']}}</option>
                                        @foreach($article_kind['module'] as $item)
                                            <option value="{{$item['id']}}">{{$item['title']}}</option>
                                            @foreach($item['type'] as $single)
                                                <option value="{{$single['id']}}">{{$single['title']}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-theme">发布</button>
                        </form>
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->


        </section><! --/wrapper -->
@include('common/footer');