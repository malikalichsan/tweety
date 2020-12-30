<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea
            name="body"
            class="w-full"
            placeholder="What's up doc?"
            required
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between items-center">
            <img
                src="{{ current_user()->avatar }}"
                class="rounded-full mr-2"
                alt="your avatar"
                width="50"
                height="50"
            >

            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-8 text-sm text-white h-10"
            >
                Tweet-a-roo!
            </button>
        </footer>
    </form>

    @error ('body')
        <p
            class="text-red-500 text-sm mt-2"
        >
            {{ $message }}
        </p>
    @enderror
</div>
