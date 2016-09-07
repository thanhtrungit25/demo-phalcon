
{{ content() }}

<div class="row">

    <div class="col-md-6">
        <div class="page-header">
            <h2>Log In</h2>
        </div>
        {{ form('session/login', 'role': 'form') }}
            <fieldset>
                <div class="form-group">
                    {{ form.label('email') }}
                    <div class="controls">
                        {{ form.render('email') }}
                        {{ form.messages('email') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ form.label('password') }}
                    <div class="controls">
                        {{ form.render('password') }}
                        {{ form.messages('password') }}
                    </div>
                </div>
                <div class="form-group">
                    {{ submit_button('Login', 'class': 'btn btn-primary btn-large') }}
                </div>
            </fieldset>
        </form>
    </div>

    <div class="col-md-6">

        <div class="page-header">
            <h2>Don't have an account yet?</h2>
        </div>

        <p>Create an account offers the following advantages:</p>
        <ul>
            <li>Create, track and export your invoices online</li>
            <li>Gain critical insights into how your business is doing</li>
            <li>Stay informed about promotions and special packages</li>
        </ul>

        <div class="clearfix center">
            {{ link_to('session/signup', 'Sign Up', 'class': 'btn btn-primary btn-large btn-success') }}
        </div>
    </div>

</div>
