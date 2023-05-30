    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/iCoder/partials/_loginHandle.php" method="post">
                        <h1 class="h3 mb-3 my-3 fw-normal text-center text-success fw-bold">Login to iCoder</h1>

                        <div class="form-floating my-4">
                            <input type="text" class="form-control" id="loginusername" name="loginUsername" required="">
                            <label for="floatingInput">Username</label>
                        </div>

                        <div class="form-floating my-4">
                            <input type="password" class="form-control" id="loginPassword" name="loginPassword" required="">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <button class="w-100 btn mb-2 btn-lg btn-success" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>