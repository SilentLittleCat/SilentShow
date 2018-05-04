@if($errors->has('sg_error_info'))
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert"
                aria-hidden="true">
            &times;
        </button>
        {{ $errors->first('sg_error_info') }}
    </div>
@endif