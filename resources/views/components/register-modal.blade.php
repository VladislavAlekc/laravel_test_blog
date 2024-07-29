<div class="card">
     
    <div class="card-body ">
        <h3 class="m-0">
            {{__('Регистрация')}}
        </h3>
    </div>
    <div class="card-body ">
        <form action="{{route('register.store')}}" method="POST">
            @csrf           
            <div class="mb-3">
                <label class="required mb-2">{{__('Имя')}}</label>
                <x-input type="text" name="name" autofocus/>  
                <x-errors name='name'/> 
                
            </div>
            <div class="mb-3">
                <label class="required mb-2">{{__('Email')}}</label>
                <x-input type="email" name="email"/>  
                <x-errors name='email'/> 
            </div>
            <div class="mb-3">
                <label class="required mb-2">{{__('Пароль')}}</label>
                <x-input type="password" name="password"/>  
                <x-errors name='password'/> 
               
            </div>
            <div class="mb-3">
                <label class="required mb-2">{{__('Пароль еще раз')}}</label>
                <x-input type="password" name="password_confirmation"/>                
               
            </div>
            <div class="form-check mb-3">
                
                <input class="form-check-input" name="agreement" type="checkbox" value="1" id="agreement" checked>
                <label class="form-check-label" for="agreement">
                  {{__('Я согласен на обработку пользовательских данных')}}
                </label>
              </div>
           
            <button type="submit" class="btn btn-primary">{{__('Войти')}}</button>
        </form>

    </div>
</div>