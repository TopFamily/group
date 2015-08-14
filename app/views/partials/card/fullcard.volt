<div class="card">
    <img src="{{user.avatar}}" class="img-circle" width="80px" height="80px"></img>
    <div class="caption">
        <h3>{{user.usercard.name | e}}</h3>
        <p>{{user.usercard.description | e | nl2br}}</p>
    </div>
</div>

<style>
.card {
    background-color: #FFF;
    min-height: 150px;
    border-radius: 2px;
    border: solid 1px #b0b0b0;
    width: 100%;
    padding: 1em 1em 1em 1em;
    -moz-box-shadow: 2px 2px 3px #c2c2c2;
    box-shadow: 2px 2px 3px #c2c2c2;

    transition: box-shadow 0.3s;
    -moz-transition: -moz-box-shadow 0.3s;
    -webkit-transition: box-shadow 0.3s;
    -o-transition: box-shadow 0.3s;
}

.card:hover {
    -moz-box-shadow: 5px 5px 3px #c2c2c2;
    box-shadow: 5px 5px 3px #c2c2c2;

    transition: box-shadow 0.3s;
    -moz-transition: -moz-box-shadow 0.3s;
    -webkit-transition: box-shadow 0.3s;
    -o-transition: box-shadow 0.3s;
}
</style>
