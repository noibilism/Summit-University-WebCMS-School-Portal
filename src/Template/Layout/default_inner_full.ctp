<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Summit University, Offa, Kwara State, Nigeria.</title>
    <!-- Styles -->
    <?=$this->Html->meta('icon')?>
    <?=$this->fetch('meta')?>
    <!-- Fonts -->
    <?=$this->Html->css('//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800')?>
    <!-- CSS Libs -->
    <?=$this->Html->css('burbington/font-awesome/css/font-awesome.min')?>
    <?=$this->Html->css('burbington/theme_style')?>
    <?=$this->Html->css('burbington/bootstrap/css/bootstrap.min')?>
    <?=$this->Html->css('burbington/dropdown-menu')?>
    <?=$this->Html->css('burbington/audioplayer')?>
    <?=$this->Html->css('burbington/menu')?>
    <?=$this->Html->css('megamenu')?>
    <?=$this->Html->css('style')?>
    <?=$this->Html->css('ionicons.min')?>
    <?=$this->Html->css('burbington/news')?>
    <?=$this->Html->css('burbington/jquery.fancybox')?>
    <?=$this->fetch('css')?>
</head>

<body role="document">

<!-- device test, don't remove. javascript needed! -->
<span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span
        class="visible-lg"></span>
<!-- device test end -->

