<v-image-viewer {{ $attributes }}></v-image-viewer>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-image-viewer-template"
    >
        <div class="select-none">
            <!-- Thumbnail -->
            <div class="relative group">
                <img
                    :src="src"
                    :alt="alt"
                    class="w-32 h-32 object-cover rounded-lg shadow-md transition-transform duration-300 cursor-pointer group-hover:brightness-110"
                />

                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300"
                >
                    <div
                        class="flex bg-gray-500 bg-opacity-50 rounded-full p-2 cursor-pointer"
                        @click="open"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Overlay -->
            <transition
                name="modal-overlay"
                enter-active-class="duration-300 ease-out"
                enter-from-class="opacity-0"
                enter-to-class="opacity-100"
                leave-active-class="duration-200 ease-in"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <div
                    class="fixed inset-0 z-[10002] bg-black bg-opacity-90"
                    v-if="isOpen"
                    @click="close"
                >
                </div>
            </transition>

            <!-- Modal Content -->
            <transition
                name="modal-content"
                enter-active-class="duration-300 ease-out"
                enter-from-class="scale-95 opacity-0"
                enter-to-class="scale-100 opacity-100"
                leave-active-class="duration-200 ease-in"
                leave-from-class="scale-100 opacity-100"
                leave-to-class="scale-95 opacity-0"
            >
                <div
                    v-if="isOpen"
                    class="fixed inset-0 z-[10003] flex items-center justify-center p-4"
                >
                    <div class="relative max-w-6xl w-full mx-auto">
                        <!-- Close -->
                        <button
                            class="flex absolute top-4 right-4 bg-white rounded-full p-2 shadow hover:bg-opacity-100 z-10"
                            @click="close"
                        >
                            <span class="icon-cancel text-2xl"></span>
                        </button>

                        <!-- Image -->
                        <div class="bg-white rounded-lg p-1 shadow-2xl">
                            <div class="relative overflow-hidden h-[80vh] flex justify-center items-center">
                                <img
                                    :src="src"
                                    :alt="alt"
                                    class="max-h-full max-w-full object-contain rounded-lg transition-transform duration-200"
                                    :style="{ transform: `scale(${scale}) rotate(${rotation}deg)` }"
                                    @click.stop
                                />
                            </div>

                            <!-- Controls -->
                            <div class="flex justify-between items-center p-4 bg-black bg-opacity-50 text-white rounded-b-lg">
                                <div class="flex gap-3">
                                    <!-- Zoom In -->
                                    <button
                                        class="p-2 hover:bg-white hover:bg-opacity-20 rounded-full"
                                        @click="zoomIn"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-white"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Zoom Out -->
                                    <button
                                        class="p-2 hover:bg-white hover:bg-opacity-20 rounded-full"
                                        @click="zoomOut"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-white"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM13 10H7"
                                            />
                                        </svg>
                                    </button>

                                    <!-- Rotate -->
                                    <button
                                        class="p-2 hover:bg-white hover:bg-opacity-20 rounded-full"
                                        @click="rotateImage"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-white"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 4v6h6M20 20v-6h-6M4 10a8 8 0 0114.9-2M20 14a8 8 0 01-14.9 2"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Download -->
                                <a
                                    :href="src"
                                    download
                                    class="flex p-2 hover:bg-white hover:bg-opacity-20 rounded-full"
                                >
                                    <span class="icon-download text-2xl"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </script>

    <script type="module">
        app.component('v-image-viewer', {
            template: '#v-image-viewer-template',

            props: {
                src: {
                    type: String,
                    required: true
                },

                alt: {
                    type: String,
                    default: 'Image'
                }
            },

            data() {
                return {
                    isOpen: false,

                    scale: 1,

                    rotation: 0,
                };
            },

            methods: {
                open() {
                    this.isOpen = true;

                    document.body.style.overflow = 'hidden';

                    window.addEventListener('keydown', this.handleKeydown);
                },

                close() {
                    this.reset();

                    this.isOpen = false;

                    document.body.style.overflow = 'auto';

                    window.removeEventListener('keydown', this.handleKeydown);
                },

                handleKeydown(e) {
                    if (e.key === 'Escape') {
                        this.close();
                    } else if (e.key === '+' || e.key === '='){
                        this.zoomIn()
                    } else if (e.key === '-') {
                        this.zoomOut();
                    } else if (e.key === 'r') {
                        this.rotateImage()
                    };
                },

                zoomIn() {
                    if (this.scale < 3) {
                        this.scale += 0.25
                    };
                },

                zoomOut() {
                    if (this.scale > 0.5) {
                        this.scale -= 0.25
                    };
                },

                rotateImage() {
                    this.rotation = (this.rotation + 90) % 360;
                },

                reset() {
                    this.scale = 1;
                    this.rotation = 0;
                }
            },

            beforeUnmount() {
                window.removeEventListener('keydown', this.handleKeydown);
            }
        });
    </script>
@endPushOnce
