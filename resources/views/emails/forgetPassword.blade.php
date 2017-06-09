<h1>مرحبا {{$user->first_name}}</h1>
<p>
    اضط على الرابط في الأسفل لتفعيل حسابك
    <a href="{{env('APP_URL')}}/reset/{{$user->email}}/{{$code}}">اضغط هنا ! </a>

</p>