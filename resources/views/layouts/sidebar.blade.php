<div id="sidebar-left" class="span2">
    <div class="nav-collapse sidebar-nav">
        <ul class="nav nav-tabs nav-stacked main-menu">
            <li><a href="{{URL::to('/layout')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
           <!--  <li><a href="{{URL::to('/addcontact')}}"><i class="icon-envelope"></i><span class="hidden-tablet"> Add Student</span></a></li>-->
            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Clients</span></a>
                <ul>
                    <li><a class="submenu" href="{{url('/add-client')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Client</span></a></li>
                    <li><a class="submenu" href="{{url('/list-clients')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> List Clients</span></a></li>
                </ul>   
            </li>

            <li>
                <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Gallery</span></a>
                <ul>
                    <li><a class="submenu" href="{{url('/add-gallery')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Gallery</span></a></li>
                    <li><a class="submenu" href="{{url('/list-galleries')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> List Galleries</span></a></li>
                </ul>   
            </li>
        </ul>
    </div>
</div>