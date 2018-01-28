@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading" style="font-size: 1.2em;">
        জাদুঘরের নিদর্শনসমূহের তালিকা/লিস্ট
    </div>

    <div class="panel-body">
    	<div class="well">
			<form action="" method="GET" role="form" class="form form-inline">
				<div class="form-group">
					<select name="status" id="" class="form-control">
						<option value="">নিদর্শনের স্ট্যাটাস সিলেক্ট করুন</option>
						<option value="approved" {{ Request::input('status') == 'approved' ? 'selected' : '' }}>অনুমোদনকৃত নিদর্শন</option>
						<option value="pending" {{ Request::input('status') == 'pending' ? 'selected' : '' }}>অপেক্ষমান অনুমোদন</option>
					</select>
				</div>
				<div class="form-group">
					<select name="classification" id="" class="form-control">
						<option value="">নিদর্শনের শ্রেণী বিভাগ সিলেক্ট করুন</option>
						@foreach($classifications as $classification)
						<option value="{{$classification->id}}" {{ Request::input('classification') == $classification->id ? 'selected' : '' }}>{{$classification->title_bn}}</option>
						@endforeach
					</select>
				</div>

				<button type="submit" class="btn btn-primary btn-sm">SEARCH</button>
			</form>
    	</div>
		<table class="table table-hover table-bordered datatable">
			<thead>
				<tr>
					<th>সংগ্রহভুক্তি নম্বর</th>
					<th>মোট নিদর্শন</th>
					<th>সংগ্রহের তারিখ</th>
					<th>নথি নং</th>
					<th>সংগ্রহের ধরন</th>
					<th>নিদর্শনের শ্রেণী বিভাগ</th>
					<th>পরিমাপ</th>
					<th>স্ট্যাটাস</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($accessions as $accession)
				<tr>
					<td>{{ $accession->accession_no_from . ' - ' . $accession->accession_no_to }}</td>
					<td>{{ $accession->total_number_of_object }}</td>
					<td>{{ $accession->collection_date->format('M d, Y') }}</td>
					<td>{{ $accession->file_no }}</td>
					<td>{{ $accession->made_of_collection }}</td>
					<td>{{ $accession->classification->title_bn }}</td>
					<td>{{ $accession->measurement }}</td>
					<td>{{ $accession->status ? 'অনুমোদিত' : 'অননুমোদিত' }}</td>
					<td>
						<a href="{{ route('accessions.show', [$accession]) }}" class="btn btn-info btn-xs">
							<span class="glyphicon glyphicon glyphicon-eye-open
"></span>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{ $accessions->links() }}
    </div>
  </div>
@stop
@section('script')
@include('layouts.common.dt-export', [
    'heading' => " জাদুঘরের নিদর্শনসমূহের তালিকা/লিস্ট",
    'columns' => "0, 1, 2, 3, 4, 5, 6"
])
<script type="text/javascript">
	$(document).ready(function() {
		$(".form").on('submit', function() {
	        $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	        $(this).find(":select").filter(function(){ return !this.value; }).attr("disabled", "disabled");
	        return true;
	    });
	});
</script>
@stop

