<x-layout page="TO-DO Laravel - Login">
    <x-slot name="btn">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </x-slot>

    <section id="task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf
            <x-form.text_input name="title" label="Titulo da tarefa" placeholder="Digite o titulo da tarefa" />
            <x-form.text_input type="datetime-local" name="due_date" label="Data da tarefa" placeholder="Escolha a data da tarefa" />
            <x-form.select_input name="category_id" label="Escolha a categoria:" >
                <option value="">TESTE TESTE</option>
                @foreach($categories as $category):
                        <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach;
            </x-form.select_input>
                
            <x-form.textarea_input name="description" label="Descrição da Tarefa:" placeholder="Adione as caracteristicas da tarefa"/>

           <x-form.form_button resetTxt="Limpar" submitTxt="Criar Tarefa"></x-form.form_button>
            
        </form>
    </section>
    
</x-layout>