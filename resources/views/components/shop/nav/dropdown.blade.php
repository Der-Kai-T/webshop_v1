<li {{ $attributes->class(['nav-item dropdown me-lg-4']) }}>
    <a
        class="nav-link fw-bolder dropdown-toggle py-lg-4" href="#" role="button"
       data-bs-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false">
        {{ $title }}
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="index.html">Homepage</a></li>
        <li><a class="dropdown-item" href="category.html">Category</a></li>
        <li><a class="dropdown-item" href="./product.html">Product</a></li>
        <li><a class="dropdown-item" href="cart.html">Cart</a></li>
        <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
    </ul>
</li>
