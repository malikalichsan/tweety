<div class="flex p-4 border-b border-b-gray">
    <div class="mr-2 flex-shrink-0 ">
        <a href="{{ $tweet->user->profile }}">
            <img
                src="{{ $tweet->user->avatar }}"
                class="rounded-full mr-2"
                alt=""
                width="50"
                height="50"
            >
        </a>
    </div>

    <div>
        <h5 class="font-bold mb-4">
            <a href="{{ $tweet->user->profile }}">
                {{ $tweet->user->name }}
            </a>
        </h5>
        <p class="text-sm">
            {{ $tweet->body }}
        </p>
    </div>
</div>
