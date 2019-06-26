@if(Auth::check())
    <h1>login Success</h1>
    @if(@isset($user))
        {{"HELLO ". $user->name}}<br>
        {{"email: ". $user->email}}
    <br>
    <a href="{{url('logout')}}">LOGOUT</a>
    @endif
@else
    <h1>YOU NOT LOGIN</h1>
@endif