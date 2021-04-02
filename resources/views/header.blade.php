<div class="header">
    <div class="title">
        <p>Music System</p>
    </div>
    <div class="username">
        <?php $user = Auth::user(); ?>
        <i class="far fa-user-circle"></i><span>{{$user->name}}</span>
    </div>
    <div class="logout">
        <form action="{{route('logout.exe')}}" method="POST">
        @csrf
        <button class="logout_button">ログアウト</button>
        </form>
    </div>
</div>