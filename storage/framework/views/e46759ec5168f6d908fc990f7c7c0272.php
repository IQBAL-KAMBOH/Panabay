<?php
    use Webkul\Marketplace\Repositories\ProductRepository;

    $sellerProduct = app(ProductRepository::class)->with('seller')->findOneWhere([
        'product_id' => $product->id,
        'is_owner'   => 1,
    ]);
?>

<?php if($sellerProduct): ?>
    <?php if (isset($component)) { $__componentOriginalc7b94830d947988d2b7058066254da2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7b94830d947988d2b7058066254da2b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.carousel','data' => ['title' => trans('marketplace::app.shop.products.top-selling'),'src' => route('shop.marketplace.products.seller.top_selling', $sellerProduct->seller->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('marketplace::app.shop.products.top-selling')),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.marketplace.products.seller.top_selling', $sellerProduct->seller->id))]); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $attributes = $__attributesOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__attributesOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $component = $__componentOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__componentOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/html/packages/Webkul/Marketplace/src/Providers/../Resources/views/shop/products/top-selling.blade.php ENDPATH**/ ?>