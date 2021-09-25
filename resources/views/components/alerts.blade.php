@if($errors->any())
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-diamond" style="font-size: 1.5rem;"></i>&nbsp;&nbsp;
        <div>
            {{$errors->first()}}
        </div>
    </div>
@endif
