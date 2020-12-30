<h3 class="font-bold text-xl mb-4">Following</h3>

<ul>
    @foreach (current_user()->follows as $user)
        <li class="mb-4">
            <div>
                <a
                    href="{{ $user->profile }}"
                    class="flex items-center text-sm"
                >
                    <img
                        src="{{ $user->avatar }}"
                        class="rounded-full mr-2"
                        alt=""
                        width="40"
                        height="40"
                    >

                    {{ $user->name }}
                </a>
            </div>
        </li>
    @endforeach
</ul>
