@component ('components.app')
    <header class="mb-8 relative">
        <div class="relative">
            <img
                src="/images/default-profile-banner.jpg"
                alt=""
                class="mb-4"
            >

            <img
                src="{{ $user->avatar }}"
                class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                style="left: 50%"
                width="150"
                alt=""
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="font-bold text-2xl">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                <a href=""
                   class="rounded-full border border-grey-300 py-3 px-4 text-black text-xs mr-2"
                >
                    Edit Profile
                </a>

                @component ('components.follow-button', [
                    'user' => $user
                ])
                @endcomponent
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis iure natus pariatur porro possimus, veniam
            vitae. Ab aliquam autem cum, distinctio eaque eligendi illum laboriosam molestiae mollitia non, possimus
            reprehenderit!
        </p>
    </header>

    @include ('_timeline')
@endcomponent
