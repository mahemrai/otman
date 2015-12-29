<div>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            @if (is_null($user->profile->profile_image))
                <a href="/profile-pic"><img class="img-circle" src="/images/no-profile-image.png"></a>
            @else
                <a href="/profile-pic"><img class="img-circle" src="/images/profile-image/{{ $user->profile->profile_image }}"></a>
            @endif

            <a href="/dashboard"><i class="fa fa-home"></i> Home</a>
            <a href="/my-profile/{{ $user->id }}"><i class="fa fa-user"></i> Profile</a>
            <a href="#"><i class="fa fa-cog"></i> Settings</a>
            <a href="#"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
    </div>
</nav>
</div>