@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === config('app.name'))
<img src="{{ asset('imgs/bulkit_logo.png') }}" class="logo" alt="{{ config('app.name') }}" style="height: 150px!important; width: auto!important;">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
