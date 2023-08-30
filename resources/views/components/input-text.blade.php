<input type="text" {{ $attributes->merge(['class' => 'form-control']) }} oninput="countChars('{{ $id }}_char_counter', '{{ $id }}', {{ $max }})" id="$id"/>
<p style="font-size:0.8em; margin-bottom:0;" class="text-muted text-end" id="{{ $id }}_char_counter">/{{ $max }}</p>
<script>
    setTimeout(function() {
        countChars('{{ $id }}_char_counter', '{{ $id }}', {{ $max }})
    }, 200);        
</script>