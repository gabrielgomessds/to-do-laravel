            <div class="task {{$data['is_done'] ? 'task_done' : 'task_pending' }}">
                            <div class="title">
                                <input type="checkbox" id="task_title{{$data['id']}}"  onchange="taskUpdate(this)" data-id="{{$data['id']}}"
                                @if($data && $data['is_done'])
                                    checked
                                @endif/>
                                <label class="task_title" for="task_title{{$data['id']}}">
                                    {{$data['title'] ?? null}}
                                </label>
                            </div>
                            <div class="priority">
                                <div class="sphere"></div>
                                <h5 >{{$data['category'] ?? null}}</h5>
                            </div>
                            <div class="priority">
                                <div class="action">
                                    <a href="{{route('task.edit', ['id' => $data['id']])}}">
                                        <img src="/assets/images/icon-edit.png" alt="">
                                    </a> 

                                    <a href="{{route('task.delete', ['id' => $data['id']])}}">
                                        <img src="/assets/images/icon-delete.png" alt="">
                                    </a>
                                </div>
                                
                            </div>
                        </div>