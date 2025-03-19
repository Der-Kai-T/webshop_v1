<script {{ $attributes }}>
    var compacted = document.querySelectorAll('.sf-dump-compact');

    for (var i = 0; i < compacted.length; i++) {
        compacted[i].className = 'sf-dump-expanded';
    }
</script>
