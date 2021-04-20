@extends('layouts.front')
@section('content')
<style>
    .cuadro {
        position: absolute;
        background: transparent;
        width: 97%;
        height: 93%;
        top: 30px;
        left: 30px;
        border: 5px solid #c1c1c185;
    }
</style>

<section class="section-mod relative d-none"
    style="height:80vh;background-size: cover; background-image: url({{ asset('assets/images/3cc_TopBanner-1920x1080.jpg') }}); background-position: 50% 40%; background-repeat: no-repeat;">

</section>

<section class="section-mod  relative"
    style="background-size: cover; background-image: url({{ asset('assets/images/3CC_ONLY_THE_BLOOD_Web.jpg') }}); background-position: 50% 50%; background-repeat: no-repeat;">

    <span class="cuadro"></span>
    <div class="container">
        <div class="row center_flex">
            <div class="col-md-6 mb-xs-40 mt-xs-90 wow fadeInUp col-xs-6">
                <img src="{{ asset('assets/images/3cc_only_title.png') }}" alt="">
            </div>
            <div class="col-md-5 mobile-off">
                <div class="white_box">
                    <h4 class=" wow fadeInUp" data-wow-delay="0.0s">Nuevo Sencillo </h4>
                    <h1 class=" wow fadeInUp" data-wow-delay="0.1s" style="color: #d0a862 !important">Only The Blood
                    </h1>
                    <p class=" wow fadeInUp" data-wow-delay="0.2s" style="text-align: justify;">
                        "Only The Blood" was written as a reminder of God's great love for us. When we sing songs that
                        are filled with the truth
                        of Jesus' sacrifice on the cross, we are brought to a place of heartbreak, awe, and celebration,
                        all at the same time.
                        There is no better way to reflect on the Gospel message than to sing of our intentional
                        creation; our need for a Savior;
                        and the death, burial, and resurrection of Jesus Christ. How incredible it is to be loved so
                        much by such a great God!<br><br>

                        “Only the Blood” is now available everywhere you listen to music!
                    </p>
                    <div class="tobtn wow fadeInUp" data-wow-delay="0.3s">
                        <a class="btn btn-large btn-black " href="https://distrokid.com/" target="_blank">Escuchar
                            Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section style="background-size: cover; background-image: url({{ asset('assets/images/3CC_The_Hope_Of_Christmas_BG.jpg') }});
background-position: 50% 50%; background-repeat: no-repeat;display: none" class="mobile-on">
<div class="container">
    <div class="row">
        <div class="col-md-5 mobile-on mobile-off">
            <div class="white_box">
                <h4 class=" wow fadeInUp" data-wow-delay="0.0s">New Album </h4>
                <h1 class=" wow fadeInUp" data-wow-delay="0.1s" style="color: #d0a862 !important">THE HOPE OF CHRISTMAS
                </h1>
                <p class=" wow fadeInUp" data-wow-delay="0.2s" style="text-align: justify;">
                    This Christmas, we cannot help but be reminded of God’s faithfulness and goodness to us. When there
                    was no hope, He became our hope. God, in flesh, came down from heaven and forever changed
                    everything. Through times of uncertainty, we can hold on to this one unchanging truth: our God is
                    with us. Experience The Hope of Christmas with us this season through these original songs from
                    3Circle Music.

                </p>
                <div class="tobtn wow fadeInUp" data-wow-delay="0.3s">
                    <a class="btn btn-large btn-black lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto"
                        href="https://distrokid.com/hyperfollow/3circlemusic/the-hope-of-christmas"
                        target="_blank">ESCUCHAR</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section> --}}
{{--
<section class="section-mod" id="about">
    <div class="container">
        <div class="row flex_between">
            <div class="col-md-7 mb-xs-0">
                <h4 class=" wow fadeInUp" data-wow-delay="0.0s">New Sencillo </h4>
                <h1 class=" wow fadeInUp" data-wow-delay="0.1s" style="color: #d0a862 !important">Only The Blood
                </h1>
                <p class=" wow fadeInUp" data-wow-delay="0.2s" style="text-align: justify;">
                    "Only The Blood" was written as a reminder of God's great love for us. When we sing songs that
                    are filled with the truth
                    of Jesus' sacrifice on the cross, we are brought to a place of heartbreak, awe, and celebration,
                    all at the same time.
                    There is no better way to reflect on the Gospel message than to sing of our intentional
                    creation; our need for a Savior;
                    and the death, burial, and resurrection of Jesus Christ. How incredible it is to be loved so
                    much by such a great God!<br><br>

                    “Only the Blood” is now available everywhere you listen to music!
                </p>
                <div class="tobtn wow fadeInUp" data-wow-delay="0.3s">
                    <a class="btn btn-large btn-black "
                        href="https://distrokid.com/hyperfollow/3circlemusic/only-the-blood-feat-zach-adamson--moriah-ray"
                        target="_blank">ESCUCHAR</a>
                </div>
            </div>

            <div class="col-md-4 mb-xs-60 mobile-off">
                <div class="gray_box wow fadeInUp" data-wow-delay="0.0s">
                    <p class="mb-0" style="text-align: justify;">Stay connected with 3Circle Music! Be the first to hear
                        about new projects, events, and more.</p>
                </div>
                <ul class="sm wow fadeInUp" data-wow-delay="0.2s">
                    <li><a href="https://instagram.com/3circlemusic?igshid=1gkgbx99h4mnx" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.facebook.com/3CircleMusic/" target="_blank"><i
                                class="fab fa-facebook"></i></a></li>
                    <li><a href="http://eepurl.com/hgAYB5" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section> --}}

