@extends ('layouts.app')

@section ('content')
    <header class="mb-8 relative">
        <img
            src="/images/default-profile-banner.jpg"
            alt=""
            class="mb-4"
        >

        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div>
                <a href=""
                   class="rounded-full border border-grey-300 py-3 px-4 text-black text-xs mr-2"
                >
                    Edit Profile
                </a>

                <a href=""
                   class="bg-blue-700 rounded-full shadow py-3 px-4 text-white text-xs"
                >
                    Follow Me
                </a>
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis iure natus pariatur porro possimus, veniam vitae. Ab aliquam autem cum, distinctio eaque eligendi illum laboriosam molestiae mollitia non, possimus reprehenderit!
        </p>

        <img
            src="{{ $user->avatar }}"
            class="rounded-full mr-2 absolute"
            style="width: 150px; left: calc(50% - 75px); top: 138px;"
            alt=""
        >
    </header>

    @include ('_timeline')
@endsection
