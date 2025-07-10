<?php
    use Webkul\Marketplace\Repositories\FlagReasonRepository;

    $flagReasons = app(FlagReasonRepository::class)->productType()->get();
?>

<!-- Product Report Vue Component -->
<?php if(core()->getConfigData('marketplace.settings.product.flag_enabled')): ?>
    <v-product-report :seller-product="sellerProduct"></v-product-report>
<?php endif; ?>

<?php if (! $__env->hasRenderedOnce('df8bd9c4-a6e1-47d7-af91-01c36b96ed78')): $__env->markAsRenderedOnce('df8bd9c4-a6e1-47d7-af91-01c36b96ed78');
$__env->startPush('scripts'); ?>
    <script
        type="text/x-template"
        id="v-product-report-template"
    >
        <div class="mt-0 flex flex-wrap gap-3 sm:mt-3 md:gap-10">
            <span
                class="flex cursor-pointer items-center gap-2.5"
                @click="openReportModal"
            >
                <span class="mp-issue-icon text-2xl"></span>

                <span class="text-lg font-medium text-navyBlue">
                    <?php echo app('translator')->get('marketplace::app.shop.products.flag.report-product'); ?>
                </span>
            </span>
        </div>

        <!-- Report Seller Form -->
        <?php if (isset($component)) { $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.index','data' => ['vSlot' => '{ meta, errors, handleSubmit }','as' => 'div']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['v-slot' => '{ meta, errors, handleSubmit }','as' => 'div']); ?>
            <form
                @submit="handleSubmit($event, reportProduct)"
                ref="reportForm"
            >
                <!-- Report Seller Modal -->
                <?php if (isset($component)) { $__componentOriginal571c487d27ea546e3c8ba67e4aec0403 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal571c487d27ea546e3c8ba67e4aec0403 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.modal.index','data' => ['ref' => 'reportModal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['ref' => 'reportModal']); ?>
                     <?php $__env->slot('header', null, []); ?> 
                        <!-- Modal Header -->
                        <p class="text-2xl font-medium leading-9 text-[#151515]">
                            <?php echo app('translator')->get('marketplace::app.shop.products.flag.report-product'); ?>
                        </p>
                     <?php $__env->endSlot(); ?>
        
                    <!-- Modal Content -->
                     <?php $__env->slot('content', null, ['class' => '!pb-2']); ?> 
                        <!-- Reason -->
                        <?php if (isset($component)) { $__componentOriginal578beb4bb944f523450535628cf00b41 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal578beb4bb944f523450535628cf00b41 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.index','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
                            <?php if (isset($component)) { $__componentOriginal2f2718777649517fc23f75e819ccd670 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2f2718777649517fc23f75e819ccd670 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.label','data' => ['class' => 'required flex']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'required flex']); ?>
                                <?php echo app('translator')->get('marketplace::app.shop.products.flag.reason'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $attributes = $__attributesOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__attributesOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f2718777649517fc23f75e819ccd670)): ?>
<?php $component = $__componentOriginal2f2718777649517fc23f75e819ccd670; ?>
<?php unset($__componentOriginal2f2718777649517fc23f75e819ccd670); ?>
<?php endif; ?>

                            <?php if (isset($component)) { $__componentOriginal03b54b937596232babb8a12a8847d013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal03b54b937596232babb8a12a8847d013 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'select','name' => 'reason','class' => '! shadow-none','rules' => 'required|max:200','vModel' => 'reason','placeholder' => trans('marketplace::app.shop.products.flag.reason')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'select','name' => 'reason','class' => '! shadow-none','rules' => 'required|max:200','v-model' => 'reason','placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('marketplace::app.shop.products.flag.reason'))]); ?>
                                <option value="">
                                    <?php echo app('translator')->get('marketplace::app.shop.products.flag.select-reason'); ?>
                                </option>

                                <?php $__currentLoopData = $flagReasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($reason->name); ?>">
                                        <?php echo e($reason->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <option value="other">
                                    <?php echo app('translator')->get('marketplace::app.shop.products.flag.other-reason'); ?>
                                </option>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $attributes = $__attributesOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__attributesOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $component = $__componentOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__componentOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>

                            <template v-if="reason == 'other'">
                                <?php if (isset($component)) { $__componentOriginal03b54b937596232babb8a12a8847d013 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal03b54b937596232babb8a12a8847d013 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.form.control-group.control','data' => ['type' => 'textarea','name' => 'other_reason','class' => '! shadow-none','rules' => 'required|max:200','label' => trans('marketplace::app.shop.products.flag.reason'),'placeholder' => trans('marketplace::app.shop.products.flag.reason-placeholder')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::form.control-group.control'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'textarea','name' => 'other_reason','class' => '! shadow-none','rules' => 'required|max:200','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('marketplace::app.shop.products.flag.reason')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('marketplace::app.shop.products.flag.reason-placeholder'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $attributes = $__attributesOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__attributesOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03b54b937596232babb8a12a8847d013)): ?>
<?php $component = $__componentOriginal03b54b937596232babb8a12a8847d013; ?>
<?php unset($__componentOriginal03b54b937596232babb8a12a8847d013); ?>
<?php endif; ?>
                            </template>

                            <v-error-message
                                :name="reason == 'other' ? 'other_reason' : 'reason'"
                                v-slot="{ message }"
                            >
                                <p class="text-xs italic text-red-500">
                                    {{ message }}
                                </p>
                            </v-error-message>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $attributes = $__attributesOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__attributesOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal578beb4bb944f523450535628cf00b41)): ?>
<?php $component = $__componentOriginal578beb4bb944f523450535628cf00b41; ?>
<?php unset($__componentOriginal578beb4bb944f523450535628cf00b41); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('footer', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal30786825665921390a816ebee82cf580 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal30786825665921390a816ebee82cf580 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.button.index','data' => ['type' => 'submit','class' => 'primary-button place-self-end',':disabled' => 'isSubmitting',':loading' => 'isSubmitting','title' => trans('marketplace::app.shop.products.flag.submit-btn')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'primary-button place-self-end',':disabled' => 'isSubmitting',':loading' => 'isSubmitting','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(trans('marketplace::app.shop.products.flag.submit-btn'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal30786825665921390a816ebee82cf580)): ?>
<?php $attributes = $__attributesOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__attributesOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal30786825665921390a816ebee82cf580)): ?>
<?php $component = $__componentOriginal30786825665921390a816ebee82cf580; ?>
<?php unset($__componentOriginal30786825665921390a816ebee82cf580); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal571c487d27ea546e3c8ba67e4aec0403)): ?>
<?php $attributes = $__attributesOriginal571c487d27ea546e3c8ba67e4aec0403; ?>
<?php unset($__attributesOriginal571c487d27ea546e3c8ba67e4aec0403); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal571c487d27ea546e3c8ba67e4aec0403)): ?>
<?php $component = $__componentOriginal571c487d27ea546e3c8ba67e4aec0403; ?>
<?php unset($__componentOriginal571c487d27ea546e3c8ba67e4aec0403); ?>
<?php endif; ?>
            </form>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $attributes = $__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__attributesOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc)): ?>
