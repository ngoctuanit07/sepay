@extends($templatePathAdmin.'layout')

@section('main')

<div class="row">

  <div class="col-md-12">

    <div class="box box-primary">
      <div class="box-header with-border">
        <h2 class="box-title">{{ $title_description??'' }}</h2>
      </div>

      <div class="box-body table-responsive no-padding box-primary">
       <table class="table table-hover table-bordered">
         <thead>
           <tr>
            <th>{{ sc_language_render('Plugins/Payment/Sepay::lang.config_field') }}</th>
            <th>{{ sc_language_render('Plugins/Payment/Sepay::lang.config_value') }}</th>
           </tr>
         </thead>
         <tbody>

      <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_apikey') }}</th>
            <td><a href="#" class="updateData_can_empty editable editable-click" data-name="sepay_apikey" data-type="text" data-pk="sepay_apikey" data-url="{{ route('admin_config_global.update') }}" data-value="{{ sc_config('sepay_apikey') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_apikey') }}"></a></td>
      </tr>
      <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.webhook_url') }}</th>
            <td><a href="#" class="updateData_can_empty editable editable-click" data-name="webhook_url" data-type="text" data-pk="webhook_url" data-url="{{ route('admin_config_global.update') }}" data-value="{{ sc_config('webhook_url') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.webhook_url') }}"></a></td>
      </tr>
      <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.ten_nganhang') }}</th>
            <td><a href="#" class="updateData_can_empty editable editable-click" data-name="ten_nganhang" data-type="text" data-pk="ten_nganhang" data-url="{{ route('admin_config_global.update') }}" data-value="{{ sc_config('ten_nganhang') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.ten_nganhang') }}"></a></td>
      </tr>
      <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.so_taikhoan') }}</th>
            <td><a href="#" class="updateData_can_empty editable editable-click" data-name="so_taikhoan" data-type="text" data-pk="so_taikhoan" data-url="{{ route('admin_config_global.update') }}" data-value="{{ sc_config('so_taikhoan') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.so_taikhoan') }}"></a></td>
      </tr>
      <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.chu_taikhoan') }}</th>
            <td><a href="#" class="updateData_can_empty editable editable-click" data-name="chu_taikhoan" data-type="text" data-pk="chu_taikhoan" data-url="{{ route('admin_config_global.update') }}" data-value="{{ sc_config('chu_taikhoan') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.chu_taikhoan') }}"></a></td>
      </tr>
      <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.tiento_mahoa') }}</th>
            <td><a href="#" class="updateData_can_empty editable editable-click" data-name="tiento_mahoa" data-type="text" data-pk="tiento_mahoa" data-url="{{ route('admin_config_global.update') }}" data-value="{{ sc_config('tiento_mahoa') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.tiento_mahoa') }}"></a></td>
      </tr>

          

          <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_order_status_success') }}</th>
            <td><a href="#" class="fied-required editable editable-click" data-name="sepay_order_status_success" data-type="select" data-pk="sepay_order_status_success" data-source="{{ $jsonStatusOrder }}" data-value="{{ sc_config('sepay_order_status_success') }}" data-url="{{ route('admin_config_global.update') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_order_status_success') }}"></a></td>
          </tr>
          <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_order_status_faild') }}</th>
            <td><a href="#" class="fied-required editable editable-click" data-name="sepay_order_status_faild" data-type="select" data-pk="sepay_order_status_faild" data-source="{{ $jsonStatusOrder }}" data-value="{{ sc_config('sepay_order_status_faild') }}" data-url="{{ route('admin_config_global.update') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_order_status_faild') }}"></a></td>
          </tr>
          <tr>
            <th width="40%">{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_payment_status') }}</th>
            <td><a href="#" class="fied-required editable editable-click" data-name="sepay_payment_status" data-type="select" data-pk="sepay_payment_status" data-source="{{ $jsonPaymentStatus }}" data-value="{{ sc_config('sepay_payment_status') }}" data-url="{{ route('admin_config_global.update') }}" data-title="{{ sc_language_render('Plugins/Payment/Sepay::lang.sepay_payment_status') }}"></a></td>
          </tr>              
    </td>
  </tr>


    </tbody>
       </table>
      </div>
    </div>
  </div>

</div>


@endsection


@push('styles')
<!-- Ediable -->
<link rel="stylesheet" href="{{ asset('admin/plugin/bootstrap-editable.css')}}">
<style type="text/css">
  #maintain_content img{
    max-width: 100%;
  }
</style>
@endpush

@push('scripts')
<!-- Ediable -->
<script src="{{ asset('admin/plugin/bootstrap-editable.min.js')}}"></script>

<script type="text/javascript">
  // Editable
$(document).ready(function() {

      $.fn.editable.defaults.params = function (params) {
        params._token = "{{ csrf_token() }}";
        return params;
      };
        $('.fied-required').editable({
        validate: function(value) {
            if (value == '') {
                return '{{  sc_language_render('admin.not_empty') }}';
            }
        },
        success: function(data) {
          if(data.error == 0){
            alertJs('success', '{{ sc_language_render('admin.msg_change_success') }}');
          } else {
            alertJs('error', data.msg);
          }
      }
    });

    $('.updateData_can_empty').editable({
        success: function(data) {
          console.log(data);
          if(data.error == 0){
            alertJs('success', '{{ sc_language_render('admin.msg_change_success') }}');
          } else {
            alertJs('error', data.msg);
          }
      }
    });

});
</script>
@endpush