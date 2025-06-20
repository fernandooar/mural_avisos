<x-card_teste>
    <x-slot name="cdn">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    </x-slot>
    <x-slot name="title">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem tempore pariatur quas ab cumque incidunt ut
        eaque facilis, at nemo quibusdam earum beatae velit in aut voluptatibus amet. Molestias, quae expedita.
        Voluptas, sapiente recusandae. Sapiente quam vero numquam consequuntur omnis sed repellendus fugiat odit quia
        placeat. Et, porro. Minima facilis blanditiis dolorum qui suscipit at quibusdam. Similique delectus, vitae
        soluta temporibus vero omnis velit veritatis cupiditate eos? Repellendus illo adipisci ipsum et obcaecati,
        consequatur sunt dolorem repellat necessitatibus deserunt ex.
    </x-slot>

    <x-slot name='burgger'>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium distinctio, provident impedit illum
        accusamus pariatur suscipit necessitatibus quae exercitationem quia, ratione et ducimus dicta quisquam rerum in
        possimus culpa animi?
    </x-slot>

    <x-slot name="formi">
        <form class="row g-3">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </x-slot>
</x-card_teste>