<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                            <div class="form-group">
                                <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="email">Email</label>
                                    <div class="col-sm-10"><input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email" value="" maxlength="50" required="">
                                        </div>
                                </div>
                                <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="ttl">Password</label>
                                    <div class="col-sm-10"><input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" value="" maxlength="50" required="">
                                        </div>
                                </div>
                            </div>
                            
            </div>
            <div class="modal-footer">
            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Lupa Kata Sandi?') }}
                            </a>
                        @endif
                                <button type="submit" class="btn btn-primary" id="saveUser" value="create"><i class="metismenu-icon"></i>Masuk</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>