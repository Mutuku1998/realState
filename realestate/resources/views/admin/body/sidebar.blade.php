<nav class="sidebar">
    <div class="sidebar-header">
      <a href="#" class="sidebar-brand">
        Real<span>Estate</span>
      </a>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body">
      <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Real estate</li>
        

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Property Type</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
           
              <li class="nav-item">
                <a href="{{route('all.type')}}" class="nav-link"> All Types</a>
              </li>

              <li class="nav-item">
              <a href="{{route('add.type')}}" class="nav-link">Add Type</a>
              </li>
            </ul>
          </div>
        </li>

      

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="amenities" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="mail"></i>
            <span class="link-title">Amenities</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="emails">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.amenitie')}}" class="nav-link"> All Amenities</a>
              </li>
              <li class="nav-item">
              <a href="" class="nav-link">Add Amenities</a>
              </li>
    
            </ul>
          </div>
        </li>
        
        
        <li class="nav-item">
          <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Calendar</span>
          </a>
        </li>
        <li class="nav-item nav-category">Components</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">UI Kit</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="uiComponents">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/badges.html" class="nav-link">Badges</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/breadcrumbs.html" class="nav-link">Breadcrumbs</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/buttons.html" class="nav-link">Buttons</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/button-group.html" class="nav-link">Button group</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/cards.html" class="nav-link">Cards</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/carousel.html" class="nav-link">Carousel</a>
              </li>
              <li class="nav-item">
                  <a href="pages/ui-components/collapse.html" class="nav-link">Collapse</a>
                </li>
              <li class="nav-item">
                <a href="pages/ui-components/dropdowns.html" class="nav-link">Dropdowns</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/list-group.html" class="nav-link">List group</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/media-object.html" class="nav-link">Media object</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/modal.html" class="nav-link">Modal</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/navs.html" class="nav-link">Navs</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/navbar.html" class="nav-link">Navbar</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/pagination.html" class="nav-link">Pagination</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/popover.html" class="nav-link">Popovers</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/progress.html" class="nav-link">Progress</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/scrollbar.html" class="nav-link">Scrollbar</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/scrollspy.html" class="nav-link">Scrollspy</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/spinners.html" class="nav-link">Spinners</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/tabs.html" class="nav-link">Tabs</a>
              </li>
              <li class="nav-item">
                <a href="pages/ui-components/tooltips.html" class="nav-link">Tooltips</a>
              </li>
            </ul>
          </div>
        </li>

        
        <li class="nav-item nav-category">Role $ Permission</li>

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title"> Role & Permission</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.roles')}}" class="nav-link">All Roles</a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.roles.permission')}}" class="nav-link">Roles In Permission</a>
              </li>

              <li class="nav-item">
                <a href="{{route('all.roles.permission')}}" class="nav-link"> All Roles In Permission</a>
              </li>
             
            </ul>
          </div>
        </li>
   


        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#admin" role="button" aria-expanded="false" aria-controls="admin">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Manage Admin User</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="advancedUI">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="{{route('all.admin')}}" class="nav-link">All Admin</a>
              </li>
              <li class="nav-item">
                <a href="{{route('all.roles')}}" class="nav-link">All Admin</a>
              </li>
          
            </ul>
          </div>
        </li>
  
  
  
   
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
          <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>