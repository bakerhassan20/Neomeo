@extends('admin.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@section('title')
الملف الشخصي
@stop

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/الملف الشخصي</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


				<!-- row -->
				<div class="row">

<div class="col-12 py-3">
	<div class="container">
		<div class="p-3 main-box mx-auto" style="width:600px;max-width: 100%;">
			<div class="d-flex align-items-center justify-content-center py-4">
			 	<div class="col-12 d-flex justify-content-center align-items-center mx-auto " style="width:100%">
			 		<div class="col-12 p-0 text-center">
				 		<img src="{{URL::asset('assets/img/user_img/'.Auth::user()->img)}}" style="width:150px;height:150px;border-radius: 50%;" class="d-inline-block">
				 		<div class="col-12 font-3 text-center py-2">
				 			{{ Auth::user()->name }}
				 		</div>
			 		</div>
			 	</div>
			</div>
			<div class="col-12 p-0">
				<table class="table table-bordered table-striped rounded table-hover">
					<tbody>
						<tr>
							<td> البريد الالكتروني</td>
							<td>{{ Auth::user()->email }}</td>
						</tr>
						<tr>
							<td>نوع الحساب</td>
							<td>
                            @if (!empty(Auth::user()->getRoleNames()))
                            @foreach (Auth::user()->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                            @endif
                            </td>
						</tr>
						<tr>
							<td>فعال</td>
							<td>
                            @if(Auth::user()->Status == 'مفعل')
                            <span class="fas fa-check-circle text-success">
                            @else
                             <span class="fas fa-check-circle text-error">
                            </span></td>
                            @endif
						</tr>
						<tr>
							<td>تحكم</td>
							<td><a href="{{ route('profile.edit') }}" class="rounded-0 btn btn-success btn-sm border"><span class="bx bx-cog fa-lg"></span> تعديل </a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



</div>




				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>


@endsection