<div id="k-head" class="container"><!-- container + head wrapper -->

    <div class="row"><!-- row -->

        <nav class="k-functional-navig"><!-- functional navig -->

            <ul class="list-inline pull-right">
                <li><a href="#">Careers</a></li>
                <li><a href="#">Portal Login</a></li>
                <li><a href="#">Staff Email</a></li>
            </ul>
        </nav>
        <!-- functional navig end -->

        <div class="col-lg-12">

            <div id="k-site-logo" class="pull-left"><!-- site logo -->

                <h1 class="k-logo">
                    <a href="/" title="Home Page">
                        <?= $this->Html->image('burbington/site-logo.png',['class'=>'img-responsive','alt'=>'Summit
                        University'])?>
                    </a>
                </h1>

                <a id="mobile-nav-switch" href="#drop-down-left"><span class="alter-menu-icon"></span></a><!-- alternative menu button -->

            </div>
            <div style="padding-left: 180px;">
                <!-- site logo end -->
                <nav id="k-menu" class="k-main-navig">
                    <?= $this->element('Admin/top_nav')?>
                </nav>
                <!-- main navig end -->

            </div>
        </div>
    </div>
    <!-- row end -->

</div>
<!-- container + head wrapper end -->
<div id="k-body"><!-- content wrapper -->

    <div class="container"><!-- container -->

        <div class="row"><!-- row -->

            <div id="k-top-search" class="col-lg-12 clearfix"><!-- top search -->

                <form action="#" id="top-searchform" method="get" role="search">
                    <div class="input-group">
                        <input type="text" name="s" id="sitesearch" class="form-control" autocomplete="off"
                               placeholder="Type in keyword(s) then hit Enter on keyboard"/>
                    </div>
                </form>

                <div id="bt-toggle-search" class="search-icon text-center"><i class="s-open fa fa-search"></i><i
                        class="s-close fa fa-times"></i></div>
                <!-- toggle search button -->

            </div>
            <!-- top search end -->
        </div>
        <!-- row end -->

        <div class="row no-gutter fullwidth"><!-- row -->
            <div class="row"><!-- row -->
                <?= $this->element('Admin/news_ticker')?>

                <!-- breadcrumbs end -->

            </div><!-- row end -->

            <div class="row"><!-- row -->

            <?=$this->Flash->render()?>
            <?=$this->Flash->render('auth')?>
            <?=$this->fetch('content')?>


            <!-- sidebar wrapper end -->

        </div>
        <!-- row end -->

    </div>
    <!-- container end -->

</div>
<!-- content wrapper end -->
<div id="k-footer"><!-- footer -->

    <div class="container"><!-- container -->

        <div class="row no-gutter"><!-- row -->

            <div class="col-lg-4 col-md-4"><!-- widgets column left -->

                <div class="col-padded col-naked">

                    <ul class="list-unstyled clear-margins"><!-- widgets -->

                        <li class="widget-container widget_nav_menu"><!-- widgets list -->

                            <h1 class="title-widget">Useful links</h1>

                            <ul>
                                <li><a href="#" title="menu item">Admissions</a></li>
                                <li><a href="#" title="menu item">Students Portal</a></li>
                                <li><a href="#" title="menu item">Staff Email</a></li>
                                <li><a href="#" title="menu item">Job Opportunities - Application</a></li>
                                <li><a href="#" title="menu item">Online Payments</a></li>
                            </ul>

                        </li>

                    </ul>

                </div>

            </div>
            <!-- widgets column left end -->

            <div class="col-lg-4 col-md-4"><!-- widgets column center -->

                <div class="col-padded col-naked">

                    <ul class="list-unstyled clear-margins"><!-- widgets -->

                        <li class="widget-container widget_recent_news"><!-- widgets list -->

                            <h1 class="title-widget">School Contact</h1>

                            <div itemscope itemtype="http://data-vocabulary.org/Organization">

                                <h2 class="title-median m-contact-subject" itemprop="name">Summit University</h2>

                                <div class="m-contact-address" itemprop="address" itemscope
                                     itemtype="http://data-vocabulary.org/Address">
                                    <span class="m-contact-street" itemprop="street-address">Irra Road, </span>
                                    <span class="m-contact-city-region"><span class="m-contact-city"
                                                                              itemprop="locality">PMB 4412,</span>,
                                        <span
                                                class="m-contact-region" itemprop="region">Offa,</span></span>
                                    <span class="m-contact-zip-country"><span class="m-contact-zip"
                                                                              itemprop="postal-code">Kwara
                                        State,</span> <span
                                            class="m-contact-country" itemprop="country-name">Nigeria</span></span>
                                </div>

                                <div class="m-contact-tel-fax">
                                    <span class="m-contact-tel">Tel:
                                        <span itemprop="tel">+234 (0) 803 098 19 30</span></span>
                                </div>

                            </div>

                            <div class="social-icons">

                                <ul class="list-unstyled list-inline">

                                    <li><a href="#" title="Contact us"><i class="fa fa-envelope"></i></a></li>
                                    <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>

                                </ul>

                            </div>

                        </li>

                    </ul>

                </div>

            </div>
            <!-- widgets column center end -->

            <div class="col-lg-4 col-md-4"><!-- widgets column right -->

                <div class="col-padded col-naked">

                    <ul class="list-unstyled clear-margins"><!-- widgets -->

                        <li class="widget-container widget_sofa_flickr"><!-- widgets list -->

                            <h1 class="title-widget">find us on the Map</h1>

                            <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31596.187791802044!2d4.695496428257743!3d8.149894954983003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1037c084d765da3f%3A0xb432161be9eedf33!2sOffa%2C+Nigeria!5e0!3m2!1sen!2s!4v1476604718576"
                                    width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

                        </li>

                    </ul>

                </div>

            </div>
            <!-- widgets column right end -->

        </div>
        <!-- row end -->

    </div>
    <!-- container end -->

</div>
<!-- footer end -->

<div id="k-subfooter"><!-- subfooter -->

    <div class="container"><!-- container -->

        <div class="row"><!-- row -->

            <div class="col-lg-12">

                <p class="copy-text text-inverse">
                    &copy; 2016 Summit University, Offa, Kwara State, Nigeria. All rights reserved.
                </p>

            </div>

        </div>
        <!-- row end -->

    </div>
    <!-- container end -->

</div>
<!-- subfooter end -->
<!-- Theme -->
<?=$this->Html->script('jQuery/jquery-2.1.1.min.js')?>
<?=$this->Html->script('jQuery/jquery-migrate-1.2.1.min.js')?>
<?=$this->Html->script('//maps.googleapis.com/maps/api/js?sensor=true')?>
<?=$this->Html->script('burbington/dropdown-menu/dropdown-menu.js')?>
<?=$this->Html->script('burbington/fancybox/jquery.fancybox.pack.js')?>
<?=$this->Html->script('burbington/fancybox/jquery.fancybox-media.js')?>
<?=$this->Html->script('burbington/jquery.fitvids.js')?>
<?=$this->Html->script('burbington/theme.js')?>
<?=$this->Html->script('burbington/audioplayer/audioplayer.min.js')?>
<?=$this->Html->script('burbington/jquery.easy-pie-chart.js')?>
<?=$this->Html->script('burbington/bootstrap.min.js')?>
<?=$this->Html->script('jquery.ticker.js')?>
<?=$this->Html->script('site.js')?>
<?=$this->Html->script('megamenu.js')?>
<?=$this->Html->script('megamenu.min.js')?>
<?=$this->Html->script('megamenu_plugins.js')?>
<script>
    $(document).ready(function ($) {
        $('.megamenu').megaMenuCompleteSet({
            menu_speed_show: 300, // Time (in milliseconds) to show a drop down
            menu_speed_hide: 200, // Time (in milliseconds) to hide a drop down
            menu_speed_delay: 200, // Time (in milliseconds) before showing a drop down
            menu_effect: 'hover_fade', // Drop down effect, choose between 'hover_fade', 'hover_slide', etc.
            menu_click_outside: 1, // Clicks outside the drop down close it (1 = true, 0 = false)
            menu_show_onload: 0, // Drop down to show on page load (type the number of the drop down, 0 for none)
            menu_responsive: 1 // 1 = Responsive, 0 = Not responsive
        });
    });
</script>
<?=$this->fetch('script')?>

</body>
</html>