{{-----------------------------------------------------------------------------
 * HTML5 Video
 * A quick snippet for handling HTML 5 video tag. This has actually become a lot
 * simpler with recent browser improvements. Event still, it makes including video
 * more straighforward.
 *
 * @param string $attr
 * @param boolean $autoplay
 * @param boolean $controls
 * @param int $height
 * @param int $width
 * @param boolean $loop
 * @param boolean $muted
 * @param string $poster
 * @param string $preload auto/metadata/none
 * @param string|array $src
 * @param string $fallback
 * @url 
 * @author  A. Harvey @since 0.1
 * @version  0.1
 * @since  0.1
 * @return string
 -----------------------------------------------------------------------------}}


@if( isset($src) )
<video 
@if( isset($attr) )
	@foreach(explode('|',$attr) as $a)
	{{ ' ' . $a }}
	@endforeach
@endif
{{ is_string($src) ? ' src="' . $src . '"' : '' }}
{{ isset($width) ? ' width="' . $width . '"' : '' }}
{{ isset($height) ? ' height="' . $height . '"' : '' }}
{{ isset($autoplay) ? ' autoplay' : '' }}
{{ isset($controls) ? ' controls' : '' }}
{{ isset($loop) ? ' loop' : '' }}
{{ isset($muted) ? ' muted' : '' }}
{{ isset($poster) ? ' poster="'. $poster .'"' : '' }}
{{ isset($preload) ? ' preload="' . $preload . '"' : '' }}
>
@if( is_array($src) )
	@foreach($src as $mime => $s)
		@if( is_string($mime) )
			<source src="{{ $s }}" type="{{ $mime }}">
		@else
			<source src="{{ $s }}" type="{{ Config::get('mimes.' . pathinfo($s, PATHINFO_EXTENSION).'.0') }}">
		@endif
	@endforeach
@endif
{{ $fallback or '' }}
</video>
@else
{{ $fallback or '' }}
@endif
