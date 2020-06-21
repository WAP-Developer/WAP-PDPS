<div class="form-container">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <div class="d-flex user-meta">
                        <img src="<?= base_url('assets/img/avatar') ?>/<?= $avatar ?>" class="usr-profile" alt="avatar">
                        <div class="">
                            <p class=""><?= $nama ?></p>
                        </div>
                    </div>

                    <form id="formLock" action="javascript:void(0);" class="text-left">
                        <div class="form">

                            <div id="password-field" class="field-wrapper input mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <?php $session = \Config\Services::session(); ?>
                                <input name="username" type="hidden" value="<?= $session->get('username') ?>">
                                <input id="role" name="role" type="hidden" value="<?= $session->get('role') ?>">
                                <input id="password" name="password" type="password" class="form-control" placeholder="Kata Sandi">
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper toggle-pass">
                                    <p class="d-inline-block">Tampilkan Kata Sandi</p>
                                    <label class="switch s-primary">
                                        <input type="checkbox" id="toggle-password" class="d-none">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Buka</button>
                                </div>

                            </div>

                        </div>
                    </form>
                    <p class="terms-conditions">© 2020 Seluruh Hak Cipta. <a href="<?= base_url() ?>">Code of The Core</a> Developer.

                </div>
            </div>
        </div>
    </div>
    <div class="form-image">
        <div class="off-image">
        </div>
    </div>
</div>