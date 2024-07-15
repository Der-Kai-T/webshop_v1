<!-- Category Aside/Sidebar -->
<div class="d-none d-lg-flex col-lg-3">
    <div class="pe-4">
        <!-- Category Aside -->
        <aside>

            <!-- Filter Category -->
            <div class="mb-4">
                <h2 class="mb-4 fs-6 mt-2 fw-bolder">{{ $category->name }}</h2>
                <nav>
                    <ul class="list-unstyled list-default-text">
                       @foreach($category->children() as $cat)
                            <x-shop.category.sidebar-item :category="$cat"/>
                       @endforeach


                    </ul>
                </nav>
            </div>
            <!-- / Filter Category-->

            <!-- Price Filter -->
            <div class="py-4 widget-filter widget-filter-price border-top">
                <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                   data-bs-toggle="collapse" href="#filter-price" role="button" aria-expanded="true"
                   aria-controls="filter-price">
                    Price
                </a>
                <div id="filter-price" class="collapse show">
                    <div class="filter-price mt-6"></div>
                    <div class="d-flex justify-content-between align-items-center mt-7">
                        <div class="input-group mb-0 me-2 border">
                            <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                            <input type="number" min="00" max="1000" step="1"
                                   class="filter-min form-control-sm border flex-grow-1 text-muted border-0">
                        </div>
                        <div class="input-group mb-0 ms-2 border">
                            <span class="input-group-text bg-transparent fs-7 p-2 text-muted border-0">$</span>
                            <input type="number" min="00" max="1000" step="1"
                                   class="filter-max form-control-sm flex-grow-1 text-muted border-0">
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Price Filter -->

            <!-- Brands Filter -->
            <div class="py-4 widget-filter border-top">
                <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                   data-bs-toggle="collapse" href="#filter-brands" role="button" aria-expanded="true"
                   aria-controls="filter-brands">
                    Brands
                </a>
                <div id="filter-brands" class="collapse show">
                    <div class="input-group my-3 py-1">
                        <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search"
                               aria-label="Search">
                        <span class="input-group-text bg-transparent px-2 position-absolute top-7 end-0 border-0 z-index-20"><i
                                    class="ri-search-2-line text-muted"></i></span>
                    </div>
                    <div class="simplebar-wrapper">
                        <div class="filter-options" data-pixr-simplebar>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-0">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-0">Adidas <span
                                            class="text-muted">(21)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-1">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-1">Asics <span
                                            class="text-muted">(13)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-2">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-2">Canterbury <span
                                            class="text-muted">(18)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-3">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-3">Converse <span
                                            class="text-muted">(25)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-4">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-4">Donnay <span
                                            class="text-muted">(11)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-5">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-5">Nike <span
                                            class="text-muted">(19)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-6">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-6">Millet <span
                                            class="text-muted">(24)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-7">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-7">Puma <span
                                            class="text-muted">(11)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-8">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-8">Reebok <span
                                            class="text-muted">(19)</span></label>
                            </div>
                            <div class="form-group form-check mb-0">
                                <input type="checkbox" class="form-check-input" id="filter-brand-9">
                                <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                       for="filter-brand-9">Under Armour <span
                                            class="text-muted">(24)</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Brands Filter -->

            <!-- Type Filter -->
            <div class="py-4 widget-filter border-top">
                <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                   data-bs-toggle="collapse" href="#filter-type" role="button" aria-expanded="true"
                   aria-controls="filter-type">
                    Type
                </a>
                <div id="filter-type" class="collapse show">
                    <div class="input-group my-3 py-1">
                        <input type="text" class="form-control py-2 filter-search rounded" placeholder="Search"
                               aria-label="Search">
                        <span class="input-group-text bg-transparent px-2 position-absolute top-7 end-0 border-0 z-index-20"><i
                                    class="ri-search-2-line text-muted"></i></span>
                    </div>
                    <div class="filter-options">
                        <div class="form-group form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="filter-type-0">
                            <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                   for="filter-type-0">Slip On </label>
                        </div>
                        <div class="form-group form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="filter-type-1">
                            <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                   for="filter-type-1">Strap Up </label>
                        </div>
                        <div class="form-group form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="filter-type-2">
                            <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                   for="filter-type-2">Zip Up </label>
                        </div>
                        <div class="form-group form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="filter-type-3">
                            <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                   for="filter-type-3">Toggle </label>
                        </div>
                        <div class="form-group form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="filter-type-4">
                            <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                   for="filter-type-4">Auto </label>
                        </div>
                        <div class="form-group form-check mb-0">
                            <input type="checkbox" class="form-check-input" id="filter-type-5">
                            <label class="form-check-label fw-normal text-body flex-grow-1 d-flex justify-content-between"
                                   for="filter-type-5">Click </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Type Filter -->

            <!-- Sizes Filter -->
            <div class="py-4 widget-filter border-top">
                <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                   data-bs-toggle="collapse" href="#filter-sizes" role="button" aria-expanded="true"
                   aria-controls="filter-sizes">
                    Sizes
                </a>
                <div id="filter-sizes" class="collapse show">
                    <div class="filter-options mt-3">
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-0">
                            <label class="form-check-label fw-normal" for="filter-sizes-0">6.5</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-1">
                            <label class="form-check-label fw-normal" for="filter-sizes-1">7</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-2">
                            <label class="form-check-label fw-normal" for="filter-sizes-2">7.5</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-3">
                            <label class="form-check-label fw-normal" for="filter-sizes-3">8</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-4">
                            <label class="form-check-label fw-normal" for="filter-sizes-4">8.5</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-5">
                            <label class="form-check-label fw-normal" for="filter-sizes-5">9</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-6">
                            <label class="form-check-label fw-normal" for="filter-sizes-6">9.5</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-7">
                            <label class="form-check-label fw-normal" for="filter-sizes-7">10</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-8">
                            <label class="form-check-label fw-normal" for="filter-sizes-8">10.5</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-9">
                            <label class="form-check-label fw-normal" for="filter-sizes-9">11</label>
                        </div>
                        <div class="form-group d-inline-block mr-2 mb-2 form-check-bg form-check-custom">
                            <input type="checkbox" class="form-check-bg-input" id="filter-sizes-10">
                            <label class="form-check-label fw-normal" for="filter-sizes-10">11.5</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Sizes Filter -->

            <!-- Colour Filter -->
            <div class="py-4 widget-filter border-top">
                <a class="small text-body text-decoration-none text-secondary-hover transition-all transition-all fs-6 fw-bolder d-block collapse-icon-chevron"
                   data-bs-toggle="collapse" href="#filter-colour" role="button" aria-expanded="true"
                   aria-controls="filter-colour">
                    Colour
                </a>
                <div id="filter-colour" class="collapse show">
                    <div class="filter-options mt-3">
                        <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-primary">
                            <input type="checkbox" class="form-check-color-input" id="filter-colours-0">
                            <label class="form-check-label" for="filter-colours-0"></label>
                        </div>
                        <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-success">
                            <input type="checkbox" class="form-check-color-input" id="filter-colours-1">
                            <label class="form-check-label" for="filter-colours-1"></label>
                        </div>
                        <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
                            <input type="checkbox" class="form-check-color-input" id="filter-colours-2">
                            <label class="form-check-label" for="filter-colours-2"></label>
                        </div>
                        <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
                            <input type="checkbox" class="form-check-color-input" id="filter-colours-3">
                            <label class="form-check-label" for="filter-colours-3"></label>
                        </div>
                        <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
                            <input type="checkbox" class="form-check-color-input" id="filter-colours-4">
                            <label class="form-check-label" for="filter-colours-4"></label>
                        </div>
                        <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-dark">
                            <input type="checkbox" class="form-check-color-input" id="filter-colours-5">
                            <label class="form-check-label" for="filter-colours-5"></label>
                        </div>
                        <div class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-secondary">
                            <input type="checkbox" class="form-check-color-input" id="filter-colours-6">
                            <label class="form-check-label" for="filter-colours-6"></label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Colour Filter -->

        </aside>
        <!-- / Category Aside-->                    </div>
</div>
<!-- / Category Aside/Sidebar -->
