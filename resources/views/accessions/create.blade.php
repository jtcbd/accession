@inject('services', 'App\Services\ClassificationsService')

@extends('layouts.app')

@section('style')
<style>
  @media (min-width: 768px) {
    .form-horizontal .control-label {
        text-align: right;
        margin-bottom: 0;
        padding-top: 9px;
        font-size: .8em;
    }
  }
</style>
@endsection

@section('style')
<style>
  .control-label {
    font-size: .8em;
  }
</style>
@endsection

@section('content')
<div class="panel panel-default">
    <div class="panel-heading" style="font-size: 1.2em;">
        জাদুঘরের নিদর্শনের ফর্ম/তালিকা
    </div>
    <div class="panel-body">
      <form class="form-horizontal" action="{{ route('accessions.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="control-label col-sm-2" for="accession_no_from">Accession Nunber<br>(সংগ্রহভুক্তি নম্বর)</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="accession_no_from" placeholder="From" name="accession_no_from">
          </div>
          <div class="col-md-2">
            <label for="" style="padding-left: 25px;padding-top: 10px;">থেকে/TO</label>
          </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="accession_no_to" placeholder="To" name="accession_no_to">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="total_number_of_object">Total Number Of Object <br>( মোট নিদর্শন সংখ্যা )</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="total_number_of_object" placeholder="Total Number Of Object" name="total_number_of_object">
          </div>
          <label class="control-label col-sm-2" for="date_of_accession">Date Of Accession <br>( সংগ্রহের তারিখ )</label>
          <div class="col-sm-4">
            <input type='text' class="form-control datetimepicker" name="collection_date" />
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="file_no">File No. <br> ( নথি নং ) </label>
          <div class="col-sm-4">
            <input type="text" class="form-control " id="file_no" placeholder="Input File Number" name="file_no">
          </div>

          <label class="control-label col-sm-2" for="mode_of_collection">Made Of Collection <br> ( সংগ্রহের ধরন )</label>
          <div class=" col-sm-4">
            <select class="form-control" name="made_of_collection" id="made_of_collection">
              <option value="purchase">Purchase (ক্রয়)</option>
              <option value="presentation">Presentation (উপহার)</option>
              <option value="collection">Collection (সংগ্রহ)</option>
              <option value="loan">Loan (ঋণ)</option>
              <option value="exchnge">Exchange (বিনিময়)</option>
              <option value="">Excavation (খনন)</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="input_price">Price <br> ( ক্রয় মূল্য )</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="input_price" id="input_price" placeholder="Input Price">
          </div>
          <label class="control-label col-sm-2" for="insurance_value">Insurance Value <br> ( ইন্সুরেন্স মূল্য )</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="insurance_value" placeholder="Input Insurance Value " name="insurance_value">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="description_of_object">Description Of Object <br> ( নিদর্শনের সংক্ষিপ্ত বিবরণ )</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="description_of_object" id="description_of_object" cols="30" rows="5" placeholder="Write Object Description Here"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="classification_of_object">Classification Of Object<br> ( নিদর্শনের শ্রেণী বিভাগ  )</label>
          <div class="col-sm-4">
            <select name="classification_of_object" id="" class="form-control">
              @foreach($services->all() as $classification)
                <option value="{{ $classification->id }}">{{ $classification->title_bn }}</option>
              @endforeach
            </select>
          </div>
          <label class="control-label col-sm-2" for="measurement">Measurement <br> পরিমাপ</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="measurement" name="measurement" placeholder="input Measurement">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="provenance_and_acquisition_history">Provenance And Acquisition History <br> ( প্রাপ্তিস্থান ও আবিষ্কারের বিবরণ   )</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="provenance_and_acquisition_history" id="provenance_and_acquisition_history" cols="30" rows="5" placeholder="Provenance And Acquisition History"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="period">Period <br> ( সময়কাল   )</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="period" name="period" placeholder="Input Period">
          </div>
          <label class="control-label col-sm-2" for="Personal_info">Personal Information <br> ( ব্যাক্তিগত তথ্য  )</label>
          <div class=" col-sm-4">
            <input class="form-control" type="text" id="Personal_info" name="Personal_info" placeholder="Write Personal Information">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="propsed_price">Proposed Price <br> ( প্রস্তাবিত মূল্য  )</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="propsed_price" name="propsed_price" placeholder="Input Proposed Price">
          </div>
          <label class="control-label col-sm-2" for="branch_museum"> Department/Branch <br>   বিভাগ/শাখা জাদুঘর  </label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="branch_museum" name="branch_museum" placeholder="input Name Of Department/Branch Museum">
          </div>
        </div>
        <hr>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-10">
            <button type="submit" class="btn btn-primary">নিদর্শন সেভ করুন</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@stop

 @section('script')
  <script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
          format: 'YYYY-MM-DD'
        });
    });
  </script>
@endsection
