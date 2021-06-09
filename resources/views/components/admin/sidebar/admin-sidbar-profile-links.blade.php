

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseprofile" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Profile</span>
    </a>


    <div id="collapseprofile" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profiel:</h6>

            <a class="collapse-item" href="{{route('profile' , auth()->user()->id)}}">My Profile</a>

        </div>
    </div>
</li>


