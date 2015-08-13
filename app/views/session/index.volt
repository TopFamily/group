
{{ content() }}

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="page-header">
            <h1>Log In</h1>
            <h4>Hello, my friend.</h4>
        </div>
        {{ form('session/start') }}
            <fieldset>
                <div class="form-group">
                    <div class="controls">
                        {{ text_field('email', 'class': "form-control",
                        "placeholder" : "Username/Email", "required": "") }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        {{ password_field('password', 'class': "form-control",
                        "placeholder" : "Password", "required": "") }}
                    </div>
                </div>
                <div class="form-group">
                    <button class = "btn btn-primary btn-block">
                        <span class="glyphicon glyphicon-log-in"></span> Log In
                    </button>
                </div>
            </fieldset>
        {{ endform() }}
    </div>
</div>
