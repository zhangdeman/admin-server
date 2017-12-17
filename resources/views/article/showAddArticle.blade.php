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
                                    <select class="form-control col-sm-10">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">文章类型</label>
                                <div class="col-sm-10">
                                    <select class="form-control col-sm-10">
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
                                        <script id="container" name="content" type="text/plain">

                                        </script>

                                        <!-- 配置文件 -->
                                        <script type="text/javascript" src="{{URL::asset('ueditor/ueditor.config.js')}}"></script>
                                        <!-- 编辑器源码文件 -->
                                        <script type="text/javascript" src="{{URL::asset('ueditor/ueditor.all.js')}}"></script>
                                        <!-- 实例化编辑器 -->
                                        <script type="text/javascript">
                                            var ue = UE.getEditor('container');
                                        </script>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Input focus</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="focusedInput" type="text" value="This is focused...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Disabled</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Placeholder</label>
                                <div class="col-sm-10">
                                    <input type="text"  class="form-control" placeholder="placeholder">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password"  class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-sm-2 control-label">Static control</label>
                                <div class="col-lg-10">
                                    <p class="form-control-static">email@example.com</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->

            <!-- INLINE FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Inline Form</h4>
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword2">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-theme">Sign in</button>
                        </form>
                    </div><!-- /form-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->

            <!-- INPUT MESSAGES -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Input Messages</h4>
                        <form class="form-horizontal tasi-form" method="get">
                            <div class="form-group has-success">
                                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Input with success</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputSuccess">
                                </div>
                            </div>
                            <div class="form-group has-warning">
                                <label class="col-sm-2 control-label col-lg-2" for="inputWarning">Input with warning</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputWarning">
                                </div>
                            </div>
                            <div class="form-group has-error">
                                <label class="col-sm-2 control-label col-lg-2" for="inputError">Input with error</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputError">
                                </div>
                            </div>
                        </form>
                    </div><!-- /form-panel -->
                </div><!-- /col-lg-12 -->
            </div><!-- /row -->

            <!-- INPUT MESSAGES -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Checkboxes, Radios & Selects</h4>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">
                                Option one is this and that&mdash;be sure to include why it's great
                            </label>
                        </div>

                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                Option one is this and that&mdash;be sure to include why it's great
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>

                        <hr>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
                        </label>

                        <hr>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        <br>
                        <select multiple class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div><!-- /form-panel -->
                </div><!-- /col-lg-12 -->

                <!-- CUSTOM TOGGLES -->
                <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Custom Toggles</h4>
                        <div class="row mt">
                            <div class="col-sm-6 text-center">
                                <input type="checkbox" checked="" data-toggle="switch" />
                            </div>
                            <div class="col-sm-6 text-center">
                                <input type="checkbox" data-toggle="switch" />
                            </div>
                        </div>
                        <div class="row mt">
                            <div class="col-sm-6 text-center">
                                <div class="switch switch-square"
                                     data-on-label="<i class=' fa fa-check'></i>"
                                     data-off-label="<i class='fa fa-times'></i>">
                                    <input type="checkbox" />
                                </div>
                            </div>
                            <div class="col-sm-6 text-center">
                                <div class="switch switch-square"
                                     data-on-label="<i class=' fa fa-check'></i>"
                                     data-off-label="<i class='fa fa-times'></i>">
                                    <input type="checkbox" checked="" />
                                </div>
                            </div>
                        </div>
                        <div class="row mt">
                            <div class="col-sm-6 text-center">
                                <input type="checkbox" disabled data-toggle="switch" />
                            </div>
                            <div class="col-sm-6 text-center">
                                <input type="checkbox" checked disabled data-toggle="switch" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /row -->


        </section><! --/wrapper -->
@include('common/footer');
<script>
    //custom select box

    $(function(){
        //$('select.styled').customSelect();
    });

</script>

<script type="text/javascript" src="{{URL::asset('js/article/add-article.js')}}"></script>
