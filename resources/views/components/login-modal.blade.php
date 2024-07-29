<div class="card">
     
    <div class="card-body ">
        <h3 class="m-0">
            {{__('Вход')}}
        </h3>
    </div>
    <div class="card-body ">
        <form action="{{route('login.store')}}" method="POST">
            @csrf 
            <div class="mb-3">
                <label class="required mb-2">{{__('Email')}}</label>
                <input type="email" name="email" class="form-control"  value="{{old('email')}}" autofocus>
            </div>
            <div class="mb-3">
                <label class="required mb-2">{{__('Пароль')}}</label>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
               
            </div>
            
            <div class="form-check mb-3">
                
                <input class="form-check-input" name="remember" type="checkbox" value="1"  id="remember" checked>
                <label class="form-check-label" for="remember">
                  {{__('Запомнить меня')}}
                </label>
              </div>
           
            <button type="submit" class="btn btn-primary">{{__('Войти')}}</button>
        </form>

    </div>
</div>