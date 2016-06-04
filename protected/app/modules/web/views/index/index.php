
<?php use app\models\Articles; ?>
<section class="news-box top-margin">
<div class="container">
    <div class="row">
        <div class="col-md-8">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/assets/images/banner_small/banner_small_1.png" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="/assets/images/banner_small/banner_small_2.png" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="/assets/images/banner_small/banner_small_3.png" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
        <div class="col-md-4">
            <div class="title-box clearfix "><h2 class="title-box_primary">学子梦动态</h2></div>
            <div class="list styled custom-list">
                <ul>
                    <?php
                    /** @var Articles $model */
                    foreach(Articles::getNewsTypeArticles() as $model):?>
                        <li>
                            <a href="/articles/<?php echo $model->id;?>.html" > <?php echo $model->title;?> <span><?php echo date('Y-m-d',$model->create_time);?></span></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>



<section class="news-box top-margin">
    <div class="container">
        <h2><span>课程全面覆盖</span></h2>
        <div class="row">
        <?php
        /** @var Articles $model */
        foreach(Articles::getTopicTypeArticles() as $model):?>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <a href="/articles/<?php echo $model->id?>.html" style="text-decoration: none;">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src="<?php echo $model->image_url?>" alt=""></figure>
                            <div class="caption maxheight2">
                                <div class="box_inner">
                                    <div class="box">
                                        <p class="title"><h5><?php echo $model->title?></h5></p>
                                        <p class="title"><?php echo $model->summarization?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach;?>
        </div>
    </div>
</section>

<section class="news-box top-margin">
    <div class="container">
        <div class="row">



        </div>

    </div>
</section>


<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<!--<script src="assets/js/modernizr-latest.js"></script>-->
<!---->
<!--<script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>-->
<!--<script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>-->
<!--<script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script>-->
<!--<script type='text/javascript' src='assets/js/camera.min.js'></script>-->
<!---->
<!--<script src="assets/js/custom.js"></script>-->
<!--<script>-->
<!--    jQuery(function(){-->
<!--        jQuery('#camera_wrap_4').camera({-->
<!--            transPeriod: 1000,-->
<!--            time: 3000,-->
<!--            height: 'auto',-->
<!--            loader: 'false',-->
<!--            pagination: true,-->
<!--            playPause: false,-->
<!--            navigation: false,-->
<!--        });-->
<!---->
<!--    });-->
<!--</script>-->

