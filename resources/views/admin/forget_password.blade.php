<div>
    <form action="/forget_password" method="post">
        @if(session('success'))
            <div class="alert alert-success">
                {{  session('success')}}
            </div>
        @endif
        {{csrf_field()}}
        <input type="email" class="form-control" name="email">
        <input type="submit" value="send Code">
    </form>
</div>