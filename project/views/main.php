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
    <a href="">
        <button class="btn btn-warning btn-profile">Главная</button>
    </a>
    <?if($isAuth):?><a href="/profile/my/">
        <?else:?><a href="/login/"><?endif?>
        <button class="btn btn-warning">Мой Профайл</button>
    </a>
</div>
<div class="row">
    <?foreach ($profiles as $profile):?>
    <div class="col-xl-12">
        <a href="/profile/show/<?=$profile->id?>/">
            <div class="profile">
                <div class="row">
                    <div class="col-xl-2 offset-xl-1">
                        <div class="profile__img">
                            <img src="/project/webroot/img/none.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-xl-8 offset-xl-1">
                        <div class="profile__info">
                            <div class="profile__fio">
                                <?=$profile->last_name?> <?=$profile->name?> <?=$profile->patronymic?>
                            </div>
                            <div class="profile__email">
                                <span class="b">Email: </span> <?=$profile->email?>
                            </div>
                            <div class="profile__phone">
                                <span class="b">Телефон: </span> <?=$profile->phone?>
                            </div>
                        </div>
                    </div>
                </div>
            </div></a>
    </div>
    <?endforeach;?>
</div>
