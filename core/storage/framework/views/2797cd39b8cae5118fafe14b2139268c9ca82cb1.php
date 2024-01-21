<?php
    $lang_code = $currentLang->code;
?>

<aside class="main-sidebar elevation-4 main-sidebar elevation-4 sidebar-light-primary">
    <!-- Sidebar -->
    <div class="sidebar pt-0 mt-0">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <a href="<?php echo e(route('front.index')); ?>" class="name text-dark" target="_blank">
                <img src="<?php echo e(asset('assets/front/img/'.$commonsetting->header_logo)); ?>" alt="">
            </a>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"
                       class="nav-link <?php if(request()->path() == 'admin/dashboard'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <?php echo e(__('Dashboard')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview
              <?php if(request()->path() == 'admin/basicinfo'): ?> menu-open
              <?php elseif(request()->path() == 'admin/seoinfo'): ?> menu-open
              <?php elseif(request()->path() == 'admin/custom-css'): ?> menu-open
              <?php elseif(request()->path() == 'admin/slinks'): ?> menu-open
              <?php elseif(request()->path() == 'admin/email-config'): ?> menu-open
              <?php elseif(request()->path() == 'admin/scripts'): ?> menu-open
              <?php elseif(request()->path() == 'admin/cookie-alert'): ?> menu-open
              <?php elseif(request()->path() == 'admin/page-visibility'): ?> menu-open
              <?php elseif(request()->is('admin/slinks/edit/*')): ?> menu-open
              <?php endif; ?>">
                    <a href="#" class="nav-link
                <?php if(request()->path() == 'admin/basicinfo'): ?> active
                <?php elseif(request()->path() == 'admin/seoinfo'): ?> active
                <?php elseif(request()->path() == 'admin/custom-css'): ?> active
                <?php elseif(request()->path() == 'admin/slinks'): ?> active
                <?php elseif(request()->path() == 'admin/scripts'): ?> active
                <?php elseif(request()->path() == 'admin/cookie-alert'): ?> active
                <?php elseif(request()->path() == 'admin/email-config'): ?> active
                <?php elseif(request()->path() == 'admin/page-visibility'): ?> active
                <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                <?php endif; ?>">
                        <i class="nav-icon fas fas fa-cog"></i>
                        <p>
                            <?php echo e(__('General Setting')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.basicinfo'). '?language=' . $lang_code); ?>"
                               class="nav-link <?php if(request()->path() == 'admin/basicinfo'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Basic Information')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.mail.config')); ?>" class="nav-link
              <?php if(request()->path() == 'admin/email-config'): ?> active
              <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Email Configuration')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.slinks')); ?>" class="nav-link
                  <?php if(request()->path() == 'admin/slinks'): ?> active
                  <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                    <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Social Links')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.seoinfo'). '?language=' . $lang_code); ?>"
                               class="nav-link <?php if(request()->path() == 'admin/seoinfo'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('SEO Information')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.scripts')); ?>"
                               class="nav-link <?php if(request()->path() == 'admin/scripts'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Scripts')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.pagevisibility')); ?>"
                               class="nav-link  <?php if(request()->path() == 'admin/page-visibility'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Pages Visibility')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.cookie.alert'). '?language=' . $lang_code); ?>"
                               class="nav-link  <?php if(request()->path() == 'admin/cookie-alert'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Cookie Alert')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.custom.css')); ?>"
                               class="nav-link  <?php if(request()->path() == 'admin/custom-css'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Custom CSS')); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                <?php if(request()->routeIs('admin.register.user')): ?> menu-open
                <?php elseif(request()->routeIs('register.user.view')): ?> menu-open
                <?php elseif(request()->routeIs('register.user.package_buy')): ?> menu-open
                <?php elseif(request()->routeIs('register.user.package_not_buy')): ?> menu-open
                <?php endif; ?>
                ">
                    <a href="#" class="nav-link
                    <?php if(request()->routeIs('admin.register.user')): ?> active
                    <?php elseif(request()->routeIs('register.user.view')): ?> active
                    <?php elseif(request()->routeIs('register.user.package_buy')): ?> active
                    <?php elseif(request()->routeIs('register.user.package_not_buy')): ?> active
                    <?php endif; ?>
                    ">
                      <i class="nav-icon fas fa-users"></i>
                      <p>
                        <?php echo e(__('Customers')); ?>

                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo e(route('admin.register.user')); ?>" class="nav-link
                        <?php if(request()->routeIs('admin.register.user')): ?> active
                        <?php endif; ?>
                        ">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo e(__('All Customers')); ?></p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo e(route('register.user.package_buy')); ?>" class="nav-link
                        <?php if(request()->routeIs('register.user.package_buy')): ?> active <?php endif; ?>
                        ">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo e(__("Package Buy")); ?></p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo e(route('register.user.package_not_buy')); ?>" class="nav-link
                        <?php if(request()->routeIs('register.user.package_not_buy')): ?> active <?php endif; ?>
                        ">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo e(__("Package Not Buy")); ?></p>
                        </a>
                      </li>
                    </ul>
                  </li>
                <li class="nav-item has-treeview
              <?php if(request()->path() == 'admin/package/all-order'): ?> menu-open
              <?php elseif(request()->path() == 'admin/package/pending-order'): ?> menu-open
              <?php elseif(request()->path() == 'admin/package/inprogress-order'): ?> menu-open
              <?php elseif(request()->path() == 'admin/package/compleated-order'): ?> menu-open
              <?php elseif(request()->path() == 'admin/package'): ?> menu-open
              <?php elseif(request()->path() == 'admin/package/add'): ?> menu-open
              <?php elseif(request()->is('admin/package/edit/*')): ?> menu-open
              <?php endif; ?>">
                    <a href="#" class="nav-link
                <?php if(request()->path() == 'admin/package/all-order'): ?> active
                <?php elseif(request()->path() == 'admin/package/pending-order'): ?> active
                <?php elseif(request()->path() == 'admin/package/inprogress-order'): ?> active
                <?php elseif(request()->path() == 'admin/package/compleated-order'): ?> active
                <?php elseif(request()->path() == 'admin/package'): ?> active
                <?php elseif(request()->path() == 'admin/package/add'): ?> active
                <?php elseif(request()->is('admin/package/edit/*')): ?> active
                <?php endif; ?>">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            <?php echo e(__('Package')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.package'). '?language=' . $lang_code); ?>" class="nav-link
                <?php if(request()->path() == 'admin/package'): ?> active
                <?php elseif(request()->path() == 'admin/package/add'): ?> active
                <?php elseif(request()->is('admin/package/edit/*')): ?> active
                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    <?php echo e(__('Packages')); ?>

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.package.allorder')); ?>"
                               class="nav-link <?php if(request()->path() == 'admin/package/all-order'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('All Order')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.package.pendingorder')); ?>"
                               class="nav-link <?php if(request()->path() == 'admin/package/pending-order'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Pending Order')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.package.inprogress')); ?>" class="nav-link
              <?php if(request()->path() == 'admin/package/inprogress-order'): ?> active
              <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('In Progress Order')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.package.compleated')); ?>" class="nav-link
                  <?php if(request()->path() == 'admin/package/compleated-order'): ?> active
                  <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Completed Order')); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
        <?php if(request()->path() == 'admin/product'): ?> menu-open
        <?php elseif(request()->path() == 'admin/product/add'): ?> menu-open
        <?php elseif(request()->path() == 'admin/product/all/orders'): ?> menu-open
        <?php elseif(request()->path() == 'admin/product/pending/orders'): ?> menu-open
        <?php elseif(request()->path() == 'admin/product/processing/orders'): ?> menu-open
        <?php elseif(request()->path() == 'admin/product/completed/orders'): ?> menu-open
        <?php elseif(request()->path() == 'admin/product/rejected/orders'): ?> menu-open
        <?php elseif(request()->is('admin/product/edit/*')): ?> menu-open
        <?php elseif(request()->is('admin/product/orders/detais/*')): ?> menu-open

        <?php endif; ?>">
                    <a href="#" class="nav-link
          <?php if(request()->path() == 'admin/product'): ?> active
          <?php elseif(request()->path() == 'admin/product/add'): ?> active
          <?php elseif(request()->path() == 'admin/product/all/orders'): ?> active
          <?php elseif(request()->path() == 'admin/product/pending/orders'): ?> active
          <?php elseif(request()->path() == 'admin/product/processing/orders'): ?> active
          <?php elseif(request()->path() == 'admin/product/completed/orders'): ?> active
          <?php elseif(request()->path() == 'admin/product/rejected/orders'): ?> active
          <?php elseif(request()->is('admin/product/edit/*')): ?> active
          <?php elseif(request()->is('admin/product/orders/detais/*')): ?> active
          <?php endif; ?>">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            <?php echo e(__('Product')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.product'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/product'): ?> active
            <?php elseif(request()->path() == 'admin/product/add'): ?> active
            <?php elseif(request()->is('admin/product/edit/*')): ?> active
            <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    <?php echo e(__('Products')); ?>

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.all.product.orders')); ?>"
                               class="nav-link <?php if(request()->path() == 'admin/product/all/orders'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('All Order')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.pending.product.orders')); ?>"
                               class="nav-link <?php if(request()->path() == 'admin/product/pending/orders'): ?> active <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Pending Order')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.processing.product.orders')); ?>" class="nav-link
            <?php if(request()->path() == 'admin/product/processing/orders'): ?> active
            <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('In Progress Order')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.completed.product.orders')); ?>" class="nav-link
                <?php if(request()->path() == 'admin/product/completed/orders'): ?> active
                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Completed Order')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.rejected.product.orders')); ?>" class="nav-link
                <?php if(request()->path() == 'admin/product/rejected/orders'): ?> active
                <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Rejected Order')); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                <?php if(request()->path() == 'admin/bill-pay'): ?> menu-open
                <?php elseif(request()->path() == 'admin/add'): ?> menu-open
                <?php elseif(request()->path() == 'admin/bill-add'): ?> menu-open
                <?php endif; ?>
                ">
                    <a href="#" class="nav-link 
                    <?php if(request()->path() == 'admin/bill-pay'): ?> active 
                    <?php elseif(request()->path() == 'admin/add'): ?> active
                    <?php elseif(request()->path() == 'admin/bill-add'): ?> active
                    <?php endif; ?>">
                      <i class="nav-icon fas fa-money-bill"></i>
                      <p>
                        <?php echo e(__('Bill Pay')); ?>

                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo e(route('admin.billpay')); ?>" class="nav-link <?php if(request()->path() == 'admin/bill-pay'): ?> active <?php endif; ?>">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo e(__('Bill Pay')); ?></p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo e(route('admin.bill_add')); ?>" class="nav-link
                        <?php if(request()->path() == 'admin/add'): ?> active 
                        <?php elseif(request()->path() == 'admin/bill-add'): ?> active
                        <?php endif; ?>
                            ">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo e(__('Add New Bill')); ?></p>
                        </a>
                      </li>
                    </ul>
                  </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.slider'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/slider'): ?> active
            <?php elseif(request()->path() == 'admin/slider/add'): ?> active
            <?php elseif(request()->is('admin/slider/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            <?php echo e(__('Slider')); ?>

                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.about'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/about'): ?> active
            <?php elseif(request()->path() == 'admin/about/add'): ?> active
            <?php elseif(request()->is('admin/about/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            <?php echo e(__('About')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.offer'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/offer'): ?> active
            <?php elseif(request()->path() == 'admin/offer/add'): ?> active
            <?php elseif(request()->is('admin/offer/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-gift"></i>
                        <p>
                            <?php echo e(__('Offer')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.funfact'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/funfact'): ?> active
            <?php elseif(request()->path() == 'admin/funfact/add'): ?> active
            <?php elseif(request()->is('admin/funfact/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-smile-beam"></i>
                        <p>
                            <?php echo e(__('Funfact')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.service'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/service'): ?> active
            <?php elseif(request()->path() == 'admin/service/add'): ?> active
            <?php elseif(request()->is('admin/service/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            <?php echo e(__('Service')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.testimonial'). '?language=' . $lang_code); ?>" class="nav-link
                    <?php if(request()->path() == 'admin/testimonial'): ?> active 
                    <?php elseif(request()->path() == 'admin/testimonial/add'): ?> active 
                    <?php elseif(request()->is('admin/testimonial/edit/*')): ?> active 
                    <?php endif; ?>">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            <?php echo e(__('Testimonial')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview
                    <?php if(request()->path() == 'admin/entertainment'): ?> menu-open
                    <?php elseif(request()->is('admin/entertainment/edit/*')): ?> menu-open
                    <?php elseif(request()->path() == 'admin/media'): ?> menu-open
                    <?php elseif(request()->is('admin/media/edit/*')): ?> menu-open
                    <?php endif; ?>">
                            <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/entertainment'): ?> active
                        <?php elseif(request()->is('admin/entertainment/edit/*')): ?> active
                        <?php elseif(request()->path() == 'admin/media'): ?> active
                        <?php elseif(request()->is('admin/media/edit/*')): ?> active
                        <?php endif; ?>">
                        <i class="nav-icon fas fas fa-photo-video"></i>
                        <p>
                            <?php echo e(__('Media')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.entertainment'). '?language=' . $lang_code); ?>" class="nav-link
                    <?php if(request()->path() == 'admin/entertainment'): ?> active
                    <?php elseif(request()->path() == 'admin/entertainment/add'): ?> active
                    <?php elseif(request()->is('admin/entertainment/edit/*')): ?> active
                    <?php endif; ?>
                                    ">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Entertainment')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.media'). '?language=' . $lang_code); ?>" class="nav-link
                    <?php if(request()->path() == 'admin/media'): ?> active
                    <?php elseif(request()->path() == 'admin/media/add'): ?> active
                    <?php elseif(request()->is('admin/media/edit/*')): ?> active
                    <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Media Zone')); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.branch'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/branch'): ?> active
            <?php elseif(request()->path() == 'admin/branch/add'): ?> active
            <?php elseif(request()->is('admin/branch/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>
                            <?php echo e(__('Branch')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.team'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/team'): ?> active
            <?php elseif(request()->path() == 'admin/team/add'): ?> active
            <?php elseif(request()->is('admin/team/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <?php echo e(__('Team')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.faq'). '?language=' . $lang_code); ?>" class="nav-link
            <?php if(request()->path() == 'admin/faq'): ?> active
            <?php elseif(request()->path() == 'admin/faq/add'): ?> active
            <?php elseif(request()->is('admin/faq/edit/*')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            <?php echo e(__('Faq')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview
              <?php if(request()->path() == 'admin/blog'): ?> menu-open
              <?php elseif(request()->path() == 'admin/blog/blog-category'): ?> menu-open
              <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> menu-open
              <?php elseif(request()->path() == 'admin/blog/add'): ?> menu-open
              <?php elseif(request()->path() == 'admin/archives'): ?> menu-open
              <?php elseif(request()->path() == 'admin/archive/edit'): ?> menu-open
              <?php elseif(request()->path() == 'admin/archive/add'): ?> menu-open
              <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> menu-open
              <?php elseif(request()->is('admin/blog/edit/*')): ?> menu-open
              <?php endif; ?>">
                    <a href="#" class="nav-link
                <?php if(request()->path() == 'admin/blog'): ?> active
                <?php elseif(request()->path() == 'admin/blog/blog-category'): ?> active
                <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> active
                <?php elseif(request()->path() == 'admin/blog/add'): ?> active
                <?php elseif(request()->path() == 'admin/archives'): ?> active
                <?php elseif(request()->path() == 'admin/archive/edit'): ?> active
                <?php elseif(request()->path() == 'admin/archive/add'): ?> active
                <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> active
                <?php elseif(request()->is('admin/blog/edit/*')): ?> active
                <?php endif; ?>">
                        <i class="nav-icon fab fa-blogger-b"></i>
                        <p>
                            <?php echo e(__('Blog')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.bcategory'). '?language=' . $lang_code); ?>" class="nav-link
                  <?php if(request()->path() == 'admin/blog/blog-category'): ?> active 
                  <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> active
                  <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> active 
                  <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Blog Categories')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.blog'). '?language=' . $lang_code); ?>" class="nav-link
                  <?php if(request()->path() == 'admin/blog'): ?> active 
                  <?php elseif(request()->path() == 'admin/blog/add'): ?> active
                  <?php elseif(request()->is('admin/blog/edit/*')): ?> active
                  <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Blog')); ?></p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                    <?php if(request()->path() == 'admin/subscriber'): ?> menu-open 
                    <?php elseif(request()->path() == 'admin/subscriber/add'): ?> menu-open
                    <?php elseif(request()->path() == 'admin/mailsubscriber'): ?> menu-open
                    <?php endif; ?>
                        ">
                    <a href="#" class="nav-link
                    <?php if(request()->path() == 'admin/subscriber'): ?> active 
                    <?php elseif(request()->path() == 'admin/subscriber/add'): ?> active
                    <?php elseif(request()->path() == 'admin/mailsubscriber'): ?> active
                    <?php endif; ?>
                    ">
                      <i class="nav-icon fas fa-envelope-open-text"></i>
                      <p>
                        <?php echo e(__('Subscribers')); ?>

                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo e(route('admin.newsletter')); ?>" class="nav-link
                        <?php if(request()->path() == 'admin/subscriber'): ?> active 
                        <?php elseif(request()->path() == 'admin/subscriber/add'): ?> active
                        <?php endif; ?>
                        ">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo e(__('Subscribers')); ?></p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo e(route('admin.mailsubscriber')); ?>" class="nav-link
                        <?php if(request()->path() == 'admin/mailsubscriber'): ?> active <?php endif; ?>
                        ">
                          <i class="far fa-circle nav-icon"></i>
                          <p><?php echo e(__('Mail to Subscribers')); ?></p>
                        </a>
                      </li>
                    </ul>
                  </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.footer.index'). '?language=' . $lang_code); ?>"
                       class="nav-link <?php if(request()->path() == 'admin/footer'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-feather-alt"></i>
                        <p>
                            <?php echo e(__('Footer')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.dynamic_page'). '?language=' . $lang_code); ?>"
                       class="nav-link <?php if(request()->path() == 'admin/dynamic-page'): ?> active <?php endif; ?>">

                        <i class="nav-icon  fab fa-sith"></i>
                        <p>
                            <?php echo e(__('Dynamic Page')); ?>

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview
          <?php if(request()->path() == 'admin/payment/gateways'): ?> menu-open
          <?php elseif(request()->path() == 'admin/shipping/methods'): ?> menu-open
          <?php elseif(request()->path() == 'admin/shipping/method/add'): ?> menu-open
          <?php elseif(request()->is('admin/shipping/method/edit/*')): ?> menu-open
          <?php elseif(request()->is('admin/payment/gateways/edit/*')): ?> menu-open

          <?php endif; ?>">
                    <a href="#" class="nav-link
            <?php if(request()->path() == 'admin/payment/gateways'): ?> active
            <?php elseif(request()->path() == 'admin/shipping/methods'): ?> active
            <?php elseif(request()->path() == 'admin/shipping/method/add'): ?> active
            <?php elseif(request()->is('admin/shipping/method/edit/*')): ?> active
            <?php elseif(request()->is('admin/payment/gateways/edit/*')): ?> active

            <?php endif; ?>">
                        <i class="nav-icon fab fa-blogger-b"></i>
                        <p>
                            <?php echo e(__('Payment Settings')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.payment.index')); ?>" class="nav-link
              <?php if(request()->path() == 'admin/payment/gateways'): ?> active
              <?php elseif(request()->is('admin/payment/gateways/edit/*')): ?> active
              <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Payment Gateway')); ?></p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.shipping.index'). '?language=' . $lang_code); ?>" class="nav-link
              <?php if(request()->path() == 'admin/shipping/methods'): ?> active
              <?php elseif(request()->path() == 'admin/shipping/method/add'): ?> active
              <?php elseif(request()->is('admin/shipping/method/edit/*')): ?> active
              <?php endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?php echo e(__('Shipping Method')); ?></p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('admin.language.index')); ?>" class="nav-link
            <?php if(request()->path() == 'admin/languages'): ?> active
            <?php elseif(request()->path() == 'admin/language/add'): ?> active
            <?php elseif(request()->is('admin/language/21/edit')): ?> active
            <?php elseif(request()->is('admin/language/*/edit/keyword')): ?> active
            <?php endif; ?>">
                        <i class="nav-icon fas fa-language"></i>
                        <p>
                            <?php echo e(__('Language')); ?>

                        </p>
                    </a>
                </li>
                
                

                
                
                
                
                
                
                
                
                
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.cache.clear')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-broom"></i>
                        <p>
                            <?php echo e(__('Clear Cache')); ?>

                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\laragon\www\skynet\core\resources\views/admin/partials/side-navbar.blade.php ENDPATH**/ ?>