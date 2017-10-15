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
<header>
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <ul class="left">
                    <li class="hide-on-large-only">
                        <a href="javascript:void(0);" data-activates="open-left-menu" class="side-nav-button waves-effect waves-block waves-light"> <i class="material-icons">menu</i> </a>
                    </li>
                    <li>
                        <h1 class="logo-wrapper"> <a href="#!" class="brand-logo"> <span class="m">M</span> <span class="o">o</span> <span class="d">d</span> <span class="s">s</span> </a> </h1> 
                    </li>
                </ul>
                 {!! $block->getTopMenu() !!}                
            </div>
        </nav>
    </div>
    <!-- end header nav-->
</header>