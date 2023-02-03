<div class="navigation">
    <div class="navigation-icon-menu">

        <ul>
            @hasanyrole('مدیر کل')
            <li data-toggle="tooltip" title="کاربران">
                <a href="#users" title=" کاربران">
                    <i class="icon ti-user"></i>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('مدیر فروش')
            <li data-toggle="tooltip" title="محصولات">
                <a href="#users" title=" محصولات">
                    <i class="icon ti-user"></i>
                </a>
            </li>
            @endhasanyrole
        </ul>

        <ul>
            <li data-toggle="tooltip" title="ویرایش پروفایل">
                <a href="#" class="go-to-page">
                    <i class="icon ti-settings"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="خروج">
                <form name="myform" action="{{route('logout')}}" method="post">
                    @csrf
                    <input type='hidden' name='query'/>
                    <a href="javascript: submitform()" class="go-to-page">
                        <i class="icon ti-power-off"></i>
                    </a>
                </form>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="users">
            <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{route('users.create')}}">ایجاد کاربر</a></li>
                    <li><a href="{{route('users.index')}}">لیست کاربران</a></li>
                </ul>
            </li>
            <li>
                <a href="#">نقش ها</a>
                <ul>
                    <li><a href="{{route('roles.create')}}">ایجاد نقش</a></li>
                    <li><a href="{{route('roles.index')}}">لیست نقش ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">لاگ ها</a>
                <ul>
                    <li><a href="{{route('logs')}}">لیست لاگ ها</a></li>

                </ul>
            </li>
        </ul>

    </div>
</div>