<section class="section-mod" id="about">
    <div class="container">
        <div class="row flex_between">
            <div class="col-md-7 mb-xs-0">
                <h2 class=" wow fadeInUp" data-wow-delay="0.0s">About</h2>
                <p class="lead wow fadeInUp" data-wow-delay="0.2s" style="text-align: justify;">
                    Music is a ministry of <a href="#" target="_blank"
                        style="color: #129CA1;font-weight: normal">Church</a>, with campuses along the Gulf
                    Coast of Alabama. We exist to reflect the beauty and artistry of our Creator in all that we create;
                    declare God’s unchanging character and redemptive work, through all generations; and engage people
                    in fervent response to Jesus, and in community with one another.
                </p>
            </div>

            <div class="col-md-4 mb-xs-60 mobile-off">
                <div class="gray_box wow fadeInUp" data-wow-delay="0.0s">
                    <p class="mb-0" style="text-align: justify;">Stay connected with Music! Be the first to hear
                        about new projects, events, and more.</p>
                </div>
                <ul class="sm wow fadeInUp" data-wow-delay="0.2s">
                    <li><a href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="http://eepurl.com/" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="mobile-on mb-xs-60" style="display: none;background-color: #F7F7F7;padding:40px 0 40px 0">
    <div class="container ">
        <div class="row">
            <div class="col-md-4 ">
                <div class="gray_box wow fadeInUp mb-xs-20" data-wow-delay="0.0s" style="padding:0 !important">
                    <p class="mb-0" style="text-align: justify;">Stay connected with Music! Be the first to hear
                        about new projects, events, and more.</p>
                </div>
                <ul class="sm wow fadeInUp" data-wow-delay="0.2s">
                    <li><a href="https://instagram.com/3circlemusic?igshid=1gkgbx99h4mnx" target="_blank"><i
                                class="fab fa-instagram"></i></a></li>
                    <li><a href="https://www.facebook.com/3CircleMusic/" target="_blank"><i
                                class="fab fa-facebook"></i></a></li>
                    <li><a href="" target="_blank"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="section-mod" style="padding-bottom: 20px;padding-top: 0px">
    <div class="container-fluid">
        <div class="row mb-20 mb-xs-0">
            <div class="mb-xs-20 col-md-6 wow fadeInUp" data-wow-delay="0.0s">
                <img src="{{ asset('assets/images/48876399588_9813db63cb_k.jpg') }}" alt="">
            </div>
            <div class="mb-xs-20 col-md-3 wow fadeInUp" data-wow-delay="0.2s">
                <img src="{{ asset('assets/images/49385853073_0f4deb6282_k.jpg') }}" alt="">
            </div>
            <div class="mb-xs-20 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                <img src="{{ asset('assets/images/49464522618_c35a2b7684_k.jpg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="mb-xs-20 col-md-3 wow fadeInUp" data-wow-delay="0.6s">
                <img src="{{ asset('assets/images/49464522833_173fb6c897_k.jpg') }}" alt="">
            </div>
            <div class="mb-xs-20 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <img src="{{ asset('assets/images/49464535413_8e8c8c6161_k.jpg') }}" alt="">
            </div>
            <div class="mb-xs-20 col-md-3 wow fadeInUp" data-wow-delay="0.0s">
                <img src="{{ asset('assets/images/49465234767_c65768cc42_k.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>


<section id="music"
    style="height:80vh;overflow: initial;background-size: cover; background-image: url({{ asset('assets/images/48536623376_e368e34f93_k.jpg') }}); background-position: 50% 50%; background-repeat: no-repeat;">
    <div class="container vertical-align">
        <div class="row">
            <div class="col-md-12">
                <h1 class="big text-white wow fadeInUp" data-wow-delay="0.0s">Últimos Lanzamientos</h1>
                <ul class="sm">
                    <li class=" wow fadeInUp" data-wow-delay="0.0s"><a href="https://instagram.com/" target="_blank"><i
                                class="fab text-white fa-instagram"></i></a></li>
                    <li class=" wow fadeInUp" data-wow-delay="0.1s"><a href="https://www.facebook.com/"
                            target="_blank"><i class="fab text-white fa-facebook"></i></a></li>
                    {{-- <li class=" wow fadeInUp" data-wow-delay="0.2s"><a href="#" target="_blank"><i class="fab text-white fa-youtube"></i></a></li> --}}
                    <li class=" wow fadeInUp" data-wow-delay="0.3s"><a href="https://open.spotify.com/"
                            target="_blank"><i class="fab text-white fa-spotify"></i></a></li>
                    <li class=" wow fadeInUp" data-wow-delay="0.4s"><a href="https://music.apple.com/"
                            target="_blank"><i class="fab text-white fa-apple"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>

<section class="section-mod" style="overflow: initial;">
    <div class="container-fluid" style="max-width: 80%">
        <div class="row mt0" style="margin-top: -37vh">
            <div class="col-md-3 wow fadeInUp mb-xs-60 mb-40" data-wow-delay="0.0s">
                <img src="{{ asset('assets/images/3CC_ONLY_THE_BLOOD_cover.jpg') }}" class="mb-20" alt="">
                <aside>
                    <div>
                        <h4 class="mb-0" style="font-size:12px !important;font-weight: normal !important">CANCION</h4>
                        <h3 class="mb-0" style="font-size:20px">Only the Blood</h3>
                    </div>
                    <div class="tobtn">
                        <a class="btn btn-large btn-transparent-black lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto"
                            href="https://distrokid.com/">ESCUCHAR</a>
                    </div>
                </aside>
            </div>

            <div class="col-md-3 wow fadeInUp mb-xs-60 mb-40" data-wow-delay="0.0s">
                <img src="{{ asset('assets/images/3CC_The_Hope_Of_Christmas_Cover.jpg') }}" class="mb-20" alt="">
                <aside>
                    <div>
                        <h4 class="mb-0" style="font-size:12px !important;font-weight: normal !important">ALBUM</h4>
                        <h3 class="mb-0" style="font-size:20px">The Hope of Christmas</h3>
                    </div>
                    <div class="tobtn">
                        <a class="btn btn-large btn-transparent-black lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto"
                            href="https://distrokid.com/">ESCUCHAR</a>
                    </div>
                </aside>
            </div>

            <div class="col-md-3 wow fadeInUp mb-xs-60 mb-40" data-wow-delay="0.1s">
                <img src="{{ asset('assets/images/2.jpg') }}" class="mb-20" alt="">
                <aside>
                    <div>
                        <h4 class="mb-0" style="font-size:12px !important;font-weight: normal !important">CANCION</h4>
                        <h3 class="mb-0" style="font-size:20px">Rivers</h3>
                    </div>
                    <div class="tobtn">
                        <a class="btn btn-large btn-transparent-black lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto"
                            href="https://distrokid.com/" target="_blank">ESCUCHAR</a>
                    </div>
                </aside>
            </div>
            <div class="col-md-3 wow fadeInUp mb-xs-60 mb-40" data-wow-delay="0.2s">
                <img src="{{ asset('assets/images/3.jpg') }}" class="mb-20" alt="">
                <aside>
                    <div>
                        <h4 class="mb-0" style="font-size:12px !important;font-weight: normal !important">MUSIC VIDEO
                        </h4>
                        <h3 class="mb-0" style="font-size:20px">Way Maker</h3>
                    </div>
                    <div class="tobtn">
                        <a class="btn btn-large btn-transparent-black lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto"
                            href="https://www.youtube.com/" target="_blank">ESCUCHAR</a>
                    </div>
                </aside>
            </div>
        </div>

    </div>
</section>


@endsection
