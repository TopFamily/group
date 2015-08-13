
{{ content() }}

<div class="row">
    <div class="col-md-offset-3 col-md-6">
        <div class="page-header">
            <h1>Sign Up</h1>
            <h4>Chat, together.</h4>
        </div>
        {{ form('register') }}
            <fieldset>
                <div class="control-group">
                    <div class="controls">
                        <p>{{ form.render('username', ['class': 'form-control']) }}</p>
                        <p class="help-block">(Required, 5 ~ 20 characters, only a-z, A-Z, 0-9)</p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <p>{{ form.render('email', ['class': 'form-control']) }}</p>
                        <p class="help-block">(Required, we will use this email to fetch avatar on Gravatar)</p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <p>{{ form.render('password', ['class': 'form-control']) }}</p>
                        <p class="help-block">(5 ~ 20 characters)</p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <p>{{ form.render('repeatPassword', ['class': 'form-control']) }}</p>
                        <p class="help-block">(Type again)</p>
                    </div>
                </div>

                <div class="form-actions">
                    <div class="controls">
                        <button class = "btn btn-primary btn-block">
                            <span class="glyphicon glyphicon-new-window"></span> Sign Up
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p class="help-block">By signing up, you accept terms of use and privacy policy.</p>
                    </div>
                </div>
            </fieldset>
        {{ endform() }}
    </div>
</div>
