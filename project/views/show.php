<div class="menu">
    <?if (!$isAuth):?>
        <a href="/register/">
            <button class="btn btn-success">Регистрация</button>
        </a>
        <a href="/login/">
            <button class="btn btn-success">Вход</button>
        </a>
    <?else:?>
        <a href="/logout/">
            <button class="btn btn-success">Выход</button>
        </a>
    <?endif;?>
    <a href="/">
        <button class="btn btn-warning btn-profile">Главная</button>
    </a>
    <a href="/profile/my/">
        <button class="btn btn-warning">Мой Профайл</button>
    </a>
</div>
<div class="ank">
    <div class="ank__title">Профайл</div>
    <div class="row">
        <div class="col-xl-3">
            <div class="ank__img">
                <img src="/project/webroot/img/none.jpg" alt="">
            </div>
        </div>
        <div class="col-xl-8 offset-xl-1">
            <div class="ank__atr">
                <div class="ank__atr-name">Фамилия:</div>
                <div class="ank__atr-value"><?=$profile->last_name?></div>
            </div>
            <div class="ank__atr">
                <div class="ank__atr-name">Имя:</div>
                <div class="ank__atr-value"><?=$profile->name?></div>
            </div>
            <div class="ank__atr">
                <div class="ank__atr-name">Отчество:</div>
                <div class="ank__atr-value"><?=$profile->patronymic?></div>
            </div>
            <div class="ank__atr">
                <div class="ank__atr-name">Основной телефон (<?=$profile->getTypePhone()?>):</div>
                <div class="ank__atr-value"><?=$profile->phone?></div>
            </div>
            <div class="ank__atr">
                <div class="ank__atr-name">Основной Email:</div>
                <?=$profile->email?>
            </div>
            <?if(count($home_phones) > 0):?>
                <div class="ank__atr">
                    <div class="ank__atr-name">Доп. Домашний телефон:</div>
                    <?foreach ($home_phones as $phone):?>
                        <div class="ank__atr-value"><?=$phone->number?></div>
                    <?endforeach;?>
                </div>
            <?endif;?>

            <?if(count($work_phones) > 0):?>
                <div class="ank__atr">
                    <div class="ank__atr-name">Доп. Рабочий телефон:</div>
                    <?foreach ($work_phones as $phone):?>
                        <div class="ank__atr-value"><?=$phone->number?></div>
                    <?endforeach;?>
                </div>
            <?endif;?>

            <?if(count($mob_phones) > 0):?>
                <div class="ank__atr">
                    <div class="ank__atr-name">Доп. Мобильный телефон:</div>
                    <?foreach ($mob_phones as $phone):?>
                        <div class="ank__atr-value"><?=$phone->number?></div>
                    <?endforeach;?>
                </div>
            <?endif;?>

            <?if(count($emails) > 0):?>
                <div class="ank__atr">
                    <div class="ank__atr-name">Доп. Email:</div>
                    <?foreach ($emails as $email):?>
                        <div class="ank__atr-value"><?=$email->email?></div>
                    <?endforeach;?>
                </div>
            <?endif;?>
        </div>
    </div>
</div>
