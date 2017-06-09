<form action="" method="post">
    {{csrf_field()}}
    <div>
        كلمة السر
        <input type="password" name="password" required></div>
    <div>
        أعد كلمة السر
        <input type="password" name="returnPassword" required>
    </div>
    <div>
        <input type="submit" value="تأكيد">
    </div>
</form>