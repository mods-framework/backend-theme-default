<script>
    $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $('.tooltipped').tooltip({
            delay: 50
        });
        $(".side-nav-button").sideNav();
        $('.collapsible').collapsible();
        $('.modal').modal();
        $('select').material_select();
        funcQueue.runAll();
    });
</script>