<!-- Checkout Panel Contact -->
<div class="checkout-panel">
    <h5 class="title-checkout">Contact Information</h5>
    <div class="row">

        <!-- Email-->
        <div class="col-12">
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
            </div>

            <!-- Mailing List Signup-->
            <div class="form-group form-check m-0">
                <input type="checkbox" class="form-check-input" id="add-mailinglist" checked>
                <label class="form-check-label" for="add-mailinglist">Keep me updated with your latest
                    news and offers</label>
            </div>
        </div>
    </div>
</div>
<!-- /Checkout Panel Contact -->                    <!-- Checkout Shipping Address -->
<div class="checkout-panel">
    <h5 class="title-checkout">Shipping Address</h5>
    <div class="row">
        <!-- First Name-->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value=""
                       required="">
            </div>
        </div>

        <!-- Last Name-->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                       required="">
            </div>
        </div>

        <!-- Address-->
        <div class="col-12">
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address"
                       placeholder="123 Some Street Somewhere" required="">
            </div>
        </div>

        <!-- Country-->
        <div class="col-md-12">
            <div class="form-group">
                <label for="country" class="form-label">Country</label>
                <select class="form-select" id="country" required="">
                    <option value="">Please Select...</option>
                    <option>United States</option>
                </select>
            </div>
        </div>

        <!-- State-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="state" class="form-label">State</label>
                <select class="form-select" id="state" required="">
                    <option value="">Please Select...</option>
                    <option>California</option>
                </select>
            </div>
        </div>

        <!-- Post Code-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="zip" class="form-label">Zip/Post Code</label>
                <input type="text" class="form-control" id="zip" placeholder="" required="">
            </div>
        </div>
    </div>

    <div class="pt-4 mt-4 border-top d-flex justify-content-between align-items-center">
        <!-- Shipping Same Checkbox-->
        <div class="form-group form-check m-0">
            <input type="checkbox" class="form-check-input" id="same-address" checked>
            <label class="form-check-label" for="same-address">Use for billing address</label>
        </div>
    </div>
</div>
<!-- /Checkout Shipping Address -->                    <!-- Checkout Billing Address-->
<div class="billing-address checkout-panel d-none">
    <h5 class="title-checkout">Billing Address</h5>
    <div class="row">
        <!-- First Name-->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="firstNameAddress" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstNameAddress" placeholder="" value=""
                       required="">
            </div>
        </div>

        <!-- Last Name-->
        <div class="col-sm-6">
            <div class="form-group">
                <label for="lastNameAddress" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastNameAddress" placeholder="" value=""
                       required="">
            </div>
        </div>

        <!-- Address-->
        <div class="col-12">
            <div class="form-group">
                <label for="addressAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="addressAddress"
                       placeholder="123 Some Street Somewhere" required="">
            </div>
        </div>

        <!-- Country-->
        <div class="col-md-12">
            <div class="form-group">
                <label for="countryAddress" class="form-label">Country</label>
                <select class="form-select" id="countryAddress" required="">
                    <option value="">Please Select...</option>
                    <option>United States</option>
                </select>
            </div>
        </div>

        <!-- State-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="stateAddress" class="form-label">State</label>
                <select class="form-select" id="stateAddress" required="">
                    <option value="">Please Select...</option>
                    <option>California</option>
                </select>
            </div>
        </div>

        <!-- Post Code-->
        <div class="col-md-6">
            <div class="form-group">
                <label for="zipAddress" class="form-label">Zip/Post Code</label>
                <input type="text" class="form-control" id="zipAddress" placeholder="" required="">
            </div>
        </div>
    </div>
