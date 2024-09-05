<div class="sidebar">
    <nav class="nav-menu">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li class="dropdown">
                <a href="#">Products</a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('product.form')}}">Create Product</a></li>
                    <li><a href="{{route('show.product')}}">View Products</a></li>
                    <li><a href="#">Marketing</a></li>
                </ul>
            </li>
            <li><a href="#">Contact</a></li>
            <li><a href="{{route('logout.user')}}">Logout</a></li>
        </ul>
    </nav>
</div>