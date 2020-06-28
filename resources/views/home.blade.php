<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Page title -->
    <title>OptimasyonX</title>

    <!-- HTML5 Shim and Respond.js I    E8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.js"></script>
    <![endif]-->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Icon fonts -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="fonts/flaticons/flaticon.css" rel="stylesheet" type="text/css">

    <!-- Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Nunito:300,400,700%7CBree+Serif&display=swap' rel='stylesheet' type='text/css'>


    <!-- Css Animations -->
    <link href="css/animate.css" rel="stylesheet" />

    <!-- Theme CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Color Style CSS -->
    <link href="styles/yellowpaws.css" rel="stylesheet">

    <!-- Prefix free CSS -->
    <script src="js/prefixfree.js"></script>

    <!-- Owl Slider & Prettyphoto -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/prettyPhoto.css">

    <!-- Switcher Only -->
    <link rel="stylesheet" id="switcher-css" type="text/css" href="css/switcher.css" media="all" />

    <!--Alternate CSS -->

    <link rel="alternate stylesheet" type="text/css" href="styles/bluesky.css" title="bluesky" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="styles/redpet.css" title="redpet" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="styles/greenfun.css" title="greenfun" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="styles/cleanbrown.css" title="cleanbrown" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="styles/yellowpaws.css" title="yellowpaws" media="all" />

    <!-- Favicons-->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
@include('sweetalert::alert')



<div class="demo_changer">
    <div class="demo-icon">
        <i class="fa fa-cog fa-spin fa-2x"></i>
    </div><!-- end opener icon -->
    <div class="form_holder">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="predefined_styles">
                    <h4>@lang("Choose a Color Skin")</h4>
                    <!-- MODULE #3 -->
                    <a href="bluesky" class="styleswitch"><img src="images/icons/blue.png" alt=""></a>
                    <a href="redpet" class="styleswitch"><img src="images/icons/red.png" alt=""></a>
                    <a href="greenfun" class="styleswitch"><img src="images/icons/green.png" alt=""></a>
                    <a href="cleanbrown"  class="styleswitch"><img src="images/icons/brown.png" alt=""></a>
                    <a href="yellowpaws"  class="styleswitch"><img src="images/icons/yellow.png" alt=""></a>
                    <!-- END MODULE #3 -->
                </div><!-- end predefined_styles -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end form_holder -->
</div><!-- end demo_changer -->
<!-- End Switcher -->