</div>
<!-- / Checkout Billing Address-->                    <!-- Checkout Shipping Method-->
<div class="checkout-panel">
    <h5 class="title-checkout">Shipping Method</h5>

    <!-- Shipping Option-->
    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
        <input class="form-check-input" type="radio" name="checkoutShippingMethod"
               id="checkoutShippingMethodOne" checked>
        <label class="form-check-label" for="checkoutShippingMethodOne">
                          <span class="d-flex justify-content-between align-items-start w-100">
                            <span>
                              <span class="mb-0 fw-bolder d-block">Click & Collect Shipping</span>
                              <small class="fw-bolder">Collect from our London store</small>
                            </span>
                            <span class="small fw-bolder text-uppercase">Free</span>
                          </span>
        </label>
    </div>

    <!-- Shipping Option-->
    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
        <input class="form-check-input" type="radio" name="checkoutShippingMethod"
               id="checkoutShippingMethodTwo">
        <label class="form-check-label" for="checkoutShippingMethodTwo">
                          <span class="d-flex justify-content-between align-items-start">
                            <span>
                              <span class="mb-0 fw-bolder d-block">UPS Next Day</span>
                              <small class="fw-bolder">For all orders placed before 1pm Monday to Thursday</small>
                            </span>
                            <span class="small fw-bolder text-uppercase">$19.99</span>
                          </span>
        </label>
    </div>

    <!-- Shipping Option-->
    <div class="form-check form-group form-check-custom form-radio-custom mb-3">
        <input class="form-check-input" type="radio" name="checkoutShippingMethod"
               id="checkoutShippingMethodThree">
        <label class="form-check-label" for="checkoutShippingMethodThree">
                          <span class="d-flex justify-content-between align-items-start">
                            <span>
                              <span class="mb-0 fw-bolder d-block">DHL Priority Service</span>
                              <small class="fw-bolder">24 - 36 hour delivery</small>
                            </span>
                            <span class="small fw-bolder text-uppercase">$9.99</span>
                          </span>
        </label>
    </div>
</div>
<!-- /Checkout Shipping Method -->                    <!-- Checkout Payment Method-->
<div class="checkout-panel">
    <h5 class="title-checkout">Payment Information</h5>

    <div class="row">
        <!-- Payment Option-->
        <div class="col-12">
            <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                <input class="form-check-input" type="radio" name="checkoutPaymentMethod"
                       id="checkoutPaymentStripe" checked>
                <label class="form-check-label" for="checkoutPaymentStripe">
                              <span class="d-flex justify-content-between align-items-start">
                                <span>
                                  <span class="mb-0 fw-bolder d-block">Credit Card (Stripe)</span>
                                </span>
                                <i class="ri-bank-card-line"></i>
                              </span>
                </label>
            </div>
        </div>

        <!-- Payment Option-->
        <div class="col-12">
            <div class="form-check form-group form-check-custom form-radio-custom mb-3">
                <input class="form-check-input" type="radio" name="checkoutPaymentMethod"
                       id="checkoutPaymentPaypal">
                <label class="form-check-label" for="checkoutPaymentPaypal">
                              <span class="d-flex justify-content-between align-items-start">
                                <span>
                                  <span class="mb-0 fw-bolder d-block">PayPal</span>
                                </span>
                                <i class="ri-paypal-line"></i>
                              </span>
                </label>
            </div>
        </div>

    </div>

    <!-- Payment Details-->
    <div class="card-details">
        <div class="row pt-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="cc-name" class="form-label">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                    <small class="text-muted">Full name as displayed on card</small>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="cc-number" class="form-label">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cc-expiration" class="form-label">Expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder=""
                           required="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <div class="d-flex">
                        <label for="cc-cvv"
                               class="form-label d-flex w-100 justify-content-between align-items-center">Security
                            Code</label>
                        <button type="button" class="btn btn-link p-0 fw-bolder fs-xs text-nowrap"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="A CVV is a number on your credit card or debit card that's in addition to your credit card number and expiration date">
                            What's this?
                        </button>
                    </div>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                </div>
            </div>
        </div>
    </div>
    <!-- / Payment Details-->

    <!-- Paypal Info-->
    <div class="paypal-details bg-light p-4 d-none mt-3 fw-bolder">
        Please click on complete order. You will then be transferred to Paypal to enter your payment
        details.
    </div>
    <!-- /Paypal Info-->
</div>
