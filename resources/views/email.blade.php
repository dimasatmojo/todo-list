<p>
    @foreach ($task_list as $item)
        Section : {{$item['section']}}, <br>
        Task : {{$item['task']}}, <br>
        Status : {{$item['status']}}, <br>
        Created at : {{$item['created_at']}}, <br><br>
    @endforeach
</p>