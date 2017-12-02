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

            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain">
                发布文章
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
    </section>
</section>

@include('common/footer')
<script type="text/javascript" src="/js/admin/add-article.js"></script>

