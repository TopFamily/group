{{ form(this.view.getControllerName() ~ '/edit/' ~ user.uid) }}
    <div class="row">
        <div class="col-md-6" align="left">
            <p>{{ link_to( this.view.getControllerName() ~ '/index/' ~ user.uid, "class": "btn btn-default", "<span class='glyphicon glyphicon-chevron-left'></span> Data") }}
            </p>
        </div>
        <div class="col-md-6" align="right">
            <p>
                <div class="btn-group">
                    {{ link_to( this.view.getControllerName() ~ '/edit/' ~ user.uid, "class": "btn btn-default", "<span class='glyphicon glyphicon-repeat'></span> Reset") }}
                    <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-ok'></span> Save</button>
                </div>
            </p>
        </div>
    </div>

    <div class="page-header">
        <h1>Edit Profile::{{user.username}}</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            {{ partial("partials/card/fullcard", ["user": user]) }}
        </div>
    </div>
{{ endform() }}
