<!-- main-sidebar -->


<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{asset('assets/img/faces/6.jpg')}}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
                    <span class="mb-0 text-muted">{{Auth::user()->email}}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">


            <li class="side-item side-item-category">برنامج الفواتير</li>
            <li class="slide">

                <a class="side-menu__item
{{request()->routeIs('home*') ? 'active' : '' }}"
                   href="{{route('home')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon "
                         viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z"
                              opacity=".3"/>
                        <path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8
                               16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v
                               2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
                    </svg>
                    <span class="side-menu__label">الرئيسية</span></a>
            </li>
            <li class="side-item side-item-category">الفواتير</li>

            <li class="slide">
                <a class="side-menu__item {{request()->routeIs('invoices*') ? 'active' : '' }}"
                   data-toggle="slide">

                    <span class="side-menu__label">
                        <i class="far fa-file-alt m-2 fa-lg"></i>
                        الفواتير</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>

                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('invoices.index') }}">قائمة الفواتير</a></li>
                    <li><a class="slide-item" href="{{ route('invoices.index.archive') }}">ارشيف الفواتير</a></li>


                </ul>
            </li>

            <li class="side-item side-item-category">تقارير الفواتير</li>

            <li class="slide">
                <a class="side-menu__item {{request()->routeIs('reports*') ? 'active' : '' }}"
                   href="{{ route('reports.index') }}">

                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"></path>
                        <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"></path>
                        <path
                            d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"></path>
                    </svg>
                    <span class="side-menu__label">التقارير</span></a>


            </li>

            <li class="side-item side-item-category">المستخدمين</li>
            <li class="slide">
                <a class="side-menu__item {{request()->routeIs('users*')||request()->routeIs('roles*') ? 'active' : '' }}"
                   data-toggle="slide">

                    <span class="side-menu__label">
                        <i class="fa fa-user-circle m-2 fa-lg"></i>
                        المستخدمين</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>

                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{ route('users.index') }}">قائمة المستخدمين</a></li>
                    <li><a class="slide-item" href="{{ route('roles.index') }}">صلاحيات المستخدمين</a></li>


                </ul>
            </li>


            <li class="side-item side-item-category">الاقسام</li>
            <li class="slide">
                <a class="side-menu__item {{request()->routeIs('sections*') ||request()->routeIs('products*') ? 'active' : '' }}"
                   data-toggle="slide">

                    <span class="side-menu__label">
                        <i class="fa fa-check m-2 fa-lg"></i>
                        الاقسام</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>

                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('sections.index')}}">الأقسام</a></li>
                    <li><a class="slide-item" href="{{ route('products.index') }}">المنتجات</a></li>

                </ul>
            </li>












        </ul>
    </div>
</aside>
<!-- main-sidebar -->
