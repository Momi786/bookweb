@php
    if(Session::has('onlineuser')):
        $value = Session::get('onlineuser');
    endif;
@endphp
<ul class="accordion-menu m-0" style="height:860px">
    <li class="sidebar-title">
        Book Store
    </li>
    @if ($value['usertype'] != 2)
        <li class="">
            <a href="{{URL::to('/admin')}}"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
        </li>
    @endif
    <li>
        <a href="#"><i class="material-icons-outlined">book</i>Book<i class="material-icons has-sub-menu">add</i></a>
        <ul class="sub-menu">
            <li>
                <a href="{{URL::to('/admin/book')}}">Books</a>
            </li>
            @if ($value['usertype'] != 2)
                <li>
                    <a href="{{URL::to('admin/book/category')}}">Book Categories</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/book/type')}}">Book Types</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/book/sale')}}">Book Sale</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/book/special')}}">Special Offer</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/book/flash')}}">Flash Sale</a>
                </li>
            @endif
        </ul>
    </li>
    <li>
        <a href="#"><i class="material-icons-outlined">article</i>Orders<i class="material-icons has-sub-menu">add</i></a>
        <ul class="sub-menu">
            <li>
                <a href="{{URL::to('admin/orders')}}">All Orders</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="material-icons-outlined">article</i>Coupon<i class="material-icons has-sub-menu">add</i></a>
        <ul class="sub-menu">
            <li>
                <a href="{{URL::to('admin/coupon')}}">Coupon Code</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="material-icons-outlined">article</i>Meta Tags<i class="material-icons has-sub-menu">add</i></a>
        <ul class="sub-menu">
            <li>
                <a href="{{URL::to('admin/meta-tags')}}">Meta Tags</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#"><i class="material-icons-outlined">article</i>News<i class="material-icons has-sub-menu">add</i></a>
        <ul class="sub-menu">
            <li>
                <a href="{{URL::to('/admin/news')}}">News</a>
            </li>
        </ul>
    </li>
    @if ($value['usertype'] != 2)
        <li>
            <a href="#"><i class="material-icons-outlined">person</i>Users<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('/admin/user')}}">Author</a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/client')}}">Client</a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/board-member')}}">Board Member</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="material-icons-outlined">question_answer</i>FAQ<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('/admin/faq')}}">FAQ</a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/faq/category')}}">FAQ Categories</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="material-icons-outlined">content_copy</i>Web Pages Content<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('admin/system-settings/home-page-content')}}">Home Page Content</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/system-settings/about')}}">About Page Content</a>
                </li>
                <li>
                    <a href="{{URL::to('admin/system-settings/footer')}}">Footer Content</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="material-icons-outlined">S</i>Slider<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('admin/system-settings/main-slider')}}">Main Slider</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="material-icons-outlined">T</i>Testimonial<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('admin/system-settings/testimonial')}}">Testimonial</a>
                </li>
            </ul>
        </li>
        <!-- <li>
            <a href="#"><i class="material-icons-outlined">L</i>Logo And Favicon<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('admin/system-settings/logo-favicon')}}">Logo & Favicon</a>
                </li>
            </ul>
        </li> -->
        <li>
            <a href="#"><i class="material-icons-outlined">menu</i>Main Menu<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('admin/system-settings/main-menu')}}">Main Menu</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="material-icons">share</i>Social Media<i class="material-icons has-sub-menu">add</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="{{URL::to('admin/system-settings/social-media')}}">Social Media</a>
                </li>
            </ul>
        </li>
    @endif
</ul>

