@extends('layouts.app')

@section('content')
<div class="panel panel-default row">
    <div class="panel-heading" style="font-size: 1.2em;">
        OBJECT ACCESSION INFO
    </div>
    <div class="panel-body">
    	<div class="row">
    		<div class="col-md-{{ $approved ? '12' : '10' }}">
    			<table class="table table-hover table-bordered datatable">
				 	<thead>
				 		<tr class="active">
				 			<th>সংগ্রহভুক্তির তথ্য</th>
				 			<th>সংগ্রহভুক্তির বিবরণ</th>
				 			<th>সংগ্রহভুক্তির তথ্য</th>
				 			<th>সংগ্রহভুক্তির বিবরণ</th>
				 		</tr>
				 	</thead>
					<tbody>
						<tr>
							<td>সংগ্রহভুক্তি নম্বর</td>
							<td>{{$accession->accession_no_from}} হইতে {{$accession->accession_no_to}}</td>
							<td>মোট নিদর্শন সংখ্যা</td>
							<td>{{$accession->total_number_of_object}}</td>
						</tr>
						<tr>
							<td>সংগ্রহের তারিখ</td>
							<td>{{$accession->collection_date->format('M d, Y')}}</td>
							<td>নথি নং</td>
							<td>{{$accession->file_no}}</td>
						</tr>
						<tr>
							<td>ইন্সুরেন্স মূল্য</td>
		                    <td>{{$accession->insurance_value}}</td>
							<td>নিদর্শনের সংক্ষিপ্ত বিবরণ</td>
							<td>{{$accession->description_of_object}}</td>
						</tr>
						<tr>
							<td>নিদর্শনের শ্রেণী বিভাগ</td>
							<td>{{$accession->classification->title_bn}}</td>
							<td>পরিমাপ</td>
							<td>{{$accession->measurement}}</td>
						</tr>
						<tr>
							<td>প্রাপ্তিস্থান ও আবিষ্কারের বিবরণ </td>
							<td>{{$accession->provenance_and_acquisition_history}}</td>
							<td>সময়কাল</td>
							<td>{{$accession->period}}</td>
						</tr>
						<tr>
							<td>প্রস্তাবিত মূল্য</td>
							<td>{{$accession->propsed_price}}</td>
							 <td>নিদর্শনের স্ট্যাটাস</td>
							 <td>{{ $accession->status ? 'অনুমোদিত' : 'অননুমোদিত' }}</td>
						</tr>
						<tr>
							<td>সংগ্রহের ধরন</td>
							<td>{{$accession->made_of_collection}}</td>
							<td>ক্রয় মূল্য</td>
							<td>{{$accession->input_price}}</td>
						</tr>
						<tr>
							<td>ব্যাক্তিগত তথ্য</td>
							<td>{{$accession->Personal_info}}</td>
							<td>বিভাগ/শাখা জাদুঘর</td>
							<td>{{$accession->branch_museum}}</td>
						</tr>
					</tbody>
				</table>

				@if($accession->approvals->count())
					<p style="margin-top: 30px;"><strong>সকল অনুমোদনকারীর মতামত:</strong></p>
					@foreach($accession->approvals as $approval)
						<div class="well">
							<p><strong>সংগ্রহভুক্তির আবেদন {{ $approval->status == 3 ? 'অনুমোদন' : 'বাতিল ' }} করা হয়েছে | {{ $approval->status == 3 ? 'অনুমোদন' : 'বাতিল ' }} করেছেন - {{ $approval->role->text }}</strong></p>
							@if($approval->notes)
							<small>মন্তব্য: {{ $approval->notes }}</small>
							@endif
						</div>
					@endforeach
				@endif
    		</div>
    		@if( ! $approved )
	    		<div class="col-md-2">
	    			<form action="{{ route('accession.approve', [$accession]) }}" method="POST" role="form" style="margin-top: 40px;">
	    				{{ csrf_field() }}
	    				<legend style="font-size: 1.3em;">নিদর্শনের অনুমোদন</legend>
	    				<div class="form-group">
	    					<input type="radio" name="status" value="2"> বাতিল করুন <br>
	    					<input type="radio" name="status" value="3"> অনুমোদন করুন
	    				</div>
	    				<div class="form-group">
	    					<label for="notes">মতামত</label>
	    					<textarea name="notes" id="notes" rows="5" class="form-control"></textarea>
	    				</div>
	    				<button type="submit" class="btn btn-primary">সেভ করুন</button>
	    			</form>
	    		</div>
    		@endif
    	</div>
    </div>
  </div>
@stop

@section('script')
@include('layouts.common.dt-export', [
    'heading' => "জাদুঘরের সংগ্রহভুক্তির বিবরণ",
    'columns' => "0, 1, 2, 3",
    'filter'  => 'false'
])

@stop
