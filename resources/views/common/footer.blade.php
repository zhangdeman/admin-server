

<!--main content end-->
<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        2017 - 【张德满】 - 博客 <a href="http://www.deman.club/" target="_blank" title="【张德满】博客">【张德满】博客</a>
        <a href="index.html#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{URL::asset('assets/js/jquery.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{URL::asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.scrollTo.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/jquery.sparkline.js')}}"></script>


<!--common script for all pages-->
<script src="{{URL::asset('assets/js/common-scripts.js')}}"></script>

<script type="text/javascript" src="{{URL::asset('assets/js/gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/gritter-conf.js')}}"></script>

<!--script for this page-->
<script src="{{URL::asset('assets/js/sparkline-chart.js')}}"></script>
<script src="{{URL::asset('assets/js/zabuto_calendar.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: '欢迎登录管理后台!',
            // (string | mandatory) the text inside the notification
            text: '博客不开放注册，有管理员添加。TEL : 177101580607',
            // (string | optional) the image to display on the left
            image: '{{URL::asset('assets/img/ui-sam.jpg')}}',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>

<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event", }
            ]
        });
    });


    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>


</body>
</html>
