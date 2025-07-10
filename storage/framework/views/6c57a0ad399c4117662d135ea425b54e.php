<marketplace-seller-info-here>
    <?php
        use Webkul\Marketplace\Repositories\ProductRepository;
        use Webkul\Marketplace\Repositories\ReviewRepository;

        $productRepository = app(ProductRepository::class);

        $sellerProduct = $productRepository->with('seller')->findOneWhere([
            'product_id' => $product->id,
            'is_owner'   => 1,
        ]);

        if ($sellerProduct) {
            $avgRatings = app(ReviewRepository::class)->getAverageRating($sellerProduct->seller);
        }

        if ($product->type != 'configurable') {
            $count = $productRepository->getSellerCount($product);
        } else {
            $variants = [];
        
            foreach ($product->variants as $variant) {
                $variants[$variant->id] = $productRepository->getSellerCount($variant);
            }
        }
    ?>

    <v-product-sellers>
        <div class="mt-8 flex flex-col gap-y-1">
            <?php if($sellerProduct): ?>
                <div class="shimmer h-7 w-10"></div>

                <div class="shimmer h-7 w-40"></div>

                <?php if (isset($component)) { $__componentOriginal78b8fa9e9841490f1fdbb9b614e408ae = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal78b8fa9e9841490f1fdbb9b614e408ae = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'marketplace::components.shop.shimmer.ratings','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('marketplace::shop.shimmer.ratings'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal78b8fa9e9841490f1fdbb9b614e408ae)): ?>
<?php $attributes = $__attributesOriginal78b8fa9e9841490f1fdbb9b614e408ae; ?>
<?php unset($__attributesOriginal78b8fa9e9841490f1fdbb9b614e408ae); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal78b8fa9e9841490f1fdbb9b614e408ae)): ?>
<?php $component = $__componentOriginal78b8fa9e9841490f1fdbb9b614e408ae; ?>
<?php unset($__componentOriginal78b8fa9e9841490f1fdbb9b614e408ae); ?>
<?php endif; ?>

                <div class="shimmer h-6 w-[170px]"></div>
            <?php endif; ?>

            <div class="shimmer h-7 w-40"></div>
        </div>
    </v-product-sellers>

    <?php if (! $__env->hasRenderedOnce('cab7061f-9292-43cf-994f-992ab8e2cc68')): $__env->markAsRenderedOnce('cab7061f-9292-43cf-994f-992ab8e2cc68');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-product-sellers-template"
        >
            <div class="mt-8 flex flex-col gap-y-1">
                <template v-if="sellerProduct">
                    <div class="text-lg font-medium text-[#757575]">
                        <?php echo app('translator')->get('marketplace::app.shop.products.sold-by'); ?>
                    </div>
        
                    <a
                        class="text-lg font-semibold text-navyBlue"
                        :href="'<?php echo e(route('shop.marketplace.sellers.show', ':url')); ?>'.replace(':url', sellerProduct.seller.url)"
                    >
                        {{ sellerProduct.seller.shop_title }}
                    </a>
        
                    <?php if (isset($component)) { $__componentOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'marketplace::components.shop.products.star-rating','data' => ['name' => 'Seller Rating',':value' => 'avgRatings']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('marketplace::shop.products.star-rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['name' => 'Seller Rating',':value' => 'avgRatings']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053)): ?>
<?php $attributes = $__attributesOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053; ?>
<?php unset($__attributesOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053)): ?>
<?php $component = $__componentOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053; ?>
<?php unset($__componentOriginal4d3ec1ac79a4fc54e3a3ebcb56ed0053); ?>
<?php endif; ?>
        
                    <!-- Product flag Blade File (If seller in owner) -->
                    <?php echo $__env->make('marketplace::shop.products.report', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </template>
    
                <a
                    v-if="
                        product.type != 'configurable'
                        && count > 0
                    "
                    class="text-lg font-normal text-navyBlue"
                    :href="'<?php echo e(route('shop.marketplace.products.offers.index', ':url_key')); ?>'.replace(':url_key', product.url_key)"
                >
                    {{ "<?php echo app('translator')->get('marketplace::app.shop.products.seller-count'); ?>".replace(':count', count) }}
                </a>
            </div>

            <a
                class="text-lg font-normal text-navyBlue"
                :href="actionUrl"
                v-if="visible"
            >
                {{ "<?php echo app('translator')->get('marketplace::app.shop.products.seller-count'); ?>".replace(':count', count) }}
            </a>
        </script>
        
        <script type="module">
            app.component('v-product-sellers', {
                template: '#v-product-sellers-template',

                data() {
                    return {
                        visible: false,

                        variants: <?php echo json_encode($variants ?? [], 15, 512) ?>,

                        actionUrl: '',

                        count: <?php echo json_encode($count ?? 0, 15, 512) ?>,

                        product: <?php echo json_encode($product, 15, 512) ?>,

                        sellerProduct: <?php echo json_encode($sellerProduct, 15, 512) ?>,

                        avgRatings: <?php echo json_encode($avgRatings ?? 0, 15, 512) ?>,
                    }
                },

                created() {
                    this.listenEvents();
                },

                methods: {
                    listenEvents(key) {
                        this.$emitter.on('configurable-variant-selected-event', (variantId) => {
                            if (this.variants[variantId]) {
                                let url = "<?php echo e(route('shop.marketplace.products.offers.index', ':url_key')); ?>";

                                const variant = this.product.variants.find(variant => {
                                    return variant.id == variantId;
                                });
                                
                                this.actionUrl = url.replace(':url_key', variant.url_key);

                                this.count = this.variants[variantId];
                                
                                this.visible = true;
                            } else {
                                this.visible = false;
                            }
                        });
                    }
                }
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
</marketplace-seller-info-here>
<?php /**PATH /var/www/html/packages/Webkul/Marketplace/src/Providers/../Resources/views/shop/products/product-sellers.blade.php ENDPATH**/ ?>