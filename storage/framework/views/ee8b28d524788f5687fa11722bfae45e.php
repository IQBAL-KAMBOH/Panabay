<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'name'     => 'rating',
    'value'    => 0,
    'disabled' => true,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'name'     => 'rating',
    'value'    => 0,
    'disabled' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<v-star-rating
    <?php echo e($attributes); ?>

    name="<?php echo e($name); ?>"
    value="<?php echo e($value); ?>"
    disabled="<?php echo e($disabled); ?>"
>
    <?php if (isset($component)) { $__componentOriginal3fe56328b4c45dd53c78fd9e8430cdbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fe56328b4c45dd53c78fd9e8430cdbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'marketplace::components.seller.shimmer.ratings','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('marketplace::seller.shimmer.ratings'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fe56328b4c45dd53c78fd9e8430cdbe)): ?>
<?php $attributes = $__attributesOriginal3fe56328b4c45dd53c78fd9e8430cdbe; ?>
<?php unset($__attributesOriginal3fe56328b4c45dd53c78fd9e8430cdbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fe56328b4c45dd53c78fd9e8430cdbe)): ?>
<?php $component = $__componentOriginal3fe56328b4c45dd53c78fd9e8430cdbe; ?>
<?php unset($__componentOriginal3fe56328b4c45dd53c78fd9e8430cdbe); ?>
<?php endif; ?>
</v-star-rating>

<?php if (! $__env->hasRenderedOnce('75a46a70-d547-43f3-bf23-d36a302e6e1b')): $__env->markAsRenderedOnce('75a46a70-d547-43f3-bf23-d36a302e6e1b');
$__env->startPush("scripts"); ?>
    <script
        type="text/x-template"
        id="v-star-rating-template"
    >
        <div class="flex">
            <span
                class="icon-star-fill cursor-pointer text-2xl"
                role="presentation"
                v-for="rating in availableRatings"
                v-if="! disabled"
                :style="[`color: ${appliedRatings >= rating ? '#ffb600' : '#7d7d7d'}`]"
                @click="change(rating)"
            >
            </span>

            <span
                class="icon-star-fill text-2xl"
                role="presentation"
                v-for="rating in availableRatings"
                :style="[`color: ${appliedRatings >= rating ? '#ffb600' : '#7d7d7d'}`]"
                v-else
            >
            </span>

            <v-field
                type="hidden"
                :name="name"
                v-model="appliedRatings"
            ></v-field>
        </div>
    </script>

    <script type="module">
        app.component("v-star-rating", {
            template: "#v-star-rating-template",

            props: [
                "name",
                "value",
                "disabled",
            ],

            data() {
                return {
                    availableRatings: [1, 2, 3, 4, 5],

                    appliedRatings: this.value,
                };
            },

            methods: {
                change(rating) {
                    this.appliedRatings = rating;

                    this.$emit('change', this.appliedRatings);
                },
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH /var/www/html/packages/Webkul/Marketplace/src/Providers/../Resources/views/components/shop/products/star-rating.blade.php ENDPATH**/ ?>