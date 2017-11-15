<script>
     var funcQueue = (function () {

        function funcQueue() {
          this._funcList = [];
        } 
        var _proto = funcQueue.prototype;

        _proto.runAll = function runAll() {
          var len = this._funcList.length, 
              index = 0;

          for (; index < len; index++)
             this._funcList[index].call();

        }

        _proto.add = function add(inFunc) {
            this._funcList.push(inFunc);
        }

        return funcQueue;

    })();
    var funcQueue = new funcQueue();
</script>
<header class="header">
    <!-- start header nav-->
    <nav class="site-navbar navbar navbar-expand-md fixed-top navbar-light bg-white">        

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-lg-none">
        <li class="nav-item">
          <a class="nav-link show-hide-sidebar-toggle-sm" href="#" ><span class="oi oi-menu"></span></a>
        </li>
      </ul>

      <a href="{{route('backend.dashboard')}}" class="navbar-brand brand-logo"> <span class="m">M</span> <span class="o">o</span> <span class="d">d</span> <span class="s">s</span> </a>

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-none d-lg-block">
        <li class="nav-item">
          <a class="nav-link show-hide-sidebar-toggle" href="#"><span class="oi oi-menu"></span></a>
        </li>
      </ul>

      {!! $block->getTopMenu() !!}          
    </nav>
    <!-- end header nav-->
</header>