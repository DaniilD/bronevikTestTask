
<div class="menu">
    <a href="/logout/">
        <button class="btn btn-success">Выход</button>
    </a>
    <a href="/">
        <button class="btn btn-warning btn-profile">Главная</button>
    </a>
</div>
<form action="/profile/update/" method="post">
    <div class="ank">
        <div class="ank__title">Мой Профайл</div>
        <div class="row">
            <div class="col-xl-3">
                <div class="ank__img">
                    <img src="/project/webroot/img/none.jpg" alt="">
                </div>
            </div>
            <div class="col-xl-8 offset-xl-1">
                <div class="ank__atr">
                    <div class="ank__atr-name">Фамилия:</div>
                    <input type="text" name="last_name" value="<?=$profile->last_name?>" required>
                </div>
                <div class="ank__atr">
                    <div class="ank__atr-name">Имя:</div>
                    <input type="text" name="first_name" value="<?=$profile->name?>" required>
                </div>
                <div class="ank__atr">
                    <div class="ank__atr-name">Отчество:</div>
                    <input type="text" name="patronymic" value="<?=$profile->patronymic?>" required>
                </div>
                <div class="ank__atr">
                    <div class="ank__atr-name">Основной телефон:</div>
                    <input type="text" name="main_phone" value="<?=$profile->phone?>" required><br>
                    <input type="radio" name="phone_type" value="0"> Домашний<br>
                    <input type="radio" name="phone_type" value="1"> Рабочий<br>
                    <input type="radio" name="phone_type" value="2" checked> Мобильный<br>
                </div>
                <div class="ank__atr">
                    <div class="ank__atr-name">Основной email:</div>
                    <input type="text" name="main_email" value="<?=$profile->email?>" required>
                </div>

                <div class="ank__atr" id="home">
                    <div class="ank__atr-name">Домашний телефон:</div>

                    <div id="home-phones">
                        <div class="ank__atr-line">
                            <?if(count($home_phones) > 0):?>
                            <?foreach ($home_phones as $phone):?>
                                    <input type="text" name="home_phone[]" value="<?=$phone->number?>">
                            <?endforeach;?>
                            <?else:?>
                                <input type="text" name="home_phone[]">
                            <?endif;?>
                        </div>
                    </div>

                    <div class="ank__atr-line">
                        <div class="btn btn-success" id="add_home">Добавить</div>
                        <div class="btn btn-danger" id="del_home">Удалить</div>
                    </div>
                </div>

                <div class="ank__atr">
                    <div class="ank__atr-name">Рабочий телефон:</div>
                    <div id="work-phones">
                        <div class="ank__atr-line">
                            <?if(count($work_phones) > 0):?>
                            <?foreach ($work_phones as $phone):?>
                            <input type="text" name="work_phone[]" value="<?=$phone->number?>">
                                <?endforeach;?>
                            <?else:?>
                                <input type="text" name="work_phone[]">
                            <?endif;?>
                        </div>
                    </div>

                    <div class="ank__atr-line">
                        <div class="btn btn-success" id="add_work">Добавить</div>
                        <div class="btn btn-danger" id="del_work">Удалить</div>
                    </div>

                </div>
                <div class="ank__atr">
                    <div class="ank__atr-name">Мобильный телефон:</div>
                    <div id="mobile-phones">
                        <div class="ank__atr-line">
                            <?if(count($mob_phones) > 0):?>
                            <?foreach ($mob_phones as $phone):?>
                            <input type="text" name="mobile_phone[]" value="<?=$phone->number?>">
                            <?endforeach;?>
                            <?else:?>
                                <input type="text" name="mobile_phone[]">
                            <?endif;?>
                        </div>
                    </div>

                    <div class="ank__atr-line">
                        <div class="btn btn-success" id="add_mob">Добавить</div>
                        <div class="btn btn-danger" id="del_mob">Удалить</div>
                    </div>
                </div>
                <div class="ank__atr">
                    <div class="ank__atr-name">Доп. Email:</div>
                    <div id="emails">
                        <div class="ank__atr-line">
                            <?if(count($emails) > 0):?>
                            <?foreach ($emails as $email):?>
                            <input type="email" name="emails[]" value="<?=$email->email?>">
                            <?endforeach;?>
                            <?else:?>
                                <input type="email" name="emails[]">
                            <?endif;?>
                        </div>
                    </div>

                    <div class="ank__atr-line">
                        <div class="btn btn-success" id="add_email">Добавить</div>
                        <div class="btn btn-danger" id="del_email">Удалить</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-info btn__save">Обновить</button>
</form>