<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="{{url('/home')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                            @if(Auth::user()->is_admin == 1)
                            <li><a href="{{route('quiz.create')}}"><i class="menu-icon icon-pencil"></i>Create Quiz </a>
                                </li>
                                @endif
                            <li><a href="{{route('quiz.index')}}"><i class="menu-icon icon-eye-open"></i>View Quiz  </a></li>

                            </ul>
                        <ul class="widget widget-menu unstyled">

                            @if(Auth::user()->is_admin == 1)
                            <li><a href="{{route('question.create')}}"><i class="menu-icon icon-pencil"></i> Create Question </a></li>
                            @endif
                            <li><a href="{{route('question.index')}}"><i class="menu-icon icon-eye-open"></i>View Question </a></li>


                        </ul>
                        <ul class="widget widget-menu unstyled">

                            @if(Auth::user()->is_admin == 1)
                            <li><a href="{{route('exam.assign')}}"><i class="menu-icon icon-pencil"></i> assign quiz </a></li>
                            @endif
                            <li><a href="{{route('view.exam')}}"><i class="menu-icon icon-eye-open"></i>User assigned quiz </a></li>


                        </ul>



                            <ul class="widget widget-menu unstyled">

                                <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>

                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>More Pages </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                        <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="menu-icon icon-signout"></i>
                                    Logout
                                </a></li>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->

