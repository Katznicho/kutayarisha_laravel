<div id="content-wrap">
    @if ($message = Session::get('success'))
    <div {{$attributes}} >
        <p>{{ $message }}</p>
        <img src="{{asset('images/remove.png')}}"
 class="image__remove"

alt="cross image"
 height="20px"
 width="20px"

>

    </div>
@endif
<!--any wrong info-->
</div>
