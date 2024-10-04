<style>
    .btn {
        --bs-btn-padding-y: 0.7rem;
        --bs-btn-padding-x: 3.5rem;
        --bs-btn-font-size: 1.25rem;
        --bs-btn-border-radius: 3.5rem;
    }


    .view-password {
        position: absolute;
        right: 0;
        bottom: 0;
        border: 1px solid transparent;
        background: none;
        z-index: 3;
        padding: 14px;
        cursor: pointer;
    }

    .error {
        color: var(--bs-danger);
        font-size: 14px;
    }

    .custom-label {
        color: var(--bs-dark);
        font-weight: 500;
    }

    .form-control {
        &.custom-control {
            padding: 14px;
            border-bottom: 1px solid var(--bs-gray) !important;

        }

        &:focus {
            box-shadow: none;
            border-bottom: 1px solid var(--bs-primary) !important;

            &~.custom-label {
                color: var(--bs-primary);
            }
        }

        &.error {
            border: 1px solid var(--bs-danger);
            font-size: initial;
            color: initial;
        }
    }
</style>

<script>
    let toggle = 0;
    $(".view-password").on('click', function() {
        var eye = $(this).children();
        var toogleInput = $(this).siblings();
        eye.toggleClass("bi bi-eye bi bi-eye-slash");
        if (toggle === 0) {
            toogleInput.attr('type', 'text');
            toggle = 1;
        } else {
            toogleInput.attr('type', 'password');
            toggle = 0;
        }
    });
</script>


<main class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6" style="max-width:450px">
                <div class="card px-4 py-5 border-0 shadow">
                    <h3 class="text-primary text-center">LOGIN</h3>
                    <form id="accountForm" class="mt-4" method="get" action="">
                        <div class="mb-2">
                            <div class=" form-floating form-group mb-4">

                                <input type="email"
                                    class="form-control border-0 rounded-0 bg-transparent ps-0 custom-control"
                                    id="email" name="email" placeholder="example@email.com">
                                <label for="email" class="form-label ps-0 custom-label">Email</label>
                            </div>
                            <div class="form-group">

                                <div class=" form-floating position-relative d-flex flex-wrap">
                                    <input type="password"
                                        class="form-control border-0 rounded-0 bg-transparent ps-0 custom-control w-100"
                                        id="password" name="password" placeholder="password">
                                    <label for="password" class="form-label ps-0 custom-label">Password</label>
                                    <a class="input-group-text text-decoration-none view-password"><i
                                            class="bi bi-eye"></i></i></a>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="text-decoration-none ">Forget your Password?</a>
                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn btn-primary btn-lg mb-3 btn-createAccount">LOGIN</button>

                            <p class="text-center text-primary mt-1">Don't have an account? <a href="#"
                                    class="text-decoration-none "><b>Sign up</b></a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
