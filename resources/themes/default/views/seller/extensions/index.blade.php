<x-marketplace::seller.layouts>
    <x-slot:title>
        @lang('marketplace::app.seller.extensions.index.title')
    </x-slot>
    
    <!-- Breadcrumbs -->
    @section('breadcrumbs')
        <x-marketplace::seller.breadcrumbs name="seller_extensions" />
    @endSection

    <div class="flex flex-col gap-2.5">
        <div class="flex items-center justify-between gap-4 max-sm:flex-wrap max-sm:w-full">
            <p class="text-2xl font-medium">
                @lang('marketplace::app.seller.extensions.index.title')
            </p>
            
            {!! view_render_event('bagisto.seller.extensions.filters.before') !!}
            
            <!-- Filter -->
            <x-marketplace::seller.form.control-group class="!mb-0 max-sm:w-full w-[225px]">
                <x-marketplace::seller.form.control-group.control
                    type="select"
                    name="tag"
                    class="!mb-0"
                    @change="$emitter.emit('filter-extension', $event.target.value)"
                >
                    <option value="">
                        @lang('marketplace::app.seller.extensions.index.filters.all-extensions')
                    </option>
                    
                    @foreach ($tags as $tag)
                        <option value="{{ $tag }}">
                            @lang("marketplace::app.seller.extensions.index.filters.$tag")
                        </option>
                    @endforeach
                </x-marketplace::seller.form.control-group.control>
            </x-marketplace::seller.form.control-group>
            
            {!! view_render_event('bagisto.seller.extensions.filters.after') !!}
        </div>

        <p class="text-xs font-medium opacity-80">
            @lang('marketplace::app.seller.extensions.index.info')
        </p>
    </div>

    {!! view_render_event('bagisto.seller.extensions.list.before') !!}
    
    <v-extension>
        <div class="h-full mt-8 grid gap-4">
            @forelse ($extensions as $extension)
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <x-marketplace::seller.shimmer.extensions.card />
                </div>
            @empty
                <div class="m-auto text-sm">
                    @lang('marketplace::app.seller.extensions.index.no-result')
                </div>
            @endforelse
        </div>
    </v-extension>

    {!! view_render_event('bagisto.seller.extensions.list.after') !!}

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-extension-template"
        >
            <div class="h-full mt-8 grid gap-4">
                <div
                    v-if="extensions.length"
                    class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3"
                >
                    <a
                        v-for="(extension, index) in extensions"
                        :key="index"
                        :href="extension.redirect_url"
                        class="h-52 p-4 flex flex-col gap-4 rounded-xl border cursor-pointer hover:shadow-lg transition-all duration-200 ease-in-out"
                    >
                        <div class="flex gap-4">
                            <img
                                :src="extension.image_url"
                                alt="Extension Image"
                                class="h-16 w-16 rounded-lg object-cover"
                            />
            
                            <div class="flex flex-col justify-between">
                                <p class="text-lg font-medium">
                                    @{{ extension.title }}
                                </p>
            
                                <div class="flex items-center gap-3 mt-1">
                                    <span
                                        class="text-xs font-medium px-2 py-1.5 rounded"
                                        :class="{
                                            'bg-blue-200': extension.tag === 'marketplace',
                                            'bg-green-200': extension.tag === 'payment',
                                            'bg-pink-200': extension.tag === 'shipping',
                                            'bg-yellow-200': !['marketplace', 'payment', 'shipping'].includes(extension.tag)
                                        }"
                                    >
                                        @{{ extension.tag }}
                                    </span>
            
                                    <span
                                        class="text-xs font-medium"
                                        :class="extension.enabled ? 'text-green-600' : 'text-red-500'"
                                    >
                                        @{{ extension.enabled 
                                            ? "@lang('marketplace::app.seller.extensions.index.enabled')" 
                                            : "@lang('marketplace::app.seller.extensions.index.disabled')" }}
                                    </span>
                                </div>
                            </div>
                        </div>
            
                        <p class="text-sm text-gray-600">
                            @{{ extension.description }}
                        </p>
                    </a>
                </div>
            
                <div
                    v-else
                    class="m-auto text-sm"
                >
                    @lang('marketplace::app.seller.extensions.index.no-result')
                </div>
            </div>
        </script>

        <script type="module">
            app.component('v-extension', {
                template: '#v-extension-template',

                data() {
                    return {
                        allExtensions: @json($extensions),

                        extensions: [],
                    }
                },

                mounted() {
                    this.extensions = this.allExtensions;

                    this.$emitter.on('filter-extension', (tag) => {
                        if (tag) {
                            this.extensions = this.allExtensions.filter(extension => {
                                return extension.tag === tag;
                            });
                        } else {
                            this.extensions = this.allExtensions;
                        }
                    });
                },
            });
        </script>
    @endPushOnce
</x-marketplace::seller.layouts>
