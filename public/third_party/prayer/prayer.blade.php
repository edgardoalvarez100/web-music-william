@extends('theme.frontend')

	@section('content')
        <style>
            .tobtn a + a{ margin-left: 20px }
            #contact{display: none}
            .wtext-white{color: white}
        </style>
 		<!-- start slider section -->
 		<section class="fullscreen background-overlay p0 mb-0 t0 jhj" style="background: url({{ asset('images/ACC_home_paralax_5.jpg') }}) no-repeat 50% 50%/cover;">

	        <div class="container vertical-align" style="z-index: 9;">
	            <div class="row">
	                <div class="col-md-10 col-xs-10 col-ip-10 col-center text-center">
	                    <h1 class="wtext-white">Prayer</h1>
                        <div class="tobtn">
                            <a style="font-weight: 300; font-size: 16px;" class="btn btn-large btn-transparent-white lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto margin-40px-top openSection" href="#prayer">prayer request</a>
                        <a style="font-weight: 300; font-size: 16px;" class="btn btn-large btn-transparent-white lg-margin-15px-bottom d-table d-lg-inline-block md-margin-lr-auto margin-40px-top openSection" href="#praise">praise report</a>
                        </div>
	                </div>
	            </div>
	        </div>

	        <div class="down-section text-center" style="z-index: 9;">
		    	<a href="#about" class="inner-link">
		    		<div class="ldline"></div>
		    		<p class="text-white abril white">scroll</p>
			    	<img src="images/ACC_Web_elements-24B.png" alt="" style="width: 17px; margin: auto; display: block;">
		    	</a>
		    </div>
            <!-- end revolution slider -->
    	</section>
        <!-- end slider section -->

        <!-- start story section -->
        <section class="wow fadeIn animated animated">
            <div class="container" id="about">
            	<div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 text-center center-col margin-70px-bottom sm-margin-40px-bottom xs-margin-30px-bottom">
                        <h6 class="text-uppercase font-weight-400 text-extra-dark-gray alt-font fs36 georgia">DON’T DO LIFE ALONE</h6>
                        <span class="alt-font text-deep-yellow text-medium margin-5px-bottom display-block ls8">LIFE IS BETTER TOGETHER</span>
                    </div>
                </div>

                <div class="row equalize sm-equalize-auto">
                	<div class="col-10 col-center col-lg-10">
	                    <div class="display-table width-100 height-100">
	                        <div class="display-table-cell vertical-align-middle text-center padding-eigth-lr sm-text-center sm-no-padding width-100">
	                            <span class="text-medium font-weight-300 line-height-35 lg-width-100 alt-font width-100 display-block margin-60px-bottom" style="color: #95989A !important;">
	                              	Please allow us to join with you in prayer. We believe in the power of prayer; it is not just something to do, but it is a personal and powerful privilege to communicate with the One who can move the mountains in our lives. Whatever you are going through, we want to pray with you. Our Pastoral Team prays over every prayer request we receive, and truly desires to see your faith and relationship grow to new heights as you turn to Him for all your needs. We look forward to hearing from you.
	                            </span>
	                        </div>
	                    </div>
	                </div>
                </div>
            </div>
        </section>
        <!-- end story section -->


        <section class="section  has-background-primary-light is-clearfix" id="repport" style="background:#f5f5f5">
            <div class="container" style="min-height: 670px">
                <div class="row mb-40">
                    <div class="col-md-12 text-center">
                        <h2>Prayer Requests</h2>
                    </div>
                </div>
                <div class="row" style="justify-content: center">
                    @php
                        $cont = 1;
                        $mode = 1;
                    @endphp
                    @foreach ($prayers as $prayer)
                        <div class="col-md-12 mb-20 show num{{ $mode }} {{ $mode == 1 ? "active" : null }} ">
                            <div class="box relative">
                                <article class="media ">
                                    <div class="media-content">
                                        <div class="content">
                                            <p style="font-size: 12px">
                                                 POSTED ON {{ strtoupper($prayer->created_at->diffForHumans()) }}</span>
                                            </p>
                                            <p class="prayer_text">
                                                {{ $prayer->message }}
                                            </p>
                                        </div>

                                        <div class="flexdiv">
                                            <div class="col1"><span class="">BY {{ strtoupper($prayer->name) }}</span></div>
                                            <div class="col2"><span class=""><i class="fa fa-heart-o pul{{$prayer->id}}" aria-hidden="true"></i> <b id="count{{$prayer->id}}">{{ $prayer->numPrayer }}</b> PRAYER{{ $prayer->numPrayer>1 ? "S" : null }}</div>
                                                <div class="col-3"><a href="prayer-detail" id="{{$prayer->id}}" class="w prayaction">I PRAYED FOR THIS</a></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                        @php
                            if($cont % 3 == 0){
                                $mode ++;
                            }
                                $cont ++;
                        @endphp
                    @endforeach

                </div>
            </div>
            <div class="container">
                <ul id="example-1" class="pagination"></ul>
            </div>
        </section>

        <!-- start form section -->
        <section class="wow fadeIn section_tab" id="prayer" style="background:#0F0F35;display: none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 text-center center-col margin-70px-bottom sm-margin-40px-bottom xs-margin-30px-bottom">
                        <h6 class="font-weight-400 text-white alt-font fs36 georgia text-uppercase">PRAYER REQUEST</h6>
                    </div>
                </div>
                <!-- start contact-form -->
                <div class="col-10 col-center col-lg-10">

                    <div class="result" style="display: none; text-align: center; color: #fff;"></div>

                    <form  class="contact-form prayerForm prayer-form" accept-charset="UTF-8" action="{{ url('save_prayer') }}" id="prayer-form" method="POST">
                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="name" id="name" placeholder="Your Name" class="bg-transparent border-color-medium-white medium-input">
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="phone" placeholder="Phone Number" class="bg-transparent border-color-medium-white medium-input">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <input type="text" name="email" id="email" placeholder="E-MAIL" class="bg-transparent border-color-medium-white medium-input">
                            </div>


                            <div class="col-md-12 col-sm-12">
                                <div class="select-style medium-select border-color-medium-white">
                                    <select name="topic" id="topic" class="bg-transparent no-margin-bottom">
                                        <option value="Share This">Share This</option>
                                        <option value="Share This Anonymously">Share This Anonymously</option>
                                        <option value="DO NOT Share This">DO NOT Share This</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 sm-clear-both">
                                <textarea name="message" id="message" placeholder="MESSAGE" rows="6" class="bg-transparent border-color-medium-white medium-textarea"></textarea>
                            </div>


                            <div class="col-md-12 text-center">
                                <input class="input" type="hidden" name="kind" value="prayer">
                                <button style="width: 100%;" class="button  is-outlined enviarp btn btn-deep-yellow btn-large margin-20px-top xs-no-margin-top"  type="submit" id="enviarp">Share</button>
                            </div>
                        </div>
                    </form>
                    <div id="addrequest" style="display: none" class="text-center"></div>
                    <!-- end contact-form -->

                </div>
            </div>
        </section>
        <!-- end form section -->





        <!-- start form section -->
        <section class="wow fadeIn section_tab" id="praise" style="background:#0F0F35;display: none">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 text-center center-col margin-70px-bottom sm-margin-40px-bottom xs-margin-30px-bottom">
                        <h6 class="font-weight-400 text-white alt-font fs36 georgia text-uppercase">SHARE YOUR STORY</h6>
                    </div>
                </div>
                <!-- start contact-form -->
                <div class="col-10 col-center col-lg-10">

                    <div class="result" style="display: none; text-align: center; color: #fff;"></div>

                    <form  class="contact-form prayerForm prayer-form" accept-charset="UTF-8" action="{{ url('save_prayer') }}" id="prayer-form2" method="POST">
                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="name" id="name2" placeholder="Your Name" class="bg-transparent border-color-medium-white medium-input">
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <input type="text" name="phone" placeholder="Phone Number" class="bg-transparent border-color-medium-white medium-input">
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <input type="text" name="email" id="email2" placeholder="E-MAIL" class="bg-transparent border-color-medium-white medium-input">
                            </div>


                            <div class="col-md-12 col-sm-12">
                                <div class="select-style medium-select border-color-medium-white">
                                    <select name="topic" id="topic" class="bg-transparent no-margin-bottom">
                                        <option value="Share This">Share This</option>
                                        <option value="Share This Anonymously">Share This Anonymously</option>
                                        <option value="DO NOT Share This">DO NOT Share This</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 sm-clear-both">
                                <textarea name="message" id="message" placeholder="MESSAGE" rows="6" class="bg-transparent border-color-medium-white medium-textarea"></textarea>
                            </div>


                            <div class="col-md-12 text-center">
                                <input class="input" type="hidden" name="kind" value="praise">
                                <button style="width: 100%;" class="button  is-outlined enviarp btn btn-deep-yellow btn-large margin-20px-top xs-no-margin-top"  type="submit" id="enviarp2">Share</button>
                            </div>
                        </div>
                    </form>
                    <div id="addrequest2" style="display: none" class="text-center"></div>
                    <!-- end contact-form -->

                </div>
            </div>
        </section>
        <!-- end form section -->



    @endsection