<div class="list-group">
    <a href="{{route('home')}}" class="list-group-item list-group-item-action {{ (request()->is('home')) ? 'active' : '' }}" aria-current="true">
        Home
    </a>
    <a href="{{route('shops')}}" class="list-group-item list-group-item-action {{ (request()->is('shops')) ? 'active' : '' }}" aria-current="true">
        Shop
    </a>
    <a href="{{route('lack-of-knowledge')}}" class="list-group-item list-group-item-action {{ (request()->is('lack-of-knowledge')) ? 'active' : '' }}" aria-current="true">
        Lack of Knowledge
    </a>
</div>
