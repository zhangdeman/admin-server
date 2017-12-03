@include('common/header')

<section id="main" class="p-relative" role="main">

    @include('common/left')

    <!-- Content -->
    <section id="content" class="container">

        <!-- Breadcrumb -->
        <ol class="breadcrumb hidden-xs">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>

        <h4 class="page-title">管理后台</h4>

        <!-- Text Input -->
        <div class="block-area" id="text-input">
            <h3 class="block-title">发布文章</h3>

            <p>发布文章.</p>

            <div class="block-area hidden" id="show-op-result">
                <h3 class="block-title">操作结果</h3>
            </div>
            <div class="block-area">
                <input class="form-control input-lg m-b-10" type="text" name="article-title" id="article-title" placeholder="文章标题">
                <input class="hidden" type="text" name="_csrf" id="csrf_token" value="{{csrf_token()}}">
            </div>

            <div class="block-area input-lg m-b-10" id="set-parent-kind">
                <select id="parent-kind" name="parent_kind" class="form-control input-lg m-b-10">

                </select>
            </div>

            <div class="block-area input-lg m-b-10" id="set-son-kind">
                <select id="son-kind" name="son_kind" class="form-control input-lg m-b-10">

                </select>
            </div>

        </div>

        <div class="block-area" id="text-input">
        <!-- 加载编辑器的容器 -->
        <script id="container" name="content" type="text/plain">

        </script>

        <!-- 配置文件 -->
        <script type="text/javascript" src="/ueditor/ueditor.config.js"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="/ueditor/ueditor.all.js"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container');
        </script>
        </div>
        <div class="block-area">
            <input class="form-control input-lg m-b-10" type="button" name="add-article" id="add-article" value="添加文章">
        </div>
    </section>
</section>

@include('common/footer')
<script type="text/javascript" src="/js/article/add-article.js"></script>

