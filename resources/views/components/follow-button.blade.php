<form action="/profiles/{{ $user->name }}/follow" method="POST">
    @csrf

    <button
        type="submit"
        class="bg-blue-700 rounded-full shadow py-3 px-4 text-white text-xs"
    >
        {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
    </button>
</form>
