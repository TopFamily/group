<div class="row">
    <div class="col-xs-12" align="right">
        <p>
            <div class="btn-group">
                {{ link_to( this.view.getControllerName() ~ '/edit/' ~ user.uid, '<span class="glyphicon glyphicon-edit"></span> Edit', 'class': 'btn btn-default btn-large')}}
            </div>
        </p>
    </div>
</div>
<div class="page-header">
    <h1>Profile::{{user.username}}</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        {{ partial("partials/card/fullcard", ["user": user]) }}
    </div>
</div>
