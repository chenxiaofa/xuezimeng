
<!-- Header -->
<header id="head">
    <div class="container">


        <div class="fluid_container">
            <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                <div data-thumb="assets/images/slides/thumbs/b1.jpg" data-src="assets/images/slides/b1.jpg">
                </div>
                <div data-thumb="assets/images/slides/thumbs/b2.jpg" data-src="assets/images/slides/b2.jpg">
                </div>
                <div data-thumb="assets/images/slides/thumbs/b3.jpg" data-src="assets/images/slides/b3.jpg">
                </div>
            </div><!-- #camera_wrap_3 -->
        </div><!-- .fluid_container -->
    </div>
</header>
<!-- /Header -->

<section class="news-box top-margin">
    <div class="container">
        <h2><span>课程全面覆盖</span></h2>
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="newsBox">
                    <div class="thumbnail">
                        <figure><img src="assets/images/news2.jpg" alt=""></figure>
                        <div class="caption maxheight2">
                            <div class="box_inner">
                                <div class="box">
                                    <p class="title"><h5>小学</h5></p>
                                    <p>涵盖小学全部阶段,1-3年纪,四年级,五年级,六年级.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="newsBox">
                    <div class="thumbnail">
                        <figure><img src="assets/images/news3.jpg" alt=""></figure>
                        <div class="caption maxheight2">
                            <div class="box_inner">
                                <div class="box">
                                    <p class="title"><h5>初中</h5></p>
                                    <p>初一,初二,初三..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="newsBox">
                    <div class="thumbnail">
                        <figure><img src="assets/images/news4.jpg" alt=""></figure>
                        <div class="caption maxheight2">
                            <div class="box_inner">
                                <div class="box">
                                    <p class="title"><h5>高中</h5></p>
                                    <p>高中.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="assets/js/modernizr-latest.js"></script>

<script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
<script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='assets/js/camera.min.js'></script>

<script src="assets/js/custom.js"></script>
<script>
    jQuery(function(){
        jQuery('#camera_wrap_4').camera({
            transPeriod: 1000,
            time: 3000,
            height: '600',
            loader: 'false',
            pagination: false,
            thumbnails: false,
            hover: false,
            playPause: false,
            navigation: false,
            opacityOnGrid: false,
            imagePath: 'assets/images/'
        });

    });
</script>

