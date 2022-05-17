<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.user.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/signos') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.signo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/enfermedads') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.enfermedad.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/sintomas') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.sintoma.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/prueba-labs') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.prueba-lab.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/prueba-mortems') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.prueba-mortem.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tratamientos') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.tratamiento.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/pacientes') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.paciente.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/usuarios') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.usuario.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/historial-clins') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.historial-clin.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/citas') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.cita.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/diagnosticos') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.diagnostico.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/sin-enfs') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.sin-enf.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tra-enfs') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.tra-enf.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/mor-enfs') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.mor-enf.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/sig-enfs') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.sig-enf.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/lab-enfs') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.lab-enf.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
