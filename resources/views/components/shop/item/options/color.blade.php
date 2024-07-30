<div {{ $attributes->class(['product-option mb-4 mt-4']) }}>
    <small class="text-uppercase d-block fw-bolder mb-2">
        Colour : <span class="selected-option fw-bold">Crimson Blue</span>
    </small>
    <div class="d-flex justify-content-start">
        <div
                class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom">
            <input type="radio" class="form-check-color-input" id="option-colour-1"
                   name="option-colour"
                   value="Dark Black">
            <label class="form-check-label" for="option-colour-1"></label>
        </div>
        <div
                class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-warning">
            <input type="radio" class="form-check-color-input" id="option-colour-2"
                   name="option-colour"
                   value="Sun Yellow">
            <label class="form-check-label" for="option-colour-2"></label>
        </div>
        <div
                class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-info">
            <input type="radio" class="form-check-color-input" id="option-colour-3"
                   name="option-colour"
                   value="Crimson Blue" checked>
            <label class="form-check-label" for="option-colour-3"></label>
        </div>
        <div
                class="form-group d-inline-block mr-1 mb-1 form-check-solid-bg-checkmark form-check-custom form-check-danger">
            <input type="radio" class="form-check-color-input" id="option-colour-4"
                   name="option-colour"
                   value="Cherry Red">
            <label class="form-check-label" for="option-colour-4"></label>
        </div>
    </div>
</div>
