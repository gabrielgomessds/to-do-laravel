<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-do Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar"><img src="/assets/images/logo.png"></div>

        <div class="content">
            <nav>
                <a href="#" class="btn btn-primary">Criar Tarefa</a>
            </nav>

            <main>
                <section class="graph">
                    <div class="graph_header">
                        <h2>Progresso do Dia</h2>
                        <div class="graph_header-line"></div>
                        <div class="graph_header-date">
                            <img src="/assets/images/icon-prev.png" alt="">
                                13 de Dez       
                            <img src="/assets/images/icon-next.png" alt="">
                        </div>
                        
                    </div>
                    <div class="graph_header-subtitle">Tarefas: <b>3/6</b></div>
                    <div class="graph-placeholder"></div>
                    <div class="tasks_left_footer">
                        <img src="/assets/images/icon-info.png" alt=""> Restam 3 traferas para serem realizadas
                    </div>
                    
                </section>

                <section class="list">
                    <div class="list_header">
                        <select class="list_header-select">
                            <option value="1">Todas as tarefas</option>
                        </select>
                    </div>
                    <div class="task-list">
                        <div class="task">
                            <div class="title">
                                <input type="checkbox"/>
                                <div class="task_title">Titulo da tarefa</div>
                            </div>
                            <div class="priority">
                                <div class="sphere"></div>
                                <h5>Titulo da tarefa</h5>
                            </div>
                            <div class="priority">
                                <div class="action">
                                    <a href="#">
                                        <img src="/assets/images/icon-edit.png" alt="">
                                    </a> 

                                    <a href="#">
                                        <img src="/assets/images/icon-delete.png" alt="">
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                       
                        
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>