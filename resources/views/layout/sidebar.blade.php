<div class="sidebar" data-color="azure" data-background-color="black" data-image="/assets/img/sidebar-1.jpg">
    <div class="logo"><a href="javascript:;" class="simple-text logo-mini"></a>
      <a href="javascript:;" class="simple-text logo-normal">
        Drop Scheduler
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">

        <li class="nav-item ">
          <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
            <i class="material-icons">water_drop</i>
            <p> Drops
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="mapsExamples">
            <ul class="nav">
              <li class="nav-item ">
                <a class="nav-link" href="{{route('listDrop')}}">
                  <span class="sidebar-mini"> LD </span>
                  <span class="sidebar-normal"> List Drops </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{route('addDrop')}}">
                  <span class="sidebar-mini"> AD </span>
                  <span class="sidebar-normal"> Add Drop </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      
        <li class="nav-item ">
          <a class="nav-link" href="{{route('schedule')}}">
            <i class="material-icons">dashboard</i>
            <p> Create Schedule </p>
          </a>
        </li>
      </ul>
    </div>
  </div>