<?php $component = $__componentOriginal4d3fcee3e355fb6c8889181b04f357cc; ?>
<?php unset($__componentOriginal4d3fcee3e355fb6c8889181b04f357cc); ?>
<?php endif; ?>
    </script>

    <script type="module">
        app.component('v-product-report', {
            template: '#v-product-report-template',

            props: {
                sellerProduct: {
                    type: Object,
                    required: true
                }
            },

            data() {
                return {
                    reason: '',

                    customer: <?php echo json_encode(auth()->guard('customer')->user(), 15, 512) ?>,

                    isSubmitting: false,
                }
            },
            
            methods: {
                reportProduct(params, { resetForm, setErrors }) {
                    this.isSubmitting = true;

                    this.$axios.post("<?php echo e(route('shop.marketplace.products.flag.store')); ?>", {
                        ...params,
                        marketplace_product_id: this.sellerProduct.id,
                    })
                        .then((response) => {
                            this.$refs.reportForm.reset();
                            
                            this.$refs.reportModal.close();

                            this.$emitter.emit('add-flash', {
                                type: response.data.type,
                                message: response.data.message
                            });
                        })
                        .catch(error => {
                            if (error.response.status == 422) {
                                setErrors(error.response.data.errors);
                            }
                        })
                        .finally(() => {
                            this.isSubmitting = false;
                        });
                },

                openReportModal() {
                    if (! this.customer) {
                        this.$emitter.emit('open-confirm-modal', {
                            title: "<?php echo app('translator')->get('marketplace::app.shop.products.flag.alert'); ?>",
                            message: "<?php echo app('translator')->get('marketplace::app.shop.products.flag.guest-alert'); ?>",
                            agree: () => {
                                window.location.href = "<?php echo e(route('shop.customer.session.index')); ?>";
                            }
                        });

                        return;
                    }

                    this.$refs.reportModal.open();
                },
            }
        });
    </script>
<?php $__env->stopPush(); endif; ?><?php /**PATH /var/www/html/packages/Webkul/Marketplace/src/Providers/../Resources/views/shop/products/report.blade.php ENDPATH**/ ?>