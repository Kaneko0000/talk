@foreach ($users as $user)
    <div class="text-left d-inline-block w-100 mb-2 card-header">
        <img class="mr-2 rounded-circle" src="{{ Gravatar::src($user->email, 55) }}" alt="ユーザのアバター画像">
        <p class="mt-3 mb-0 d-inline-block"><a href="{{ route('user.show', $user) }}">{{ $user->name }}</a></p>
    </div>
@endforeach