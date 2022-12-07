<x-layout page="TO-DO Laravel - Login">
    <x-slot name="btn">
        <a href="{{route('home')}}" class="btn btn-primary">Voltar</a>
    </x-slot>

    <section id="task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf
            <input type="hidden" name="id" value="{{$task->id}}"/>
            <x-form.checkbox name="is_done" checked="{{$task->is_done}}" label="Tarefa feita: "/>
            <x-form.text_input name="title" value="{{$task->title}}" label="Titulo da tarefa" placeholder="Digite o titulo da tarefa" />
            <x-form.text_input type="datetime-local" value="{{$task->due_date}}" name="due_date" label="Data da tarefa" placeholder="Escolha a data da tarefa" />
            <x-form.select_input name="category_id" label="Escolha a categoria:" >
                @foreach($categories as $category):
                        <option value="{{$category->id}}"
                        {{ $category->id == $task->category_id ? 'selected' : '' }}>
                            {{$category->title}}
                        </option>
                @endforeach;
            </x-form.select_input>
                
            <x-form.textarea_input name="description" value="{{$task->description}}" label="Descrição da Tarefa:" placeholder="Adione as caracteristicas da tarefa"/>

           <x-form.form_button resetTxt="Limpar" submitTxt="Editar Tarefa"></x-form.form_button>
            
        </form>
    </section>
    
</x-layout>