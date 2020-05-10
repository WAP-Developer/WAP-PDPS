<div class="form-container">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class="">Selamat Datang di Aplikasi <a href="<?= base_url() ?>"><span class="brand-name">PDPS</span></a></h1>
                    <p class="signup-link">"Pengelolaan Data Penduduk & Pembuatan Surat"</p>

                    <?php
                    $session = \Config\Services::session();
                    echo $session->getFlashdata('notif'); ?>
                    <form id="fromEmploye" class="text-left" action="javascript:void(0);" novalidate>
                        <div class="form">

                            <div id="nip-field" class="field-wrapper input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="formNip" name="nip" type="text" class="form-control" placeholder="NIP">
                                <div id="nipError" class="invalid-feedback"></div>
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Kata Sandi">
                                <div id="passwordError" class="invalid-feedback"></div>
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
                                    <button type="submit" onclick="loginEmploye()" class="btn btn-primary">Masuk</button>
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
        <div class="l-image">
        </div>
    </div>
</div>