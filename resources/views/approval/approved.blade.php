@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading" style="font-size: 1.2em;">
        অনুমোদনকৃত নিদর্শনসমূহের তালিকা
    </div>
    <div class="panel-body">
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
					<td>
						<a href="{{ route('accessions.show', [$accession]) }}" class="btn btn-info btn-xs">
							<span class="glyphicon glyphicon glyphicon-eye-open"></span>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
    </div>
  </div>
@stop

@section('script')
@include('layouts.common.dt-export', [
    'heading' => " জাদুঘরের নিদর্শনসমূহের তালিকা/লিস্ট",
    'columns' => "0, 1, 2, 3, 4, 5"
])
@stop
