    <!-- Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/iCoder/partials/_signupHandle.php" method="post">
                        <h1 class="h3 mb-3 my-3 fw-normal text-center text-success fw-bold">Signup to iCoder</h1>

                        <div class="form-floating my-3">
                            <input type="text" class="form-control" id="signupUsername"  name="signupUsername" required="">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="email" class="form-control" id="signupEmail" name="signupEmail" required="">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="signupPassword" name="signupPassword" required="">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating my-3">
                            <input type="password" class="form-control" id="signupCPassword" name="signupCPassword" required="">
                            <label for="floatingPassword">Correct Password</label>
                        </div>

                        <button class="w-100 btn mb-2 btn-lg btn-success" type="submit">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
