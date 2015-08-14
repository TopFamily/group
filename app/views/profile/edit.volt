{{ content() }}

{{ form(this.view.getControllerName() ~ '/edit/' ~ user.uid) }}
    <div class="row">
        <div class="col-md-6" align="left">
            <p>{{ link_to( this.view.getControllerName() ~ '/index/' ~ user.uid, "class": "btn btn-default", "<span class='glyphicon glyphicon-chevron-left'></span> Profile") }}
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
    <fieldset>
        <div class="control-group">
            <div class="controls">
                <p>{{ form.render('name', ['class': 'form-control']) }}</p>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <p>
                    {{ form.render('description', ['class': 'form-control', 'style': 'height: 200px; resize: none;']) }}
                </p>
            </div>
        </div>
    </fieldset>
{{ endform() }}
