{!! view_render_event('marketplace.admin.seller.edit.card.users.before', ['seller' => $seller]) !!}

@if ($seller->children->isNotEmpty())
    <div class="box-shadow rounded bg-white p-4 dark:bg-gray-900">
        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">
            @lang('marketplace::app.admin.sellers.edit.users.title')
        </p>

        <div class="row grid grid-cols-[2fr_1fr] grid-rows-1 items-center border-b py-2.5 dark:border-gray-800">
            @foreach ([['name', 'email'], ['id', 'phone']] as $group)
                <div class="flex select-none items-center gap-2.5">
                    <p class="text-gray-600 dark:text-gray-300">
                        <span class="[&>*]:after:content-['_/_']">
                            @foreach ($group as $column)
                                <span class="after:content-['/'] last:after:content-[''] cursor-pointer hover:text-gray-800 dark:hover:text-white">
                                    @lang("marketplace::app.admin.sellers.edit.users.$column")
                                </span>
                            @endforeach
                        </span>
                    </p>
                </div>
            @endforeach
        </div>

        @foreach ($seller->children as $child)
            <div class="row grid grid-cols-[2fr_1fr] grid-rows-1 border-b py-2.5 transition-all hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-950">
                <!-- Name, email -->
                <div class="flex gap-2.5">
                    <div class="flex flex-col gap-1.5">
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $child->name }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $child->email }}
                        </p>
                    </div>
                </div>

                <!-- ID, Phone -->
                <div class="flex gap-1.5">
                    <div class="flex flex-col gap-1.5">
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $child->id }}
                        </p>

                        <p class="text-gray-600 dark:text-gray-300">
                            {{ $child->phone }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

{!! view_render_event('marketplace.admin.seller.edit.card.users.after', ['seller' => $seller]) !!}