<!-- Preloader -->
<div id="preloader">
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>
<!-- Navbar -->
<nav class="navbar navbar-custom navbar-fixed-top">
    <!-- Start Top Bar -->
    <div class="top-bar hidden-xs hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Start Contact Info -->
                    <ul class="contact-details">
                        <li><i class="fa fa-map-marker"></i>@lang("100.yill St. - Ankara,Turkey")</li>
                        <li><i class="fa fa-envelope"></i>info@OptimasyonX.com</li>
                        <li><i class="fa fa-phone"></i>+90 (535) 88 40 111</li>
                    </ul><!-- End Contact Info -->
                </div>
                <div class="col-md-4">
                    <!-- Start Social Links -->
                    <ul class="social-list">
                        <li><a title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a  title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a  title="Flickr" href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a  title="Tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a  title="Instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <!-- End Social Links -->
                </div>
            </div>
        </div>
    </div><!-- End Top bar -->
    <div class="container-fluid">
        <!-- navbar -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Logo -->
            <div class="page-scroll">
                <a class="navbar-brand" href="#page-top">
                    <!--Font Icon logo and text -->
                    <span class="flaticon-animals-allowed"></span>OptimasyonX
                </a>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav page-scroll">
                <li class="active"><a href="#page-top">@lang("Home")</a></li>
                <li><a href="#services">@lang("Services")</a></li>
                <li><a href="#about">@lang("About")</a></li>
                <li><a href="#prices">@lang("Prices")</a></li>
                <li><a href="#gallery">@lang("Gallery")</a></li>

                @if(!(Auth::guard('web')->check() ))
                    <li><a href="#register">@lang("Register")</a></li>
                    <li><a data-toggle="modal" href="#login">@lang("Login")</a></li>
                @else
                <li>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        @lang("Dashbored")
                                    </a>
                                </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                                @lang("logout")
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endif
                <li><a href="#contact">@lang("Contact")</a></li>

                <li>
                    <a id="navbarDropdown" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"  aria-expanded="false" role="button" aria-haspopup="true" v-pre>
                        <i class="fa fa-globe"></i> {{ Config::get('languages')[App::getLocale()] }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <li>
                                    <a  class="dropdown-item" href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav><!-- Navbar ends -->
<!-- Full Page Image Background Slider -->
<div class="slider-container">
    <!-- Controls -->
    <div class="slider-control left inactive"></div>
    <div class="slider-control right"></div>
    <ul class="slider-pagi"></ul>
    <!--Slider -->
    <div class="slider">
        <!-- Slide 1 -->
        <div class="slide slide-0 active">
            <div class="slide__bg"></div>
            <div class="slide__content">
                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                </svg>
                <div class="slide__text">
                    <h1 class="slide__text-heading">@lang("Welcome OptimasyonX")</h1>
                    <div class="hidden-sm hidden-xs">
                        <p class="lead">@lang("With OptimizationX, you will get maximum profit with minimum cost.")</p>
                        <div class="page-scroll">
                            <a href="#services" class="btn btn-default">@lang("our services")</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="slide slide-1">
            <div class="slide__bg"></div>
            <div class="slide__content">
                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                </svg>
                <div class="slide__text">
                    <h1 class="slide__text-heading">@lang("With Us ...")</h1>
                    <div class="hidden-sm hidden-xs">
                        <p class="lead">@lang("Feed mix ration program powered by Artificial Intelligence.")</p>
                        <div class="page-scroll">
                            <a href="#register" class="btn btn-default">@lang("Register")</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 3-->
        <div class="slide slide-2">
            <div class="slide__bg"></div>
            <div class="slide__content">
                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                </svg>
                <div class="slide__text">
                    <h1 class="slide__text-heading">@lang("Why OptimizasyonX !!")</h1>
                    <div class="hidden-sm hidden-xs">
                        <p class="lead">@lang("OptimizasyonX Mixed Ration Feed Program is the most affordable and flexible formulation software market in Turkey")</p>
                        <div class="page-scroll">
                            <a href="#about" class="btn btn-default">@lang("More about us")</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
        $i =3;
        @endphp
        @foreach($part1 as $crud)
            @php
                $i = $i+1;
            @endphp
        <div class="slide slide-{{$i}}">
            <div class="slide__bg"></div>
            <img src="{{ URL::to('/') }}/images/{{ $crud->image }}" class="img-thumbnail" />
            <div class="slide__content">
                <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
                    <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
                </svg>
                <div class="slide__text">
                    <h1 class="slide__text-heading">{{ $crud->title }}</h1>
                    <div class="hidden-sm hidden-xs">
                        <p class="lead">{{ $crud->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
<!--/ Slider ends   -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title w-100 font-weight-bold">@lang("Login")</h4>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="modal-body">
                <div>
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-email">@lang("Email")</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
<br>
                <div>
                    <i class="fa fa-lock prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="defaultForm-pass">@lang("Password")</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">
                    {{ __('Login') }}
                </button>
                <a href="#register" class="btn btn-default">@lang("Register")</a>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Section services -->
<section id="services" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section heading -->
        <div class="section-heading">
            <h2>@lang("Our Services")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach($part2 as $crud)
                <div class="col-md-4 col-sm-12 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="img-wrapper">
                        <img src="{{ URL::to('/') }}/images/{{ $crud->image }}" class="img-responsive" />
                    </div>
                    <h4>{{ $crud->title }}</h4>
                    <p class="margin"> {{ $crud->description }}
                    </p>
                </div><!-- /col-md-4-->
                <br>
        @endforeach
        </div>
    </div>
</section>
<!-- /Section ends -->

<!-- Section Stats -->
<section id="stats" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section Heading -->
        <div class="section-heading">
            <h2>@lang("Our Stats")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="text-center wow fadeInUp" data-wow-delay="0.2s">
                <div class="col-md-2 col-sm-6 res-margin">
                    <!-- Number 1 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max="{{$CompanyCount}}" data-delay='20' data-increment="19">0</div>
                    <hr>
                    <h5>@lang("Companies")</h5>
                </div>

                <div class="col-md-2 col-sm-6">
                    <!-- Number 5 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max="{{$SolutinCount}}" data-delay='10' data-increment="9">0</div>
                    <hr>
                    <h5>@lang("Solutions")</h5>
                </div>

                <div class="col-md-4 col-sm-6 res-margin">
                    <!-- Number 2 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max="{{$UserCount}}" data-delay='10' data-increment="9">0</div>
                    <hr>
                    <h5>@lang("User Number")</h5>
                </div>



                <div class="col-md-2 col-sm-6 res-margin">
                    <!-- Number 3 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max="{{$FoodCount}}" data-delay='20' data-increment="19">0</div>
                    <hr>
                    <h5>@lang("Foods")</h5>
                </div>
                <div class="col-md-2 col-sm-6">
                    <!-- Number 4 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max="{{$KarmaCount}}" data-delay='10' data-increment="9">0</div>
                    <hr>
                    <h5>@lang("Mixtures")</h5>
                </div>



        </div>
        </div>

</section>
<!-- Section Ends-->

<!-- Section About -->
<section id="about" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section Heading -->
        <div class="section-heading">
            <h2>@lang("About us")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-centered">
        <div class="centered-pills">
            <!-- Navigation -->
            <ul class="nav nav-pills">
                <li class="active"><a href="#pane1" data-toggle="tab">@lang("OptimasyonX")</a></li>

                <li ><a href="#pane3" data-toggle="tab">@lang("Our Team")</a></li>
            </ul>
        </div>
    </div>
    <div class="container">
        <!-- Panels start -->
        <div class="tabbable">
            <div class="tab-content">
                <!-- Panel  1 -->
                <div id="pane1" class="paneltab tab-pane fade active in">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="col-lg-5 col-md-6 col-sm-12 res-margin wow fadeInRight" data-wow-delay="0.2s">
                                <ul>
                                    <h3>@lang("Why OptimasyonX !!")</h3>

                                    <label><li>@lang("The OptimasyonX Feed Mixing Ration Program assists you on how to produce the food you want to produce in the most optimal way with the raw materials you have.")</li></label><br>
                                    <label><li>@lang("Mixed Ration Feed optimasyonX program is the most affordable and flexible formulation software market in Turkey. You can get unlimited access to the program with an annual payment of 3600 TL (Tax included).")</li></label><br>
                                    <label><li>@lang("The optimasyonX Feed Mixing Ration Program has all the features you need, as well as an agile team that will bring the additional features you request to the program in a very short time if deemed appropriate.")</li></label><br>
                                    <label><li>@lang("100% native software")</li></label><br>

                                </ul>

                            </div>
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-5 col-md-12 col-sm-12 res-margin wow fadeInRight" data-wow-delay="0.2s">
                                <ul>
                                    <h3>@lang("Specifics")</h3>

                                    <label><li>@lang("24/7 Access over the Internet")</li></label><br>
                                    <label><li>@lang("Access from Computer, Tablet and Mobile Phone")</li></label><br>
                                    <label><li>@lang("Reporting as Excel,PDF")</li></label><br>
                                    <label><li>@lang("No additional charges")</li></label><br>
                                    <label><li>@lang("The most affordable product on the market")</li></label><br>
                                    <label><li>@lang("No update and compatibility problems")</li></label><br>
                                    <label><li>@lang("Ready-to-use database")</li></label><br>

                                    <label><li>@lang("Changing raw material, price of raw materials, minimum and maximum amount of raw materials contents on the solution screen")</li></label><br>

                                    <label><li>@lang("Change Mixture values on solution screen")</li></label><br>
                                    <label><li>@lang("Analysis of whether raw materials are used to the maximum")</li></label><br>
                                    <label><li>@lang("Demonstration of situations that disrupt the solution")</li></label><br>
                                    <label><li>@lang("When the solution is not suitable, giving the proposal for harmonization")</li></label><br>
                                    <label><li>@lang("Producing solutions according to the raw materials in stock")</li></label><br>

                                </ul>
                            </div>


                        </div>

                    </div>
                </div>
                <!-- Panel 1 ends -->



                <!-- Panel  3 -->
                <div id="pane3" class="paneltab tab-pane fade text-center">
                    <div class="row">
                        <h3>@lang("Meet our Team")</h3>
                        <!-- Item 1 -->
                        <div class="team">
                            @foreach($staffs as $staff)
                            <div class="col-md-3 col-sm-6">
                                <div class="img-wrapper">
                                    <img src="{{ URL::to('/') }}/images/{{ $staff->image }}" class="img-responsive" />
                                </div>
                                <!-- Caption -->
                                <div class="caption-team">
                                    <h5>{{$staff->name}} </h5>
                                    <span>{{$staff->job}}</span>
                                    <p>{{$staff->description}}.</p>
                                </div>
                                <!-- Social icons -->
                                <div class="social-media margin">
                                    <a href="https://wa.me/{{ $staff->phone }}" title=""><i class="fa fa-whatsapp"></i></a>
                                    <a href=" mailto:{!! $staff->mail !!}" title=""><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div><!-- /container-->
                </div><!-- /panel 3 ends -->
            </div><!-- /.tab-content -->
        </div><!-- /.tabbable -->
    </div><!-- /container-->
</section>
<!-- Section ends-->

<!-- Section Testimonials -->
<section id="testimonials" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section Heading -->
        <div class="section-heading">
            <h2>@lang("What Our Clients Say")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="container">
        <div class="row wow fadeInLeft" data-wow-delay="0.2s">
            <div id="owl-testimonials" class="owl-carousel">
                <!-- testimonial 1-->
                @foreach( $posts as $post)
                <div class="col-md-10 col-centered">
                    <blockquote>
                        <div class="col-md-2 col-md-offset-5 col-sm-12 col-xs-12 text-center">
                            <!-- testimonial image-->

                        </div>
                        <div class="col-md-10 col-md-offset-1 quote-test">
                            <!-- quote -->
                            <p>{{$post->body}}</p>
                            <small>{{$post->name}}</small>
                        </div>
                    </blockquote>
                </div>
                @endforeach

            </div><!--owl testimonials-->
        </div><!--/row -->
    </div><!--/container-->
</section>
<!-- Section Ends -->

<!-- Section Prices -->
<section id="prices" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section Heading -->
        <div class="section-heading">
            <h2>@lang("Our Prices")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="container wow fadeInDown" data-wow-delay="0.2s">
        <div class="row pricing-tables">
            <!-- Price table 1-->
            <div class="col-md-4 col-sm-6">
                <div class="pricing-table res-margin">
                    <div class="plan-name">
                        <h4>@lang("Free")</h4>
                    </div>
                    <div class="plan-price">
                        <div class="price-value">0<span>.00</span>TL</div>
                        <div class="interval">@lang("per year")</div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li>@lang("30 Free Solution Rights *")</li>
                            <li>@lang("Adding 1000 Raw Materials *")</li>
                            <li>@lang("Adding 100 Mixtures *")</li>
                            <li>@lang("Adding 10 Features *")</li>
                            <li><del>@lang("Ability to Create User Profiles") </del><span class="badge badge-danger badge-pill">Pro</span></li>
                            <li><del>@lang("Creating Production Report") </del><span class="badge badge-danger badge-pill">Pro</span></li>
                            <li><del>@lang("Ability to Create Labeled Report")</del><span class="badge badge-danger badge-pill">Pro</span></li>

                            <li>@lang("Limited Technical Support")</li>
                            <li>@lang("* Upon reaching the limit, the account is frozen")</li>
                        </ul>
                    </div>
                    <!-- Price button-->
                    <div class="plan-signup">
                        <a href="#" class="btn btn-default">@lang("Register")</a>
                    </div>
                </div>
            </div>
            <!-- Price table 2 Highlighted-->
            <div class="col-md-4 col-sm-6 res-margin">
                <div class="pricing-table highlight-plan">
                    <div class="plan-name">
                        <h4>@lang("Advanced")</h4>
                        <div class="ribbon"><span>@lang("POPULAR")</span></div>
                    </div>
                    <div class="plan-price">
                        <div class="price-value">3600 <span>.00</span>TL</div>
                        <div class="interval">@lang("per year")</div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <li>@lang("Unlimited Solution Right")</li>
                            <li>@lang("Adding Unlimited Raw Materials")</li>
                            <li>@lang("Adding Unlimited Mixtures")</li>
                            <li>@lang("Adding Unlimited Features")</li>
                            <li>@lang("Ability to Create User Profiles")</li>
                            <li>@lang("Creating Production Report")</li>
                            <li>@lang("Ability to Create Label Report")</li>
                            <li>@lang("Backup and Upload")</li>
                            <li>@lang("Fast Technical Support")</li>
                            <li>@lang("* Taxs Included")</li>
                        </ul>
                    </div>
                    <!-- Price button-->
                    <div class="plan-signup">
                        <a href="#" class="btn btn-default">@lang("Contact")</a>
                    </div>
                </div>
            </div>
            <!-- Price table 3-->
            <div class="col-md-4 col-sm-6">
                <div class="pricing-table res-margin">
                    <div class="plan-name">
                        <h4>@lang("Academic")</h4>
                    </div>
                    <div class="plan-price">
                        <div class="price-value">0<span>.00</span>TL</div>
                        <div class="interval">@lang("per year")</div>
                    </div>
                    <div class="plan-list">
                        <ul>
                            <br>
                            <p>
                                @lang("Academics, Faculty of Agriculture and Veterinary Students and other academic researchers
                             Those who want to give an idea for the development of OptimasyonX © with unlimited free use can be granted.
                             Please contact us on the subject.")

                            </p>
                        </ul>
                    </div>
                    <!-- Price button-->
                    <div class="plan-signup">
                        <a href="#" class="btn btn-default">@lang("Contact")</a>
                    </div>
                </div>
            </div>

        </div> <!-- /Pricing table ends -->
    </div> <!--/container -->
</section>
<!-- Section ends -->

<!-- Section Call to Action -->
<section id="call-to-action" class="small-section">
    <div class="container text-center">
        <div class="col-md-offset-5 col-md-7 col-sm-12">
            <h3>@lang("Comment Us")</h3>
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="page-scroll light-btn">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control input-field" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <textarea name="body" id="message" class="textarea-field form-control" rows="4" placeholder="Enter your message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit_btn" value="Submit" class="btn btn-default pull-right">@lang("Submit")</button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /container- -->
</section>
<!-- Section ends -->

<!-- Section Gallery -->
<section id="gallery" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section heading -->
        <div class="section-heading">
            <h2>@lang("Our Gallery")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="container wow fadeInDown" data-wow-delay="0.2s">
        <div class="nav-gallery col-md-12">
            <!-- Navigation -->

        </div>
        <!-- Gallery -->
        <div class="row">
            <div class="col-md-12">
                <div id="lightbox">
                    <!-- Image 1 -->
                    @foreach($images as $image)
                    <div class="col-sm-6 col-md-6 col-lg-4 others">
                        <div class="portfolio-item">
                            <div class="gallery-thumb">
                                <img class="img-responsive" src="{{ URL::to('/') }}/images/{{ $image->image }}" alt="">
                                <span class="overlay-mask"></span>
                                <a href="{{ URL::to('/') }}/images/{{ $image->image }}" data-gal="prettyPhoto[gallery]" class="link centered" title="You can add caption to pictures.">
                                    <i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Image 2 -->

                </div><!-- /lightbox-->
            </div><!-- /col-md-12-->
        </div><!-- /row -->
    </div><!-- /container -->
</section>
<!-- Section ends -->

    <!-- Section Offers -->
    <section id="register" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section Heading -->
        <div class="section-heading">
            <h2>@lang("Register")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="container wow fadeInDown" data-wow-delay="0.2s">
        <div class="row">
            <div class="col-md-5 col-centered">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div><!--/col-md-10 -->
        </div><!-- /row-->
    </div><!-- /container -->
</section>
<!-- Section Contact -->
<section id="contact" class="home-section">
    <div class="col-lg-8 col-lg-offset-2">
        <!-- Section heading -->
        <div class="section-heading">
            <h2>@lang("Get in touch")</h2>
            <div class="hr"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">

                <div class="row">
                    <div class="col-md-1 col-sm-6">
                        </div>
                    <!-- Item 1 -->
                    <div class="team">
                        @foreach($staffs as $staff)
                            <div class="col-md-3 col-sm-6">
                                <div class="img-wrapper">
                                    <img src="{{ URL::to('/') }}/images/{{ $staff->image }}" class="img-responsive" />
                                </div>
                                <!-- Caption -->
                                <div class="caption-team">
                                    <h5>{{$staff->name}} </h5>
                                    <span>{{$staff->job}}</span>
                                    <p>{{$staff->description}}.</p>
                                </div>
                                <!-- Social icons -->
                                <div class="social-media margin">
                                    <a href="https://wa.me/{{ $staff->phone }}" title=""><i class="fa fa-whatsapp"></i></a>
                                    <a href=" mailto:{!! $staff->mail !!}" title=""><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div><!-- /container-->



        </div><!-- /row -->
    </div><!-- /container-->
</section>

<!--Map -->
<div class="wow fadeInTop" data-wow-delay="0.2s">
    <div id="map-canvas"></div>
</div>
<!-- Section ends -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row wow fadeInUp" data-wow-delay="0.2s">
            <div class="col-sm-6 col-md-4">
                <!-- Social Media icons -->
                <ul class="social-media">
                    <li><a title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a title="Google Plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a  title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a  title="Flickr" href="#"><i class="fa fa-flickr"></i></a></li>
                    <li><a  title="Tumblr" href="#"><i class="fa fa-tumblr"></i></a></li>
                    <li><a  title="Instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <!-- Bottom Credits -->
            <div class="col-sm-6 col-md-offset-5 col-md-3 text-center">
                <p>COPYRIGHT © 2015-2020 Ingrid Kuhn</p>
            </div>
        </div><!-- /row-->
    </div><!-- /container -->
    <!-- Go To Top Link -->
    <div class="page-scroll hidden-sm hidden-xs">
        <a href="#page-top" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    </div>
</footer>
<!-- /footer ends -->
<!-- Core JavaScript Files -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

<!-- Plugins -->
<script src="js/plugins.js"></script>

<!-- Counter -->
<script src="js/numscroller.js"></script>

<!-- Contact form -->
<script src="js/contact.js"></script>

<!-- All Scripts & Plugins -->
<script src="js/dmss.js"></script>


</body>
</html>
