

<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Имя" value="{{$user->name ??""}}" required>
<label for="">Email</label>
<input type="email" class="form-control" name="email" placeholder="email" value="{{$user->email ?? ""}}" required>
<label for="">Пароль</label>
<input type="password" class="form-control" name="password" >
<label for="">Подтверждение пароля</label>
<input type="password" class="form-control" name="password_confirmation" >

<hr />

<input type="submit" class="btn-primary" value="Сохранить">