<div class="border-end" id="sidebar-wrapper">
    <div class="sidebar-heading p-3 fs-5">Menu</div>
    <div class="list-group list-group-flush">
        <a href="{{route('index')}}" class="list-group-item list-group-item-action">Home</a>
        <form method="post" action="{{route('logout')}}">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action">Logout</button>
        </form>
    </div>
</div>
