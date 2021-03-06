{{ content() }}
<div class="grid clearfix">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>

    {% for user in users %}
    <div class="grid-item">
        {{ partial("partials/card/fullcard", ["user": user]) }}
    </div>
    {% endfor %}
</div>

<script>
$("#main_container").removeClass("container");
$("#main_container").addClass("container-fluid");
</script>
