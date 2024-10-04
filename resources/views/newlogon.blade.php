<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h3 class="text-primary text-center">LOGIN</h3>
            <div class="modal-body pt-5 pb-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="mb-2">
                            <div class=" form-floating form-group mb-4">
                                <input type="email"
                                    class="form-control border-0 border-bottom rounded-0  ps-4 custom-control"
                                    id="email" name="email">
                                <label for="email" class="form-label ps-0 custom-label">Email</label>
                            </div>
                            <div class="input-group mb-3">
                                <div class=" form-floating position-relative d-flex flex-wrap">
                                    <input type="password"
                                        class="form-control border-0 border-bottom rounded-0 bg-transparent ps-0 custom-control w-100"
                                        id="password" name="password">
                                    <label for="password" class="form-label ps-0 custom-label">Password</label>
                                    <a class="input-group-text text-decoration-none view-password d-flex"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                        </svg></a>
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


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
