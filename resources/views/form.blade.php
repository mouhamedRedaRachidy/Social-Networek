<form action="/form" method="POST">
    {{csrf_field()}}
    <input type="text" class="form-control" name="name"><button class="btn btn primary">add</button>
</form>