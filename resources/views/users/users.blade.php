
<aside class="col-sm-4 mb-5">
    <div class="card bg-info">
        <div class="card-header row">
            <h3 class="card-title text-light ml-3">{{ $user->name }}</h3>
        </div>
        <div class="card-body">
            <img class="rounded-circle img-fluid" src="{{ Gravatar::src($user->email, 400)}}" alt="">
            <div class="mt-3">
                @if (\Auth::id() === $user->id)
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-block">ユーザ情報の編集</a>
                @endif
            </div>
        </div>
    </div>
    @include('follow.follow_button',['user'=>$user])
</aside>