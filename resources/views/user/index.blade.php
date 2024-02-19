@auth()
    A1
@else
    A2
@endauth
B0
@guest
    C1
@else
    C2
@endif
{{__('Tasks')}} for {{auth()->user()->name}} ({{auth()->id()}})
@forelse($tasks as $task)
    D1
@empty
    D2
@endforelse
<form method="POST" action="{{ route('tasks.store') }}">
    @csrf
    @method('PUT')
</form>
