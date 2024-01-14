@extends('admin.master')
@section('content')
@section('title')
@lang('orders.orders_list')
@endsection
<div class="container-fluid">
	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		   <ol class="breadcrumb">
				<li class="active breadcrumbColor"><a href="{{ url('dashboard') }}"><i class="fa fa-home"></i> @lang('dashboard.dashboard')</a></li>
				<li>@yield('title')</li>
			</ol>
		</div>	
		
	</div>
                
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-info">
				<div class="panel-heading"><i class="mdi mdi-table fa-fw"></i> @yield('title')</div>
				<div class="panel-wrapper collapse in" aria-expanded="true">
					<div class="panel-body">
						@if(session()->has('success'))
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="cr-icon glyphicon glyphicon-ok"></i>&nbsp;<strong>{{ session()->get('success') }}</strong>
							</div>
						@endif
						@if(session()->has('error'))
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<i class="glyphicon glyphicon-remove"></i>&nbsp;<strong>{{ session()->get('error') }}</strong>
							</div>
						@endif
						<div class="table-responsive">
							<table id="myTable" class="table table-bordered">
								<thead>
									 <tr class="tr_header">
                                        <th>@lang('common.serial')</th>
                                        <th>@lang('common.name')</th>
                                          <th>@lang('orders.email')</th>
                                          <th>@lang('orders.phone')</th>
                                          <th>@lang('orders.address')</th>
                                          <th>@lang('orders.total')</th>
                                          <th>@lang('orders.quantity')</th>
										<th>@lang('orders.payment_method')</th>
                                      
                                    </tr>
								</thead>
								<tbody>
									{!! $sl=null !!}
									@foreach($orders AS $value)
										<tr class="{!! $value->id !!}">
											<td style="width: 300px;">{!! ++$sl !!}</td>
											
											<td>{!! $value->name !!}</td>
											<td>{!! $value->email !!}</td>
											<td>{!! $value->phone !!}</td>
											<td>{!! $value->address !!}</td>
											<td>{!! $value->total !!}</td>
											<td>{!! $value->qty !!}</td>
											<td>{!! $value->payment_method !!}</td>
											
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
