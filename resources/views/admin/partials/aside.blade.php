<nav>
    <ul class="mt-2 p-0">
        <li class="pb-1"><a class="text-light lf-links" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge-high d-inline me-1"></i>Dashboard</a></li>
        <li class="pb-1"><a class="text-light lf-links" href="{{ route('admin.projects.index') }}"><i class="fa-solid fa-diagram-project d-inline me-1"></i>Projects</a>
            <ul>
                <li class="pb-1"><a class="text-light lf-links" href="{{ route('admin.projects.create') }}"><i class="fa-solid fa-plus d-inline me-1"></i>Add</a></li>
            </ul>
        </li>
         <li class="pb-1"><a class="text-light lf-links" href="{{ route('admin.types_project') }}"><i class="fa-solid fa-flag-checkered d-inline me-1"></i>Projects Type</a></li>
        <li class="pb-1"><a class="text-light lf-links" href="{{ route('admin.types.index') }}"><i class="fa-solid fa-code d-inline me-1"></i>Type</a></li>
    </ul>
</nav>
