@extends('layouts.admin.material')

@section('title', 'Video')
@section('subheader','List video')

@section('content')


<div class="kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand fa fa-list"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				List video for
			</h3>
		</div>
	</div>
	<div class="kt-portlet__body">
        <div class="row">
            <div class="kt-portlet">

                <div class="kt-portlet__body">
                    <ul class="nav nav-tabs  nav-tabs-line" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1" role="tab" aria-selected="false">Pending Prayers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#kt_tabs_1_3" role="tab" aria-selected="true">Approved Prayers</a>
                        </li>
                    </ul>
                    <style>
                        .mt-comment-actions{margin:0;padding:0;}
                        .mt-comment-actions li:first-child{margin-left: 0 !important}
                        .mt-comment-actions li{
                            display: inline-block;
                            margin: 0 20px;
                        }
                        .mt-comment-text{margin:20px 0;}
                    </style>
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                            @foreach ($prayers_pending as $data_p)
                                <div class="mt-comments itemPrayer {{$data_p->id}}" style="margin-bottom:20px">
                                    <div class="mt-comment">
                                        <div class="mt-comment-body"  style="background: #f1f2f7; padding: 20px; margin: 10px 0;">
                                            <div class="mt-comment-info">
                                                <span class="mt-comment-author" style="text-transform: uppercase;">{{$data_p->name}} | <span class="kt-widget3__status kt-font-info"> Pending </span></span>
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
                        </div>


                        <div class="tab-pane " id="kt_tabs_1_3" role="tabpanel">
                            @foreach ($prayers_approved as $data_a)
                                <div class="mt-comments itemPrayer {{$data_a->id}}" style="margin-bottom:20px">
                                            <div class="mt-comment">
                                                <div class="mt-comment-body" style="background: #f1f2f7; padding: 20px; margin: 10px 0;">
                                                    <div class="mt-comment-info">
                                                        <span class="mt-comment-author" style="text-transform: uppercase;">{{$data_a->name}} | <span class="mt-comment-status mt-comment-status-pending statusp"><b>APPROVED</b></span></span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--begin: Datatable -->


		<!--end: Datatable -->
	</div>
</div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/script-prayer.js') }}"></script>
@endsection