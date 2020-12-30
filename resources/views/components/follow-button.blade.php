@unless (current_user()->is($user))
    <form action="{{ route('follow', $user) }}" method="POST">
        @csrf

        <button
            type="submit"
            class="bg-blue-700 rounded-full shadow py-3 px-4 text-white text-xs"
        >
            {{ current_user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
        </button>
    </form>
@endunless
