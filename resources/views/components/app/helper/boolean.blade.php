<div>
    @php
        if(!isset($value))
            $value = null;
    @endphp

    @if($value === true)
        <span class="fas fa-check-circle" title="true"></span>
    @elseif($value === false)
        <span class="fas fa-times-circle" title="false"></span>
    @else
        <span class="fas fa-question-circle" title="unknown"></span>
    @endif
</div>
