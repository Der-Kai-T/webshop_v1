@if(isset($value))
    @if($value)
        <span class="fas fa-check-circle text-success"></span>
    @else
        <span class="fas fa-times-circle text-danger"></span>
    @endif
@else
    <span class="fas fa-question-circle"></span>
@endif
