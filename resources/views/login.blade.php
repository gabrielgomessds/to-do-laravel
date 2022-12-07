<x-layout page="TO-DO Laravel - Login">
<x-slot name="btn">
        <a href="{{route('register')}}" class="btn btn-primary">Registre-se</a>
    </x-slot>
    <section id="task_section">
        <h1>Login</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
             @endforeach
        @endif
        <form method="POST" action="{{route('user.login_action')}}">
            @csrf
            <x-form.text_input type="email" name="email" label="E-mail:" placeholder="Digite seu email" />
            <x-form.text_input type="password" name="password" label="Senha:" placeholder="Digite sua senha" />            
           <x-form.form_button resetTxt="Limpar" submitTxt="Login"></x-form.form_button>
        </form>
    </section>
    
</x-layout>