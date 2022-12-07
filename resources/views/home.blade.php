<x-layout page="TO-DO Laravel - Home">
    <x-slot name="btn">
        <a href="{{route('task.create')}}" class="btn btn-primary">Criar Tarefa</a>
        <a href="{{route('user.logout')}}" class="btn btn-error">Sair</a>
    </x-slot>

    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do Dia</h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <a href="{{route('home', ['date' => $data['date_prev_button']])}}">
                    <img src="/assets/images/icon-prev.png" alt="">
                </a>

                {{$data['date_as_string']}}

                <a href="{{route('home', ['date' => $data['date_next_button']])}}">
                    <img src="/assets/images/icon-next.png" alt="">
                </a>

            </div>

        </div>
        <div class="graph_header-subtitle">Tarefas: <b><b class="showTaskDone"></b>/{{$countTasks}}</b></div>

        <div class="grafico">
            <canvas id="myChart"></canvas>
        </div>
        <input type="hidden" value="{{$countTasksDone}}" id="done" class="taskPorcent">
        <input type="hidden" value="{{$countTasksNotDone}}" id="no_done" class="taskPorcent">
        <input type="hidden" value="{{$countTasks}}" class="totalTasks">

        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png" alt=""> Restam <b class="showTaskNoDono" style="margin: 0px 5px;"></b> traferas para serem realizadas
        </div>

    </section>

    <section class="list">
        <div class="list_header">
            <select class="list_header-select" onchange="changeStatusFilter(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_done">Tarefas finalizadas</option>
                <option value="task_pending">Tarefas não finalizadas</option>
            </select>
        </div>
        <div class="task-list">
            @if(isset($_GET['date']))
            @foreach($data['tasks'] as $task)
            <x-task :data=$task />
            @endforeach
            @else
            @foreach($tasks as $task)
            <x-task :data=$task />
            @endforeach
            @endif



        </div>
        <div class="conteiner-pagination">
            {{ $tasks->links('vendor.pagination.custom') }}
        </div>
    </section>

    <script>
        function changeStatusFilter(e) {
            if (e.value == 'task_pending') {
                showAllTask();
                document.querySelectorAll('.task_done').forEach(function(element) {
                    element.style.display = 'none';
                });
            } else if (e.value == 'task_done') {
                showAllTask();
                document.querySelectorAll('.task_pending').forEach(function(element) {
                    element.style.display = 'none';
                });
            } else {
                showAllTask();
            }
        }

        function showAllTask() {
            document.querySelectorAll('.task').forEach(function(element) {
                element.style.display = '';
            });
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

        document.querySelector(".showTaskNoDono").innerText = document.querySelector("#no_done").value;
        document.querySelector(".showTaskDone").innerText = document.querySelector("#done").value;

        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = "{{route('task.update')}}";

            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({
                    status,
                    taskId,
                    _token: '{{ csrf_token() }}'
                })
            });

            result = await rawResult.json();


            if (!result.success) {
                element.checked = !status;

            }

            document.querySelector("#done").value = result.countTasksDone;
            document.querySelector("#no_done").value = result.countTasksNotDone;
            document.querySelector(".showTaskNoDono").innerText = document.querySelector("#no_done").value;
            document.querySelector(".showTaskDone").innerText = document.querySelector("#done").value;

            let feitasTasks = (result.countTasksDone / result.totalTasks) * 100;
            let restamTasks = 100 - feitasTasks

            let chartStatus = Chart.getChart("myChart");
            // <canvas> id
            if (chartStatus != undefined) {
                chartStatus.destroy();
            }
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Tarefas Feitas', 'Tarefas Não Feitas'],
                    datasets: [{

                        data: [feitasTasks, restamTasks],

                        backgroundColor: [
                            'hsl(214, 84%, 56%)',
                            'hsl(192, 91%, 96%)',
                        ],

                    }]
                },



            });


        }

        const ctx = document.getElementById('myChart')
        if (ctx !== null) {
            ctx.getContext('2d');
        }

        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Tarefas Feitas', 'Tarefas Não Feitas'],
                datasets: [{

                    data: [document.querySelector("#done").value,
                        document.querySelector("#no_done").value
                    ],

                    backgroundColor: [
                        'hsl(214, 84%, 56%)',
                        'hsl(192, 91%, 96%)',
                    ],

                }]
            },

        });
    </script>
</x-layout>