<x-layout page="TO-DO Laravel - Registre-se">
    <x-slot name="btn">
        <a href="{{route('login')}}" class="btn btn-primary">Login</a>
    </x-slot>

    <section id="task_section">
        <h1>Cadastro</h1>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
             @endforeach
        @endif
        @if($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('user.register_action')}}">
            @csrf
            <x-form.text_input name="name" label="Nome:" placeholder="Digite seu nome" />
            <x-form.text_input type="email" name="email" label="E-mail:" placeholder="Digite seu email" />
            <x-form.text_input type="password" name="password" label="Senha:" placeholder="Digite sua senha" />            
            <x-form.text_input type="password" name="password_confirmation" label="Confirmar Senha:" placeholder="Confirme sua senha" />            
           <x-form.form_button resetTxt="Limpar" submitTxt="Cadastrar"></x-form.form_button>
        </form>
    </section>
    
</x-layout>