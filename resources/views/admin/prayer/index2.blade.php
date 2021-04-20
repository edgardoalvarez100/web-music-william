@extends('layouts.admin')

@section('content')
            @include('admin.partials.head')
            @include('admin.partials.nav')    <style type="text/css">


        .statusp{
            font-weight: 300;
                text-transform: uppercase;
                color: #f7a510;
                letter-spacing: 1px;
        }
        textarea.mgh{
            width: 100%;
                padding: 10px;
                outline: none;
                border: 1px solid #e2e2e2;
                margin-top: 15px;
                margin-bottom: 10px;
        }
        .Approved{color:green !important;}
    </style>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->

                <h1 class="page-title"> PRAYER
                </h1>
                <div class="page-bar">
                    <ul class="page-breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="{{url('control/dashboard')}}">Dashboard</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{url('control/prayer')}}">Prayer</a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <span>All</span>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-list font-dark"></i>
                                    <span class="caption-subject bold uppercase">SHOWING CONTENT</span>
                                </div>
                            </div>


                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <div class="caption">
                                        <i class="icon-bubbles font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">PRAYERS</span>
                                    </div>
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#portlet_comments_1" data-toggle="tab"> Pending </a>
                                        </li>
                                        <li>
                                            <a href="#portlet_comments_2" data-toggle="tab"> Approved </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="portlet_comments_1">
                                            <!-- BEGIN: Comments -->
                                            @foreach ($prayers_pending as $data_p)
                                            	<div class="mt-comments itemPrayer {{$data_p->id}}"" style="margin-bottom:20px">
                                            	            <div class="mt-comment">
                                            	                <div class="mt-comment-body">
                                            	                    <div class="mt-comment-info">
                                            	                        <span class="mt-comment-author" style="text-transform: uppercase;">{{$data_p->name}} | <span class="mt-comment-status mt-comment-status-pending statusp">Pending</span></span>
                                            	                        <span class="mt-comment-date">{{ $data_p->updated_at->diffForHumans() }}</span> <br>
                                            	                    </div>
                                            	                    <div class="mt-comment-text" id="msg{{$data_p->id}}"> {{ $data_p->message }} </div>
                                            	                    <div class="mt-comment-details">

                                            	                        <ul class="mt-comment-actions" style="display:block">
                                            	                            <li>
                                            	                                <a href="#" class="edit_action" id="{{$data_p->id}}">Quick Edit</a>
                                            	                            </li>
                                            	                            <li>
                                            	                                <a href="#" class="public_action" id="{{$data_p->id}}">Publish</a>
                                            	                            </li>
                                            	                            <li>
                                            	                                <a href="#" class="delete_action" id="{{$data_p->id}}">Delete</a>
                                            	                            </li>
                                            	                        </ul>
                                            	                    </div>
                                            	                    <form action="" class="pt24" id="form-edit{{$data_p->id}}" style="display:none">
                                            	                        <textarea name="texto" id="texto{{$data_p->id}}" rows="4" style="width:100%" class="mgh">{{$data_p->message}}</textarea>
                                            	                        <a href="#!" class="btn btn-blue save_action" id="{{$data_p->id}}">SAVE</a>
                                            	                    </form>
                                            	                </div>
                                            	            </div>

                                            	        </div>
                                            @endforeach
                                            <!-- END: Comments -->
                                        </div>


                                        <div class="tab-pane" id="portlet_comments_2">
                                            <!-- BEGIN: Comments -->
                                            @foreach ($prayers_approved as $data_a)
                                            	<div class="mt-comments itemPrayer {{$data_a->id}}"" style="margin-bottom:20px">
                                            	            <div class="mt-comment">
                                            	                <div class="mt-comment-body">
                                            	                    <div class="mt-comment-info">
                                            	                        <span class="mt-comment-author" style="text-transform: uppercase;">{{$data_a->name}} | <span class="mt-comment-status mt-comment-status-pending statusp">Pending</span></span>
                                            	                        <span class="mt-comment-date">{{ $data_a->updated_at->diffForHumans() }}</span> <br>
                                            	                    </div>
                                            	                    <div class="mt-comment-text" id="msg{{$data_a->id}}"> {{ $data_a->message }} </div>
                                            	                    <div class="mt-comment-details">

                                            	                        <ul class="mt-comment-actions" style="display:block">
                                            	                            {{-- <li>
                                            	                                <a href="#" class="edit_action" id="{{$data_a->id}}">Quick Edit</a>
                                            	                            </li> --}}
                                            	                            {{-- <li>
                                            	                                <a href="#" class="public_action" id="{{$data_a->id}}">Publish</a>
                                            	                            </li> --}}
                                            	                            <li>
                                            	                                <a href="#" class="delete_action" id="{{$data_a->id}}">Delete</a>
                                            	                            </li>
                                            	                        </ul>
                                            	                    </div>
                                            	                    <form action="" class="pt24" id="form-edit{{$data_a->id}}" style="display:none">
                                            	                        <textarea name="texto" id="texto{{$data_a->id}}" rows="4" style="width:100%" class="mgh">{{$data_a->message}}</textarea>
                                            	                        <a href="#!" class="btn btn-blue save_action" id="{{$data_a->id}}">SAVE</a>
                                            	                    </form>
                                            	                </div>
                                            	            </div>

                                            	        </div>
                                            @endforeach
                                            <!-- END: Comments -->
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
        @include('admin.partials.footer')
@endsection